<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_photo_m extends MY_Model {

    protected $_table_name = 'gallery_photo';
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
    
      public function get_with_search($limit,$search) {
        
      $offset = $this->uri->segment(4);
        $this->db->like($search['search_param'],$search['search']);
        $this->db->order_by('id','desc');
        return $this->db->limit($limit, $offset)->get($this->_table_name);
   
    }
     
    public function get_no_search($limit) {
        
        $offset = $this->uri->segment(4);
        $this->db->order_by('id','desc');
        return $this->db->limit($limit, $offset)->get($this->_table_name);
   
    }
    
     public function count_thread($search,$list_cari=NULL){
       // $this->db->where('cat_thread',$id);
        if($search == ''){
             $sql = $this->db->count_all_results($this->_table_name);
        
        }else{
             $this->db->where($list_cari['search_param'],$list_cari['search']);
             $sql = $this->db->count_all_results($this->_table_name);
        }
        return $sql;
       
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
        
             $list = array('id'=>NULL,'caption'=>$data['caption'],'id_cat'=>$data['id_cat'],'photo'=>$data['photo'],'order'=>$data['order'],'modified'=>$now);
             $this->db->set($list);
             $result = $this->db->insert($this->_table_name);
            
        }else   {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $list = array('caption'=>$data['caption'],'photo'=>$data['photo'],'id_cat'=>$data['id_cat'],'order'=>$data['order'],'modified'=>$now);

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
    
    public function get_cat(){
        return $this->db->get('kat_photo')->result();
    }
    
    public function get_list_photo($id){
        $this->db->where('id_cat',$id);
        return $this->db->get($this->_table_name)->result();
    }
    
    public function get_thumb($id){
        $this->db->where('id_cat',$id);
        $this->db->limit(1);
        return $this->db->get('gallery_photo')->row();
    }
     
    
    

    public function get_new() {
        $gallery_photo = new StdClass();
        $gallery_photo->id = ''; 
        $gallery_photo->caption = '';
        $gallery_photo->photo = '';
        $gallery_photo->id_cat = '';
  
        $gallery_photo->order = '';

        return $gallery_photo;
    }

}

?>