<?php

/*
  author : Okki Setyawan &copy; 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_video extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        // if ($this->session->userdata('loggedin') == false) {
        //     redirect(base_url('admin/login'));
        // }

        // $this->load->model('gallery_video_m');
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
            $data['gallery_video'] = $this->gallery_video_m->get_no_search($per_page)->result();
              
            $data['total_rows'] = $this->gallery_video_m->count_thread($search,$list_cari);
        }else{
            //dump('ada');
            $data['gallery_video'] = $this->gallery_video_m->get_with_search($per_page,$list_cari)->result();
             
            $data['total_rows'] = $this->gallery_video_m->count_thread($search,$list_cari);
        }
        
        
        
        //$data['gallery_video'] = $this->gallery_video_m->get();
        $data['subview'] = "admin/gallery_video/index";
        $data['meta_title'] = $this->data['meta_title'];
        $data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $data);
    }

    public function edit($id = NULL) {
        if ($id) {
            $this->data['gallery_video'] = $this->gallery_video_m->get($id);
            count($this->data['gallery_video']) || $this->data['errors'][] = "gallery_video could not be found";
        } else {
            $this->data['gallery_video'] = $this->gallery_video_m->get_new();
        }
     

        $data = $this->gallery_video_m->array_from_post(array('id','video_ff','video_url','embed_code','caption','order'));
        $id == NULL || $this->data['gallery_video'] = $this->gallery_video_m->get($id);
        
        $this->data['subview'] = 'admin/gallery_video/edit';
        $this->data['meta_title'] = $this->data['meta_title'];
        $this->data['url'] = 'admin/gallery_video/save';
        $this->data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete() {
       
        $id = $this->uri->segment(4);
        $getf = $this->db->where('id',$id)->get('gallery_video')->row();
        
      
        
        $file = 'gallery_video/'.$getf->video;
        unlink($file);
        
        $sql = $this->gallery_video_m->delete($id);

        redirect(base_url('admin/gallery_video'));
    }
 
    public function save() {
        $data = $this->gallery_video_m->array_from_post(array('id','video_ff','video_url','embed_code','caption','order'));
        
        $id = isset($data['id']) ? $data['id'] : NULL;
        $exe = $this->gallery_video_m->save($data, $id);
        
        $filename = $this->input->post('filename');
        
        $config['upload_path']	= "gallery_video/";
        $config['allowed_types'] = 'mp4|avi|mkv|wmv';
        $config['max_size']  = 2000;
        $config['remove_spaces'] = TRUE;
    
        $this->load->library('upload');
        $this->upload->initialize($config);
                
        if($filename != ''){
          //echo "ada file";

           $this->upload->do_upload('foto');
        }
        
        
        redirect(base_url('admin/gallery_video'));
    }

    public function login() {
        //echo $this->gallery_video_m->logout();
        print_r($this->gallery_video_m->logged_in());
        /*
          $rules = $this->gallery_video_m->rules;
          $this->form_validation->set_rules($rules);
          if($this->form_validation->run() == TRUE){
          //we can login and redirect to dashboard
          }


          $gallery_video = $this->get_by(array(
          'email'=>$this->input->post('email'),
          'password'=>md5($this->input->post('password'))
          ),TRUE);
          if(count($gallery_video)){
          $data = array('name'=>$gallery_video->name,
          'email'=>$gallery_video->email,
          'id'=>$gallery_video->id,
          'loggedin'=>TRUE,
          );
          $this->session->set_gallery_videodata($data);
          redirect(base_url('admin/dashboard'));
          }

         */
        $this->gallery_video_m->login();


        $data['subview'] = "admin/gallery_video/login";
        $data['meta_title'] = $this->data['meta_title'];
        //var_dump($this->data);
        $this->load->view('admin/_layout_modal', $data);
    }

    public function logout() {
        $this->gallery_video_m->logout();
    }

     

}
