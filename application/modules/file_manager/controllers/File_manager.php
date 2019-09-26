<?php
header('Access-Control-Allow-Origin:*');
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

defined('BASEPATH') OR exit('No direct script access allowed');

class File_manager extends FrontEnd_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        //$this->load->helper('path');
        //echo set_RealPath('uploads'). " - ".base_url('uploads');die();
        $this->load->view('file_manager/filemanager');
    }

    function elfinder_init() {
        $this->load->helper('general_helper');
        $opts = initialize_elfinder();
        $this->load->library('elfinder_lib', $opts);
    }

    // smpn195jkt.sch.id
    function elfinder_init_smpn195() {
        $this->load->helper('general_helper');
        $opts = initialize_elfinder_smpn195();
        $this->load->library('elfinder_lib', $opts);
    }

    function filetes() {
        $this->load->view('file_manager/filetes');
    }

}
