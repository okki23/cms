<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Article_m extends MY_Model {

    protected $_table_name = 'articles';
    protected $_comment_table = 'comment';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'pubdate desc, id desc';
    protected $_timestamps = TRUE;
    public $rules = array('email' => array('field' => 'text',
            'type' => 'text',
            'label' => 'email',
            'rules' => 'trim|required|valid_email|xss_clean'
        ),
        'password' => array('field' => 'password',
            'label' => 'password',
            'rules' => 'trim|required')
    );

    function __construct() {
        parent::__construct();
    }

    public function array_from_post($fields) {
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }

    public function save_order($articles) {
        if (count($articles)) {
            foreach ($articles as $order => $article) {
                if ($article['item_id'] != '') {
                    $data = array('parent_id' => (int) $article['parent_id'], 'order' => $order);
                    $this->db->set($data)->where($this->_primary_key, $article['parent_id'])->update($this->_table_name);
                }
            }
        }
    }

    public function save($data, $id = NULL) {
        if ($this->_timestamps == TRUE) {
            $now = date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }
        $result = false;
        if ($id === NULL || $id === 0 || $id === "") {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;

            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        } else {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            //$data['password'] = $this->hash($data['password']);
            $list = array('title' => $data['title'], 'slug' => $data['slug'], 'body' => $data['body'], 'pubdate' => $data['pubdate']);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }

        return $result;
    }
    
    public function get_all_comments($requested_id){
        $this->db->where('id_article',$requested_id);
        return $this->db->get($this->_comment_table)->result();
        
    }
    
    public function get_result($res){
        $array = array('slug' => $res, 'title' => $res, 'body' => $res);
        $this->db->or_like($array);
        return $this->db->get($this->_table_name)->result();
        
    }
    public function save_comment($data, $id = NULL) {
         if ($this->_timestamps == TRUE) {
            $now = date('Y-m-d H:i:s');
            
            $data['date_post'] = $now;
        }
        $result = false;
        if ($id === NULL || $id === 0 || $id === "") {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;

            $this->db->set($data);
            $this->db->insert($this->_comment_table);
            $id = $this->db->insert_id();
        } else {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            //$data['password'] = $this->hash($data['password']);
            $list = array('id_article'=>$data['id_article'],'name'=>$data['name'],'email'=>$data['email'],'web'=>$data['web'],'comment'=>$data['comment'],'parent_id_comment'=>$data['parent_id_comment']);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }

        return $result;
    }

    public function get($id = NULL) {
        if ($id != NULL) {
            $this->db->where('id', $id);
            return $this->db->get($this->_table_name)->row();
        } else {
            return $this->db->get($this->_table_name)->result();
        }
    }

    public function get_all($limit) {
        $offset = $this->uri->segment(2);
        return $this->db->limit($limit, $offset)->get($this->_table_name)->result();
    }

    public function get_all_archive() {

        return $this->db->get($this->_table_name)->result();
    }

    public function delete($id) {
        parent::delete($id);

        //$this->db->set(array('parent_id'=>0))->where('parent_id',$id)->update($this->_table_name);
    }

    public function login() {
        $article = $this->get_by(array(
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
                ), TRUE);

        if (count($article)) {
            $data = array('name' => $article->name,
                'email' => $article->email,
                'id' => $article->id,
                'loggedin' => TRUE,
            );
            $this->session->set_articledata($data);
            redirect(base_url('admin/dashboard'));
        }
    }

    public function logged_in() {
        return(bool) $this->session->articledata('loggedin');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/article/login');
    }

    public function hash($string) {
        //return hash('sha512',$string.config_item('encryption_key'));

        return md5($string);
    }

    public function set_published() {
        $this->db->where('pubdate <=', date('Y-m-d'));
    }

    public function get_recent($limit = 3) {
        $limit = (int) $limit;
        $this->set_published();
        $this->db->limit($limit);
        return parent::get();
    }

    public function get_new() {
        $article = new StdClass();
        $article->id = '';
        $article->title = '';
        $article->slug = '';
        $article->body = '';
        $article->pubdate = date('Y-m-d');

        return $article;
    }
    
    
     public function sort_nested(array $pages, $parent_id = 0) {
        $arrData = array();

        foreach ($pages as $page) {
            $pages = $this->db->order_by('id', 'asc')->where('parent_id_comment', $page['id'])->get('comment')->result_array();

            $children = $this->sort_nested($pages, $page['id']);

            if ($children) {
                $page['children'] = $children;
            }
            
            $arrData[$page['id']] = $page;
        }

        return $arrData;
    }

    //ambil bapak

    public function get_nested() {
        $pages = $this->db->get('comment')->result_array();
        $arrData = $this->sort_nested($pages,0);
        //$arrData = $this->sort_nested($pages, 0);

        return $arrData;
    }
    public function get_allcom(){
         return $this->db->get('comment')->result_array();
    }
    public function get_coms($parent_id_comment){
        //select * from comment where parent_id_comment = ".$parent_id_comment
        
        $sql = $this->db->where('parent_id_comment',$parent_id_comment)->get('comment')->result_array();
        
        
        return $sql;
    }
     
}

?>