<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	public $data = array();
	 
	 function __construct(){
		parent::__construct();
		//$this->data['errors'] = 'tidak ada';
		$this->data['meta_title'] = 'CMS Meja';
		//$this->data['site_name'] = config_item('site_name');
		//$this->listing['namaku'] = 'Okki Setyawan';
		//$this->listing['kampusku'] = 'STIKOM CKI';
		 //$this->data['name'] = $this->session->userdata('name');
	}
}
