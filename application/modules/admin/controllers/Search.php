<?php

/*
  author : Okki Setyawan &copy; 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('loggedin') == false) {
            redirect(base_url('admin/login'));
        }

        $this->load->model('search_m');
        // if ($this->session->userdata('name') == '' || $this->session->userdata('name') == NULL) {
        //     redirect(base_url('admin/login'));
        // }
    }

    public function index() {
        $data['search'] = $this->search_m->get();
        $data['subview'] = "admin/search/index";
        $data['meta_title'] = $this->data['meta_title'];
        $data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $data);
    }

    public function edit($id = NULL) {
        if ($id) {
            $this->data['search'] = $this->search_m->get($id);
            count($this->data['search']) || $this->data['errors'][] = "search could not be found";
        } else {
            $this->data['search'] = $this->search_m->get_new();
        }
        
        $data = $this->search_m->array_from_post(array('title', 'slug', 'body', 'pubdate'));
        $id == NULL || $this->data['search'] = $this->search_m->get($id);
        
        $this->data['subview'] = 'admin/search/edit';
        $this->data['meta_title'] = $this->data['meta_title'];
        $this->data['url'] = 'admin/search/save';
        $this->data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete() {
        $id = $this->uri->segment(4);
        
        $sql = $this->search_m->delete($id);

        redirect(base_url('admin/search'));
    }

    public function save() {
        $data = $this->search_m->array_from_post(array('id', 'title', 'slug', 'pubdate', 'body'));
        
        $id = isset($data['id']) ? $data['id'] : NULL;
        $exe = $this->search_m->save($data, $id);
        
        redirect(base_url('admin/search'));
    }

    public function login() {
        //echo $this->search_m->logout();
        print_r($this->search_m->logged_in());
        /*
          $rules = $this->search_m->rules;
          $this->form_validation->set_rules($rules);
          if($this->form_validation->run() == TRUE){
          //we can login and redirect to dashboard
          }


          $search = $this->get_by(array(
          'email'=>$this->input->post('email'),
          'password'=>md5($this->input->post('password'))
          ),TRUE);
          if(count($search)){
          $data = array('name'=>$search->name,
          'email'=>$search->email,
          'id'=>$search->id,
          'loggedin'=>TRUE,
          );
          $this->session->set_searchdata($data);
          redirect(base_url('admin/dashboard'));
          }

         */
        $this->search_m->login();


        $data['subview'] = "admin/search/login";
        $data['meta_title'] = $this->data['meta_title'];
        //var_dump($this->data);
        $this->load->view('admin/_layout_modal', $data);
    }

    public function logout() {
        $this->search_m->logout();
    }

    public function _unique_email($str) {
        $id = $this->uri->segment(4);
        $this->db->where('email', $this->input->post('email'));
        !$id || $this->db->where('id !=', $id);
        $search = $this->search_m->get();

        if (count($search)) {
            echo $this->session->set_flashdata('error', 'email already exist!');
            return FALSE;
        }
    }
    
    public function result(){
         $data = $this->search_m->array_from_post(array('url', 'search_param','search'));
         $data['result'] = $this->search_m->get_result($data);
         //dump($data['result']);
         //$this->load->view('admin/'.$data['url'].'/search_result',$data['result']);
         //$dataku = 'admin/'.$data['url'].'/search_result';
         //dump($dataku);
         
    }

}
