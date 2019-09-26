<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends MY_Model {

    protected $_table_name = 'users';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'name';
    public $rules = array(
        'email' => array('field' => 'text',
            'type' => 'text',
            'label' => 'email',
            'rules' => 'trim|required|valid_email|xss_clean'
        ),
        'password' => array('field' => 'password',
            'label' => 'password',
            'rules' => 'trim|required')
    );
    protected $_timestamps = FALSE;

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
    
    
    public function get_recent_dashboard($limit) {
        
        $offset = $this->uri->segment(4);
        $this->db->order_by('id','desc');
        return $this->db->limit($limit, $offset)->get($this->_table_name);
   
    }
    
    public function get_recent_dashboard_with_search($limit,$search) {
        
        $offset = $this->uri->segment(4);
        $this->db->like($search['search_param'],$search['search']);
        $this->db->order_by('id','desc');
        return $this->db->limit($limit, $offset)->get($this->_table_name);
   
    }
    
    public function count_thread($search,$list_cari=NULL){
       // $this->db->where('cat_thread',$id);
        if($search == ''){
             $sql = $this->db->count_all_results($this->_table_name);
        
        }else{
             $this->db->where($list_cari['search_param'],$list_cari['search']);
             $sql = $this->db->count_all_results($this->_table_name);
        }
        return $sql;
       
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
            $data['password'] = $this->hash($data['email'], $data['password']);
            $this->db->set($data);
            $result = $this->db->insert($this->_table_name);
            
        } else if ($data['password'] != '' || $data['password'] != NULL) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $data['password'] = $this->hash($data['email'], $data['password']);
            $list = array('name' => $data['name'], 'email' => $data['email'], 'password' => $data['password']);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $result = $this->db->update($this->_table_name);
            
        } else if ($data['password'] == '' || $data['password'] == NULL) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $list = array('name' => $data['name'], 'email' => $data['email']);

            $this->db->set($list);
            $this->db->where($this->_primary_key, $id);
            $result = $this->db->update($this->_table_name);
            
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

    public function login() {
        $user = $this->get_by(array(
            'email' => $this->input->post('email'),
            'password' => $this->hash($this->input->post('email'),$this->input->post('password'))
            ), TRUE);
        //dump($this->hash($this->input->post('email'),$this->input->post('password')));
        if (count($user)) {
            $data = array('name' => $user->name,
                'email' => $user->email,
                'id' => $user->id,
                'loggedin' => TRUE,
            );
            //dump($data);
            $this->session->set_userdata($data);
            redirect(base_url('admin/dashboard'));
        }
    }

    public function logged_in() {
        return(bool) $this->session->userdata('loggedin');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/login');
    }

    public function hash($usernm, $string) {
        //return hash('sha512',$string.config_item('encryption_key'));
        return enkrip_password($usernm, $string);
    }

    public function get_new() {
        $user = new StdClass();
        $user->id = '';
        $user->name = '';
        $user->password = '';
        $user->email = '';

        return $user;
    }

}

?>