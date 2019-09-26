<?php

/*
  author : Okki Setyawan &copy; 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('loggedin') == false) {
            redirect(base_url('admin/login'));
        }

        $this->load->model('slider_m');
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
            $data['slider'] = $this->slider_m->get_no_search($per_page)->result();
            //echo $this->db->last_query();
            $data['total_rows'] = $this->slider_m->count_thread($search,$list_cari);
        }else{
            //dump('ada');
            $data['slider'] = $this->slider_m->get_with_search($per_page,$list_cari)->result();
            //echo $this->db->last_query();
            $data['total_rows'] = $this->slider_m->count_thread($search,$list_cari);
        }
        
        
        //$data['slider'] = $this->slider_m->get();
        $data['subview'] = "admin/slider/index";
        $data['meta_title'] = $this->data['meta_title'];
        $data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $data);
    }

    public function edit($id = NULL) {
        if ($id) {
            $this->data['slider'] = $this->slider_m->get($id);
            count($this->data['slider']) || $this->data['errors'][] = "slider could not be found";
        } else {
            $this->data['slider'] = $this->slider_m->get_new();
        }
        
        $data = $this->slider_m->array_from_post(array('id','caption_a','caption_b','foto'));
        $id == NULL || $this->data['slider'] = $this->slider_m->get($id);
        
        $this->data['subview'] = 'admin/slider/edit';
        $this->data['meta_title'] = $this->data['meta_title'];
        $this->data['url'] = 'admin/slider/save';
        $this->data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete() {
       
        $id = $this->uri->segment(4);
        $getf = $this->db->where('id',$id)->get('slider')->row();
        
      
        
        $file = 'uploads/'.$getf->foto;
        unlink($file);
        
        $sql = $this->slider_m->delete($id);

        redirect(base_url('admin/slider'));
    }

    public function save() {
        $data = $this->slider_m->array_from_post(array('id','caption_a','caption_b','filename','order'));
        
        $id = isset($data['id']) ? $data['id'] : NULL;
        $exe = $this->slider_m->save($data, $id);
        
        $filename = $this->input->post('filename');
        
        $config['upload_path']	= "uploads/";
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size']  = 2000;
        $config['remove_spaces'] = TRUE;
    
        $this->load->library('upload');
        $this->upload->initialize($config);
                
        if($filename != ''){
          //echo "ada file";

           $this->upload->do_upload('foto');
        }
        
        
        redirect(base_url('admin/slider'));
    }

    public function login() {
        //echo $this->slider_m->logout();
        print_r($this->slider_m->logged_in());
        /*
          $rules = $this->slider_m->rules;
          $this->form_validation->set_rules($rules);
          if($this->form_validation->run() == TRUE){
          //we can login and redirect to dashboard
          }


          $slider = $this->get_by(array(
          'email'=>$this->input->post('email'),
          'password'=>md5($this->input->post('password'))
          ),TRUE);
          if(count($slider)){
          $data = array('name'=>$slider->name,
          'email'=>$slider->email,
          'id'=>$slider->id,
          'loggedin'=>TRUE,
          );
          $this->session->set_sliderdata($data);
          redirect(base_url('admin/dashboard'));
          }

         */
        $this->slider_m->login();


        $data['subview'] = "admin/slider/login";
        $data['meta_title'] = $this->data['meta_title'];
        //var_dump($this->data);
        $this->load->view('admin/_layout_modal', $data);
    }

    public function logout() {
        $this->slider_m->logout();
    }

    public function _unique_email($str) {
        $id = $this->uri->segment(4);
        $this->db->where('email', $this->input->post('email'));
        !$id || $this->db->where('id !=', $id);
        $slider = $this->slider_m->get();

        if (count($slider)) {
            echo $this->session->set_flashdata('error', 'email already exist!');
            return FALSE;
        }
    }

}
