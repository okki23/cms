<?php

/*
  author : Okki Setyawan &copy; 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('migration');

        // if ($this->session->userdata('name') == '' || $this->session->userdata('name') == NULL) {
        //     redirect(base_url('admin/user/login'));
        // }
    }

    public function index() {
        $this->load->library('migration');
        if (!$this->migration->current()) {
            show_error($this->migration->error_string());
        } else {
            echo "Migration Worked!";
        }
    }

}
