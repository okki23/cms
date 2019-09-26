<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password_m extends MY_Model {

    protected $_table_name = 'users';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id asc';
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

    public function active($id) {
        $this->db->set('status', 'Y');
        $this->db->where('username', $id);
        return $this->db->update($this->_table_name);
    }

    public function process($data) {
        return $this->db->select('id,email,name', false)
                        ->where('email', $data['email'])
                        ->get($this->_table_name)->row();
    }

    public function count($data) {
        return $this->db->where('email', $data['email'])->get($this->_table_name)->num_rows();
    }

    public function get_email($id) {
        return $this->db->where('id', $id)->get($this->_table_name)->row();
    }

    public function save_change_password($data, $id = NULL) {

        $result = false;

        if ($data['password'] != '' || $data['password'] != NULL) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $data['password'] = $this->hash($data['password']);
            $list = array('id' => $data['id'], 'password' => $data['password']);
            $this->db->set($data);
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
            'password' => md5($this->input->post('password'))
                ), TRUE);

        if (count($user)) {
            $data = array('name' => $user->name,
                'email' => $user->email,
                'id' => $user->id,
                'loggedin' => TRUE,
            );
            $this->session->set_userdata($data);
            redirect(base_url('admin/dashboard'));
        }
    }

    public function logged_in() {
        return(bool) $this->session->userdata('loggedin');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/user/login');
    }

    public function hash($usernm, $string) {
        //return hash('sha512',$string.config_item('encryption_key'));
        return enkrip_password($usernm, $string);
    }

    public function get_new() {
        $user = new StdClass();
        $user->id = '';
        $user->email = '';
        $user->username = '';
        $user->password = '';
        $user->name = '';
        $user->no_hp = '';
        $user->level = '';
        $user->tgl_daftar = '';
        $user->status = '';

        return $user;
    }

}

?>