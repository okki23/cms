<?php

/*
  author : Okki Setyawan &copy; 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('user_m');
        //  if ($this->session->userdata('loggedin') == false) {
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
            $data['user'] = $this->user_m->get_recent_dashboard($per_page)->result();
              
            $data['total_rows'] = $this->user_m->count_thread($search,$list_cari);
        }else{
            //dump('ada');
            $data['user'] = $this->user_m->get_recent_dashboard_with_search($per_page,$list_cari)->result();
             
            $data['total_rows'] = $this->user_m->count_thread($search,$list_cari);
        }
        
        
      
        $data['subview'] = "admin/user/index";
        $data['meta_title'] = $this->data['meta_title'];
        $data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $data);
    }

    public function edit($id = NULL) {
        if ($id) {
            $this->data['user'] = $this->user_m->get($id);
            count($this->data['user']) || $this->data['errors'][] = "User could not be found";
            $this->data['req'] = '';
        } else {
            $this->data['user'] = $this->user_m->get_new();
            $this->data['req'] = 'required=required';
        }

        $data = $this->user_m->array_from_post(array('name', 'email', 'password'));
        $data['password'] = $this->user_m->hash($data['email'],$data['password']);

        //echo $this->uri->segment(4);
        $id == NULL || $this->data['user'] = $this->user_m->get($id);
        $this->data['subview'] = 'admin/user/edit';
        $this->data['meta_title'] = $this->data['meta_title'];
        $this->data['url'] = 'admin/user/save';
        $this->data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete() {
        $id = $this->uri->segment(4);
        //echo "lu klik delete id ke".$id;
        //exit();
        $sql = $this->user_m->delete($id);

        redirect(base_url('admin/user'));
    }

    public function save() {
        $data = $this->user_m->array_from_post(array('id', 'name', 'email', 'password'));
        
        $id = isset($data['id']) ? $data['id'] : NULL;

        $exe = $this->user_m->save($data, $id);
        if ($exe) {
            redirect(base_url('admin/user'));
        }
    }

    public function login() {
        //echo $this->user_m->logout();
        //print_r ($this->user_m->logged_in());
        /*
          $rules = $this->user_m->rules;
          $this->form_validation->set_rules($rules);
          if($this->form_validation->run() == TRUE){
          //we can login and redirect to dashboard
          }


          $user = $this->get_by(array(
          'email'=>$this->input->post('email'),
          'password'=>md5($this->input->post('password'))
          ),TRUE);
          if(count($user)){
          $data = array('name'=>$user->name,
          'email'=>$user->email,
          'id'=>$user->id,
          'loggedin'=>TRUE,
          );
          $this->session->set_userdata($data);
          redirect(base_url('admin/dashboard'));
          }

         */
        $this->user_m->login();

        //dump($this->user_m->login());
        
        $data['subview'] = "admin/login";

        $data['meta_title'] = $this->data['meta_title'];
        //var_dump($this->data);
        $this->load->view('admin/_layout_modal', $data);
    }

    public function logout() {
        $this->user_m->logout();
    }

    public function _unique_email($str) {
        $id = $this->uri->segment(4);
        $this->db->where('email', $this->input->post('email'));
        !$id || $this->db->where('id !=', $id);
        $user = $this->user_m->get();

        if (count($user)) {
            echo $this->session->set_flashdata('error', 'email already exist!');
            return FALSE;
        }
    }

}
