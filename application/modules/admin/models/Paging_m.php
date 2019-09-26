<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_m extends MY_Model {

    protected $_table_name = 'slider';
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
        
             $list = array('id'=>NULL,'caption_a'=>$data['caption_a'],'caption_b'=>$data['caption_b'],'foto'=>$data['filename'],'order'=>$data['order'],'modified'=>$now);
             $this->db->set($list);
             $result = $this->db->insert($this->_table_name);
            
        }else   {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $list = array('caption_a'=>$data['caption_a'],'caption_b'=>$data['caption_b'],'foto'=>$data['filename'],'order'=>$data['order'],'modified'=>$now);

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

    

    public function get_new() {
        $slider = new StdClass();
        $slider->id = ''; 
        $slider->caption_a = '';
        $slider->caption_b = '';
        $slider->foto = '';
        $slider->order = '';

        return $slider;
    }

}

?>