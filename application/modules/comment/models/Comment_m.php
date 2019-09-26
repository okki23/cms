<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_m extends MY_Model {

    protected $_table_name = 'comments';
    protected $_comment_table = 'comment';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'date_post desc, id desc';
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

    public function get_all_comments($requested_id) {
        $this->db->where('id_article', $requested_id);
        return $this->db->get($this->_comment_table)->result();
    }
    
    public function get_parent_comment($requested_id){
        $this->db->where('id_article', $requested_id);
        $this->db->where('parent_id_comment', 0);
        $this->db->order_by($this->_order_by);
        return $this->db->get($this->_comment_table)->result();
    }
    
    public function get_child_comment($parent_id){
        $this->db->where('parent_id_comment', $parent_id);
        $this->db->order_by($this->_order_by);
        return $this->db->get($this->_comment_table)->result();
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
            $list = array('id_comment' => $data['id_comment'], 'name' => $data['name'], 'email' => $data['email'], 'web' => $data['web'], 'comment' => $data['comment'], 'parent_id_comment' => $data['parent_id_comment']);
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

    public function delete($id) {
        parent::delete($id);

        //$this->db->set(array('parent_id'=>0))->where('parent_id',$id)->update($this->_table_name);
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
        $comment = new StdClass();
        $comment->id = '';
        $comment->title = '';
        $comment->slug = '';
        $comment->body = '';
        $comment->pubdate = date('Y-m-d');

        return $comment;
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
        $pages = $this->db->order_by('parent_id_comment', 'asc')->where('parent_id_comment', 0)->order_by('id', 'asc')->get('comment')->result_array();

        $arrData = $this->sort_nested($pages, 0);

        return $arrData;
    }

}

?>