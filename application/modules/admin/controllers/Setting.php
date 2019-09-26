<?php

/*
  author : Okki Setyawan &copy; 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('loggedin') == false) {
            redirect(base_url('admin/login'));
        }

        $this->load->model('setting_m');
        // if ($this->session->userdata('name') == '' || $this->session->userdata('name') == NULL) {
        //     redirect(base_url('admin/login'));
        // }
    }

    public function index() {
        $data['setting'] = $this->setting_m->get();
        $data['subview'] = "admin/setting/index";
        $data['meta_title'] = $this->data['meta_title'];
        $data['name'] = $this->session->userdata('name');
      
        $this->load->view('admin/_layout_main', $data);
    }

    public function edit($id = NULL) {
        if ($id) {
            $this->data['setting'] = $this->setting_m->get($id);
            //var_dump($this->data['setting'] = $this->setting_m->get($id));
            //echo $this->db->last_query();
            count($this->data['setting']) || $this->data['errors'][] = "setting could not be found";
        } else {
            $this->data['setting'] = $this->setting_m->get_new();
        }
        
        $data = $this->setting_m->array_from_post(array('site_name','url','site_description','template','style','filename','limit_post_per_page','slider_status','modified'));
        $id == NULL || $this->data['setting'] = $this->setting_m->get($id);
        $this->data['list_template'] = $this->setting_m->get_template();
        $this->data['subview'] = 'admin/setting/edit';
        $this->data['meta_title'] = $this->data['meta_title'];
        $this->data['url'] = 'admin/setting/save';
        $this->data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete() {
        $id = $this->uri->segment(4);
        
        $sql = $this->setting_m->delete($id);

        redirect(base_url('admin/setting'));
    }

    public function save() {
        $data = $this->setting_m->array_from_post(array('id','site_name','url','site_description','template','style','filename','limit_post_per_page','slider_status','modified'));
        
        $id = isset($data['id']) ? $data['id'] : NULL;
        $exe = $this->setting_m->save($data, $id);
        
        
        $filename = $this->input->post('filename');
        
        $config['upload_path']	= "assets/img/";
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size']  = 2000;
        $config['remove_spaces'] = TRUE;
    
        $this->load->library('upload');
        $this->upload->initialize($config);
                
        if($filename != ''){
          //echo "ada file";

           $this->upload->do_upload('foto');
        }
        
        
        
        redirect(base_url('admin/setting'));
    }

    public function login() {
        //echo $this->setting_m->logout();
        print_r($this->setting_m->logged_in());
        /*
          $rules = $this->setting_m->rules;
          $this->form_validation->set_rules($rules);
          if($this->form_validation->run() == TRUE){
          //we can login and redirect to dashboard
          }


          $setting = $this->get_by(array(
          'email'=>$this->input->post('email'),
          'password'=>md5($this->input->post('password'))
          ),TRUE);
          if(count($setting)){
          $data = array('name'=>$setting->name,
          'email'=>$setting->email,
          'id'=>$setting->id,
          'loggedin'=>TRUE,
          );
          $this->session->set_settingdata($data);
          redirect(base_url('admin/dashboard'));
          }

         */
        $this->setting_m->login();


        $data['subview'] = "admin/setting/login";
        $data['meta_title'] = $this->data['meta_title'];
        //var_dump($this->data);
        $this->load->view('admin/_layout_modal', $data);
    }

    public function logout() {
        $this->setting_m->logout();
    }

    public function _unique_email($str) {
        $id = $this->uri->segment(4);
        $this->db->where('email', $this->input->post('email'));
        !$id || $this->db->where('id !=', $id);
        $setting = $this->setting_m->get();

        if (count($setting)) {
            echo $this->session->set_flashdata('error', 'email already exist!');
            return FALSE;
        }
    }

}
