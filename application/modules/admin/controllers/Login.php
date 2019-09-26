<?php

/*
  author : Okki Setyawan &copy; 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Admin_Controller {

    public function __construct() {
        parent::__construct();

       
        $this->load->model('login_m');
       
    }

    public function index() {
        //echo $this->login_m->logout();
        //print_r($this->login_m->logged_in());
        /*
          $rules = $this->login_m->rules;
          $this->form_validation->set_rules($rules);
          if($this->form_validation->run() == TRUE){
          //we can login and redirect to dashboard
          }


          $article = $this->get_by(array(
          'email'=>$this->input->post('email'),
          'password'=>md5($this->input->post('password'))
          ),TRUE);
          if(count($article)){
          $data = array('name'=>$article->name,
          'email'=>$article->email,
          'id'=>$article->id,
          'loggedin'=>TRUE,
          );
          $this->session->set_articledata($data);
          redirect(base_url('admin/dashboard'));
          }

         */
        $this->login_m->login();


        $data['subview'] = "admin/user/login";
        $data['meta_title'] = $this->data['meta_title'];
        //var_dump($this->data);
        $this->load->view('admin/_layout_modal', $data);
    }

    public function edit($id = NULL) {
        if ($id) {
            $this->data['article'] = $this->login_m->get($id);
            count($this->data['article']) || $this->data['errors'][] = "article could not be found";
        } else {
            $this->data['article'] = $this->login_m->get_new();
        }
        
        $data = $this->login_m->array_from_post(array('title', 'slug', 'body', 'pubdate'));
        $id == NULL || $this->data['article'] = $this->login_m->get($id);
        
        $this->data['subview'] = 'admin/article/edit';
        $this->data['meta_title'] = $this->data['meta_title'];
        $this->data['url'] = 'admin/article/save';
        $this->data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete() {
        $id = $this->uri->segment(4);
        
        $sql = $this->login_m->delete($id);

        redirect(base_url('admin/article'));
    }

    public function save() {
        $data = $this->login_m->array_from_post(array('id', 'title', 'slug', 'pubdate', 'body'));
        
        $id = isset($data['id']) ? $data['id'] : NULL;
        $exe = $this->login_m->save($data, $id);
        
        redirect(base_url('admin/article'));
    }

    public function login_() {
        //echo $this->login_m->logout();
        print_r($this->login_m->logged_in());
        /*
          $rules = $this->login_m->rules;
          $this->form_validation->set_rules($rules);
          if($this->form_validation->run() == TRUE){
          //we can login and redirect to dashboard
          }


          $article = $this->get_by(array(
          'email'=>$this->input->post('email'),
          'password'=>md5($this->input->post('password'))
          ),TRUE);
          if(count($article)){
          $data = array('name'=>$article->name,
          'email'=>$article->email,
          'id'=>$article->id,
          'loggedin'=>TRUE,
          );
          $this->session->set_articledata($data);
          redirect(base_url('admin/dashboard'));
          }

         */
        $this->login_m->login();


        $data['subview'] = "admin/article/login";
        $data['meta_title'] = $this->data['meta_title'];
        //var_dump($this->data);
        $this->load->view('admin/_layout_modal', $data);
    }

    public function logout() {
        $this->login_m->logout();
    }

    public function _unique_email($str) {
        $id = $this->uri->segment(4);
        $this->db->where('email', $this->input->post('email'));
        !$id || $this->db->where('id !=', $id);
        $article = $this->login_m->get();

        if (count($article)) {
            echo $this->session->set_flashdata('error', 'email already exist!');
            return FALSE;
        }
    }

}
