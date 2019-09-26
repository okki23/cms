<?php

/*
  author : Okki Setyawan &copy; 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        // if ($this->session->userdata('loggedin') == false) {
        //     redirect(base_url('admin/login'));
        // }

        $this->load->model('page_m');
    }

    public function index() {
        $this->load->library('pagination');
         
        $data['limit'] = 10;
        
        $per_page = 10;
            
        $data['url'] = $this->uri->segment(2);
        $list_cari = $this->page_m->array_from_post(array('url', 'search_param','search'));
   
        $search = $this->input->post('search');
        if($search == ''){
            //dump('kosong');
            $data['page'] = $this->page_m->get_with_parent($per_page)->result();
            //echo $this->db->last_query();
            $data['total_rows'] = $this->page_m->count_thread($search,$list_cari);
        }else{
            //dump('ada');
            $data['page'] = $this->page_m->get_with_parent_with_search($list_cari,$per_page)->result();
            //echo $this->db->last_query();
            $data['total_rows'] = $this->page_m->count_thread($search,$list_cari);
        }
         
        //$data['page'] = $this->page_m->get_with_parent();
        $data['subview'] = "admin/page/index";
        $data['meta_title'] = $this->data['meta_title'];
        $data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $data);
    }

    public function edit($id = NULL) {
        if ($id) {
            $this->data['page'] = $this->page_m->get($id);
            count($this->data['page']) || $this->data['errors'][] = "Page could not be found";
        } else {
            $this->data['page'] = $this->page_m->get_new();
        }
        
        $data = $this->page_m->array_from_post(array('title', 'slug', 'body'));
        
        $id == NULL || $this->data['page'] = $this->page_m->get($id);
        $this->data['pages_no_parents'] = $this->page_m->get_no_parents();
        $this->data['subview'] = 'admin/page/edit';
        $this->data['meta_title'] = $this->data['meta_title'];
        $this->data['url'] = 'admin/page/save';
        $this->data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete() {
        $id = $this->uri->segment(4);
        $sql = $this->page_m->delete($id);
        redirect(base_url('admin/page'));
    }

    public function save() {
        $data = $this->page_m->array_from_post(array('id', 'title', 'slug', 'body', 'parent_id', 'template','p_status'));
        
        $id = isset($data['id']) ? $data['id'] : NULL;
        $exe = $this->page_m->save($data, $id);
        
        redirect(base_url('admin/page'));
    }

    public function order() {
        $this->data['sortable'] = TRUE;
        $this->data['subview'] = 'admin/page/order';
        $this->data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function order_ajax() {
        //fetch all pages
        if (isset($_POST['sortable'])) {
            $this->page_m->save_order($_POST['sortable']);
        }

        $this->data['pages'] = $this->page_m->get_nested();
        
        //load view
        $this->load->view('admin/page/order_ajax', $this->data);
    }

    public function login() {
        //echo $this->page_m->logout();
        print_r($this->page_m->logged_in());
        /*
          $rules = $this->page_m->rules;
          $this->form_validation->set_rules($rules);
          if($this->form_validation->run() == TRUE){
          //we can login and redirect to dashboard
          }


          $page = $this->get_by(array(
          'email'=>$this->input->post('email'),
          'password'=>md5($this->input->post('password'))
          ),TRUE);
          if(count($page)){
          $data = array('name'=>$page->name,
          'email'=>$page->email,
          'id'=>$page->id,
          'loggedin'=>TRUE,
          );
          $this->session->set_pagedata($data);
          redirect(base_url('admin/dashboard'));
          }

         */
        $this->page_m->login();


        $data['subview'] = "admin/page/login";
        $data['meta_title'] = $this->data['meta_title'];
        //var_dump($this->data);
        $this->load->view('admin/_layout_modal', $data);
    }

    public function logout() {
        $this->page_m->logout();
    }

    public function _unique_email($str) {
        $id = $this->uri->segment(4);
        $this->db->where('email', $this->input->post('email'));
        !$id || $this->db->where('id !=', $id);
        $page = $this->page_m->get();

        if (count($page)) {
            echo $this->session->set_flashdata('error', 'email already exist!');
            return FALSE;
        }
    }

}
