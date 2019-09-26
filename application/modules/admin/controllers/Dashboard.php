<?php

/*
  author : Okki Setyawan &copy; 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct() {
        parent::__construct(); 
        // if ($this->session->userdata('loggedin') == NULL) {
        //     redirect(base_url('admin/login'));
        // }
    }

    public function index() {
        $this->load->model('article_m');
        $this->load->library('pagination');

        $data['limit'] = 10;

        $per_page = 10;

        $data['url'] = $this->uri->segment(2);
        $list_cari = $this->article_m->array_from_post(array('url', 'search_param', 'search'));

        $search = $this->input->post('search');
        if ($search == '') {
            //dump('kosong');
            $data['recent_articles'] = $this->article_m->get_recent_dashboard($per_page)->result();
            $data['total_rows'] = $this->article_m->count_thread($search, $list_cari);
        } else {
            //dump('ada');
            $data['recent_articles'] = $this->article_m->get_recent_dashboard_with_search($per_page, $list_cari)->result();
            $data['total_rows'] = $this->article_m->count_thread($search, $list_cari);
        }




        //dump($data['recent_articles']);
        //echo $this->db->last_query();


        $data['judul'] = 'CMS buatan gue';
        $data['meta_title'] = $this->data['meta_title'];
        $data['subview'] = 'admin/dashboard/index';
        $data['meta_title'] = $this->data['meta_title'];
        $data['name'] = $this->session->userdata('name');
        $this->load->view('admin/_layout_main', $data);
    }

    public function modal() {
        $this->load->view('admin/_layout_modal', $this->data);
    }

}
