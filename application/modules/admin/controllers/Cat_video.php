<?php

/*
  author : Okki Setyawan &copy; 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat_video extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        // if ($this->session->userdata('loggedin') == false) {
        //     redirect(base_url('admin/login'));
        // }

        // $this->load->model('cat_video_m');
        // if ($this->session->userdata('name') == '' || $this->session->userdata('name') == NULL) {
        //     redirect(base_url('admin/login'));
        // }
    }

    public function index() {
        $data['cat_video'] = $this->cat_video_m->get();
        $data['subview'] = "admin/cat_video/index";
        $data['meta_title'] = $this->data['meta_title'];
        $data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $data);
    }

    public function edit($id = NULL) {
        if ($id) {
            $this->data['cat_video'] = $this->cat_video_m->get($id);
            count($this->data['cat_video']) || $this->data['errors'][] = "cat_video could not be found";
        } else {
            $this->data['cat_video'] = $this->cat_video_m->get_new();
        }
     

        $data = $this->cat_video_m->array_from_post(array('id','nama_kategori'));
        $id == NULL || $this->data['cat_video'] = $this->cat_video_m->get($id);
        
        $this->data['subview'] = 'admin/cat_video/edit';
        $this->data['meta_title'] = $this->data['meta_title'];
        $this->data['url'] = 'admin/cat_video/save';
        $this->data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete() {
       
        $id = $this->uri->segment(4);
       
        
        $sql = $this->cat_video_m->delete($id);

        redirect(base_url('admin/cat_video'));
    }
 
    public function save() {
        $data = $this->cat_video_m->array_from_post(array('id','nama_kategori'));
        
        $id = isset($data['id']) ? $data['id'] : NULL;
        $exe = $this->cat_video_m->save($data, $id);
         
        
        
        redirect(base_url('admin/cat_video'));
    }

    public function login() {
        //echo $this->cat_video_m->logout();
        print_r($this->cat_video_m->logged_in());
        /*
          $rules = $this->cat_video_m->rules;
          $this->form_validation->set_rules($rules);
          if($this->form_validation->run() == TRUE){
          //we can login and redirect to dashboard
          }


          $cat_video = $this->get_by(array(
          'email'=>$this->input->post('email'),
          'password'=>md5($this->input->post('password'))
          ),TRUE);
          if(count($cat_video)){
          $data = array('name'=>$cat_video->name,
          'email'=>$cat_video->email,
          'id'=>$cat_video->id,
          'loggedin'=>TRUE,
          );
          $this->session->set_cat_videodata($data);
          redirect(base_url('admin/dashboard'));
          }

         */
        $this->cat_video_m->login();


        $data['subview'] = "admin/cat_video/login";
        $data['meta_title'] = $this->data['meta_title'];
        //var_dump($this->data);
        $this->load->view('admin/_layout_modal', $data);
    }

    public function logout() {
        $this->cat_video_m->logout();
    }

     

}
