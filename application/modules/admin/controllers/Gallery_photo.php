<?php

/*
  author : Okki Setyawan &copy; 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_photo extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        // $this->load->model('gallery_photo_m');
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
            $data['gallery_photo'] = $this->gallery_photo_m->get_no_search($per_page)->result();
              
            $data['total_rows'] = $this->gallery_photo_m->count_thread($search,$list_cari);
        }else{
            //dump('ada');
            $data['gallery_photo'] = $this->gallery_photo_m->get_with_search($per_page,$list_cari)->result();
             
            $data['total_rows'] = $this->gallery_photo_m->count_thread($search,$list_cari);
        }
        
        
        //$data['gallery_photo'] = $this->gallery_photo_m->get();
        $data['subview'] = "admin/gallery_photo/index";
        $data['meta_title'] = $this->data['meta_title'];
        $data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $data);
    }

    public function edit($id = NULL) {
        if ($id) {
            $this->data['gallery_photo'] = $this->gallery_photo_m->get($id);
            count($this->data['gallery_photo']) || $this->data['errors'][] = "gallery_photo could not be found";
        } else {
            $this->data['gallery_photo'] = $this->gallery_photo_m->get_new();
        }
     

        $data = $this->gallery_photo_m->array_from_post(array('id','photo','caption','order'));
        $id == NULL || $this->data['gallery_photo'] = $this->gallery_photo_m->get($id);
        
        $this->data['subview'] = 'admin/gallery_photo/edit';
        $this->data['get_cat'] = $this->gallery_photo_m->get_cat();
         
        $this->data['meta_title'] = $this->data['meta_title'];
        $this->data['url'] = 'admin/gallery_photo/save';
        $this->data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete() {
       
        $id = $this->uri->segment(4);
        $getf = $this->db->where('id',$id)->get('gallery_photo')->row();
        
      
        
        $file = 'gallery_photo/'.$getf->photo;
        unlink($file);
        
        $sql = $this->gallery_photo_m->delete($id);

        redirect(base_url('admin/gallery_photo'));
    }
 
    public function save() {
        $data = $this->gallery_photo_m->array_from_post(array('id','photo','id_cat','caption','order'));
        
        $id = isset($data['id']) ? $data['id'] : NULL;
        $exe = $this->gallery_photo_m->save($data, $id);
         
        
        
        redirect(base_url('admin/gallery_photo'));
    }

    public function login() {
        //echo $this->gallery_photo_m->logout();
        print_r($this->gallery_photo_m->logged_in());
        /*
          $rules = $this->gallery_photo_m->rules;
          $this->form_validation->set_rules($rules);
          if($this->form_validation->run() == TRUE){
          //we can login and redirect to dashboard
          }


          $gallery_photo = $this->get_by(array(
          'email'=>$this->input->post('email'),
          'password'=>md5($this->input->post('password'))
          ),TRUE);
          if(count($gallery_photo)){
          $data = array('name'=>$gallery_photo->name,
          'email'=>$gallery_photo->email,
          'id'=>$gallery_photo->id,
          'loggedin'=>TRUE,
          );
          $this->session->set_gallery_photodata($data);
          redirect(base_url('admin/dashboard'));
          }

         */
        $this->gallery_photo_m->login();


        $data['subview'] = "admin/gallery_photo/login";
        $data['meta_title'] = $this->data['meta_title'];
        //var_dump($this->data);
        $this->load->view('admin/_layout_modal', $data);
    }

    public function logout() {
        $this->gallery_photo_m->logout();
    }

     

}
