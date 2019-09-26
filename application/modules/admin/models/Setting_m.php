<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class setting_m extends MY_Model {

    protected $_table_name = 'options';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'name';
    public $rules = array(
        'email' => array('field' => 'text',
            'type' => 'text',
            'label' => 'email',
            'rules' => 'trim|required|valid_email|xss_clean'
        ),
        'password' => array('field' => 'password',
            'label' => 'password',
            'rules' => 'trim|required')
    );
    protected $_timestamps = FALSE;

    function __construct() {
        parent::__construct();
    }

    public function array_from_post($fields) {
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }

    public function save($data, $id = NULL) {
        if ($this->_timestamps == TRUE) {
            $now = date('Y-m-d H:i:s');
         
            $data['modified'] = $now;
        }

        $result = false;

        if ($id === NULL || $id === 0 || $id === "") {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
             $now = date('Y-m-d H:i:s');
        
             $list = array('id'=>NULL,'site_name'=>$data['site_name'],'url'=>$data['url'],'site_description'=>$data['site_description'],'template'=>$data['template'],'style'=>$data['style'],'favicon'=>$data['filename'],'limit_post_per_page'=>$data['limit_post_per_page'],'slider_status'=>$data['slider_status'],'modified'=>$now);
             $this->db->set($list);
             $result = $this->db->insert($this->_table_name);
            
        }else   {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $list = array('site_name'=>$data['site_name'],'url'=>$data['url'],'site_description'=>$data['site_description'],'template'=>$data['template'],'style'=>$data['style'],'favicon'=>$data['filename'],'limit_post_per_page'=>$data['limit_post_per_page'],'slider_status'=>$data['slider_status'],'modified'=>$now);

            $this->db->set($list);
            $this->db->where($this->_primary_key, $id);
            $result = $this->db->update($this->_table_name);
            
        }
        return $result;
    }

    public function get($id = NULL) {
        if ($id != NULL) {
            $this->db->where('id', $id);
            return $this->db->get($this->_table_name)->row();
        } else {
            return $this->db->get($this->_table_name)->result();
        }
    }
    public function get_pref(){
        return $this->db->get($this->_table_name)->row();
    }

     public function get_template() {
       
            return $this->db->get('template')->result();
        
    }

    

    public function get_new() {
        $setting = new StdClass();
        $setting->id = ''; 
        $setting->site_name = '';
        $setting->url = '';
        $setting->site_description = '';
        $setting->template = '';
        $setting->style = '';
        $setting->favicon = '';
        $setting->limit_post_per_page = '';
        $setting->slider_status = '';
        $setting->filename = '';
 
        return $setting;
    }

}

?>