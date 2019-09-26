<?php

/*
  author : Okki Setyawan &copy; 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('encrypt');

        $this->load->model('forgot_password_m');
    }

    public function index() {
        //echo "adasd";
        $data['list'] = $this->forgot_password_m->get();
        $data['url'] = 'forgot_password/process';

        $data['display'] = "forgot_password/view_forgot_password";
        $data['meta_title'] = $this->data['meta_title'];
        $data['name'] = $this->session->userdata('name');
        $data['listid'] = $this->session->userdata('session_id');
        $data['listuname'] = $this->session->userdata('username');
        $data['listfname'] = $this->session->userdata('fullname');
        $this->load->view('forgot_password/view_forgot_password', $data);
    }

    public function edit($id = NULL) {
        if ($id) {
            $this->data['user'] = $this->forgot_password_m->get($id);
            count($this->data['user']) || $this->data['errors'][] = "User could not be found";
            $this->data['req'] = '';
        } else {
            $this->data['user'] = $this->forgot_password_m->get_new();
            $this->data['req'] = 'required=required';
        }

        $data = $this->forgot_password_m->array_from_post(array('id', 'email', 'username', 'password', 'name', 'no_hp', 'level', 'tgl_daftar', 'status'));
        $data['password'] = $this->forgot_password_m->hash($data['password']);

        //echo $this->uri->segment(4);
        $id == NULL || $this->data['user'] = $this->forgot_password_m->get($id);
        $this->data['display'] = 'forgot_password/edit_forgot_password';
        $this->data['meta_title'] = $this->data['meta_title'];
        $this->data['url'] = 'forgot_password/save';

        $this->data['listid'] = $this->session->userdata('session_id');
        $this->data['listuname'] = $this->session->userdata('username');
        $this->data['listfname'] = $this->session->userdata('fullname');

        $this->load->view('_layout_main', $this->data);
    }

    public function delete() {
        $id = $this->uri->segment(3);
        //echo "lu klik delete id ke".$id;
        //exit();
        $sql = $this->forgot_password_m->delete($id);
        redirect(base_url('forgot_password'));
    }

    public function hash($usernm, $string) {
        //return hash('sha512',$string.config_item('encryption_key'));
        return enkrip_password($usernm, $string);
    }

    public function process_new_password() {
        $data = $this->forgot_password_m->array_from_post(array('email', 'password'));
        //echo $this->hash($data['email'],$data['password']);
        //die();
        //$gethash = $this->forgot_password_m->hash($data['password']);
//        $data = array('email' => 'alfath.helmy@gmail.com', 'password' => 'bismillah');
        $this->db->set('password', $this->hash($data['email'], $data['password']));
        $this->db->where('email', $data['email']);
        $query = $this->db->update('users');
        //echo $this->db->last_query();
        //die();
        if ($query) {
            redirect('admin/login');
        } else {
            echo "Password can't change !";
        }
    }

    public function view_reset_form() {
        //  $data['list'] = $this->forgot_password_m->get();
        $data['url'] = 'forgot_password/process_new_password';
        $data['display'] = "forgot_password/view_forgot_password";
        $data['meta_title'] = $this->data['meta_title'];
        $data['name'] = $this->session->userdata('name');
        $data['listid'] = $this->session->userdata('session_id');
        $data['listuname'] = $this->session->userdata('username');
        $data['listfname'] = $this->session->userdata('fullname');

        $data['id'] = dekrip_url($this->uri->segment(3));

        $data['get_email'] = $this->forgot_password_m->get_email($data['id']);

        $data['display'] = "forgot_password/view_reset_password";
        $this->load->view('forgot_password/view_reset_password', $data);
    }

    public function process() {
        $this->load->library('email');

        $data = $this->forgot_password_m->array_from_post(array('email'));

        //$exe = $this->forgot_password_m->process($data);
        //$link = base_url('forgot_password/view_reset_form/' . $data['username']);
        //$this->db->where('email', $data['email']);
        //$this->db->get('users');
        $getdata = $this->forgot_password_m->process($data);

        $count = $this->forgot_password_m->count($data);

        //var_dump($getdata);
        //die();
        //die();
        if ($count > 0) {
            $link = base_url('forgot_password/view_reset_form/' . enkrip_url($getdata->id));
            $this->email->from('info.sapta.tech@gmail.com', 'Perubahan Password Admin CMS Meja');

            $this->email->to($data['email']);

            $this->email->subject('Notifikasi Perubahan Password');

            $this->email->message('please click this link to reset with new password <br><a href="' . $link . '">' . $link . "</a>");

            $this->email->send();

            redirect(base_url('forgot_password/notif'));
        } else {
            redirect(base_url('forgot_password/view_reset_form'));
        }
    }

    public function notif() {


        $data['meta_title'] = $this->data['meta_title'];
        $data['name'] = $this->session->userdata('name');
        $data['listid'] = $this->session->userdata('session_id');
        $data['listuname'] = $this->session->userdata('username');
        $data['listfname'] = $this->session->userdata('fullname');

        $data['id'] = $this->uri->segment(3);
        //$data['display'] = "forgot_password/view_notif";
        $this->load->view('forgot_password/view_notif', $data);
    }

    public function login() {

        $this->forgot_password_m->login();

        $data['subview'] = "admin/user/login";

        $data['meta_title'] = $this->data['meta_title'];
        //var_dump($this->data);
        $this->load->view('admin/_layout_modal', $data);
    }

    public function activate() {
        $id = $this->uri->segment(3);
        $this->forgot_password_m->active($id);
        redirect(base_url('check_in'));
    }

    public function logout() {
        $this->forgot_password_m->logout();
    }

    public function notif_signup() {
        $this->data['display'] = 'forgot_password/view_notif';
        $this->data['meta_title'] = $this->data['meta_title'];
        $this->load->view('_layout_check_in', $this->data);
    }

}
