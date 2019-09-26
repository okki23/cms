<?php

/*
  Copyright : CMS Meja &copy; 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('comment_m');
        $this->load->helper('comment');
       
    }
   
}
