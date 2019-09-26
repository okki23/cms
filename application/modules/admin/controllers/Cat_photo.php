<?php

/*
  author : Okki Setyawan &copy; 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat_photo extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        // if ($this->session->userdata('loggedin') == false) {
        //     redirect(base_url('admin/login'));
        // }

        $this->load->model('cat_photo_m');
        // if ($this->session->userdata('name') == '' || $this->session->userdata('name') == NULL) {
        //     redirect(base_url('admin/login'));
        // }
    }

    public function index() {
        
         $this->load->library('pagination');
         
        $data['limit'] = 10;
        
        $per_page = 10;
            
        $data['url'] = $this->uri->segment(2);
        $list_cari = $this->article_m->array_from_post(array('url', 'search_param','search'));
   
        $search = $this->input->post('search');
        if($search == ''){
            //dump('kosong');
            $data['cat_photo'] = $this->cat_photo_m->get_no_search($per_page)->result();
            $data['total_rows'] = $this->cat_photo_m->count_thread($search,$list_cari);
        }else{
            //dump('ada');
            $data['cat_photo'] = $this->cat_photo_m->get_with_search($per_page,$list_cari)->result();
            $data['total_rows'] = $this->cat_photo_m->count_thread($search,$list_cari);
        }
        
              
        
        
        //$data['cat_photo'] = $this->cat_photo_m->get();
        $data['subview'] = "admin/cat_photo/index";
        $data['meta_title'] = $this->data['meta_title'];
        $data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $data);
    }

    public function edit($id = NULL) {
        if ($id) {
            $this->data['cat_photo'] = $this->cat_photo_m->get($id);
            count($this->data['cat_photo']) || $this->data['errors'][] = "cat_photo could not be found";
        } else {
            $this->data['cat_photo'] = $this->cat_photo_m->get_new();
        }
     

        $data = $this->cat_photo_m->array_from_post(array('id','nama_kategori'));
        $id == NULL || $this->data['cat_photo'] = $this->cat_photo_m->get($id);
        
        $this->data['subview'] = 'admin/cat_photo/edit';
        $this->data['meta_title'] = $this->data['meta_title'];
        $this->data['url'] = 'admin/cat_photo/save';
        $this->data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete() {
       
        $id = $this->uri->segment(4);
       
        
        $sql = $this->cat_photo_m->delete($id);

        redirect(base_url('admin/cat_photo'));
    }
 
    public function save() {
        $data = $this->cat_photo_m->array_from_post(array('id','nama_kategori'));
        
        $id = isset($data['id']) ? $data['id'] : NULL;
        $exe = $this->cat_photo_m->save($data, $id);
         
        
        
        redirect(base_url('admin/cat_photo'));
    }

    public function login() {
        //echo $this->cat_photo_m->logout();
        print_r($this->cat_photo_m->logged_in());
        /*
          $rules = $this->cat_photo_m->rules;
          $this->form_validation->set_rules($rules);
          if($this->form_validation->run() == TRUE){
          //we can login and redirect to dashboard
          }


          $cat_photo = $this->get_by(array(
          'email'=>$this->input->post('email'),
          'password'=>md5($this->input->post('password'))
          ),TRUE);
          if(count($cat_photo)){
          $data = array('name'=>$cat_photo->name,
          'email'=>$cat_photo->email,
          'id'=>$cat_photo->id,
          'loggedin'=>TRUE,
          );
          $this->session->set_cat_photodata($data);
          redirect(base_url('admin/dashboard'));
          }

         */
        $this->cat_photo_m->login();


        $data['subview'] = "admin/cat_photo/login";
        $data['meta_title'] = $this->data['meta_title'];
        //var_dump($this->data);
        $this->load->view('admin/_layout_modal', $data);
    }

    public function logout() {
        $this->cat_photo_m->logout();
    }

     

}
