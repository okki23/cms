<?php

/*
  author : Okki Setyawan &copy; 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('loggedin') == false) {
            redirect(base_url('admin/login'));
        }

        $this->load->model('article_m');
        // if ($this->session->userdata('name') == '' || $this->session->userdata('name') == NULL) {
        //     redirect(base_url('admin/login'));
        // }
    }

    public function index() {
        $data['article'] = $this->article_m->get();
        $data['subview'] = "admin/article/index";
        $data['meta_title'] = $this->data['meta_title'];
        $data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $data);
    }

    public function edit($id = NULL) {
        if ($id) {
            $this->data['article'] = $this->article_m->get($id);
            count($this->data['article']) || $this->data['errors'][] = "article could not be found";
        } else {
            $this->data['article'] = $this->article_m->get_new();
        }
        
        $data = $this->article_m->array_from_post(array('title', 'slug', 'body', 'pubdate'));
        $id == NULL || $this->data['article'] = $this->article_m->get($id);
        
        $this->data['subview'] = 'admin/article/edit';
        $this->data['meta_title'] = $this->data['meta_title'];
        $this->data['url'] = 'admin/article/save';
        $this->data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete() {
        $id = $this->uri->segment(4);
        
        $sql = $this->article_m->delete($id);

        redirect(base_url('admin/article'));
    }

    public function save() {
        $data = $this->article_m->array_from_post(array('id', 'title', 'slug', 'pubdate', 'body'));
        
        $id = isset($data['id']) ? $data['id'] : NULL;
        $exe = $this->article_m->save($data, $id);
        
        redirect(base_url('admin/article'));
    }

    public function login() {
        //echo $this->article_m->logout();
        print_r($this->article_m->logged_in());
        /*
          $rules = $this->article_m->rules;
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
        $this->article_m->login();


        $data['subview'] = "admin/article/login";
        $data['meta_title'] = $this->data['meta_title'];
        //var_dump($this->data);
        $this->load->view('admin/_layout_modal', $data);
    }

    public function logout() {
        $this->article_m->logout();
    }

    public function _unique_email($str) {
        $id = $this->uri->segment(4);
        $this->db->where('email', $this->input->post('email'));
        !$id || $this->db->where('id !=', $id);
        $article = $this->article_m->get();

        if (count($article)) {
            echo $this->session->set_flashdata('error', 'email already exist!');
            return FALSE;
        }
    }

}
