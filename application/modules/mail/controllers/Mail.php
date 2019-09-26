<?php
 
/*
  author : Okki Setyawan &copy; 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends FrontEnd_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('article_m');
        $this->data['recent_news'] = $this->article_m->get_recent();
    }
    
    public function send_mail(){
        $this->load->library('email');

        $this->email->from($this->input->post('email'),$this->input->post('name'));
        $this->email->to('okkisetyawan@gmail.com');
        //$this->email->cc('another@another-example.com');
        //$this->email->bcc('them@their-example.com');

        $this->email->subject('Contact From CMS Meja');
        $this->email->message($this->input->post('message'));

        $this->email->send();
        redirect(base_url('contact'));
    }

    public function index($id, $slug) {
        //dump($this->uri->segment(3));

        /*
          $get_title = str_replace("-"," ",$this->uri->segment(3));
          $get_id = intval($this->uri->segment(2));

          echo $get_title . "<br>";
          echo $get_id;

          $this->db->where('id',$get_id);
          $this->db->where('title',$get_title);
          var_dump($this->db->get('articles')->result());
         */
        $getdata = $this->db->where('id', $id)->get('articles')->row();
        $mytitle = str_replace(" ", "-", $getdata->title);
        $myid = $getdata->id;
        $requested_title = $this->uri->segment(3);
        $requested_id = $this->uri->segment(2);
        //dump($this->uri->segment(3));
        //$requested_id_article = $this->uri->segment(2);



        if ($mytitle != $requested_title || $myid != $requested_id) {
            redirect(base_url('article/' . $getdata->id . '/' . $mytitle, 'location', '301'));
        }



        $sql = $this->db->where('id', $id)->get('articles')->result();
        $this->data['curr_template'] = $this->page_m->get_current_theme();
        $this->data['curr_style'] = $this->page_m->get_current_theme();
        $this->data['articles'] = $sql;
        count($this->data['articles']) || show_404(uri_string());
        //var_dump($me);
         $this->data['articles_recent'] = $this->article_m->get_all_archive();
        $this->data['subview'] = 'article';
        $this->data['meta_title'] = $this->data['meta_title'];
        
        $this->data['requested_id'] = $requested_id;
        
        $this->load->view('_main_layout', $this->data);
    }
    
    public function comment_article(){
       
      $data = $this->article_m->array_from_post(array('id','id_article','name','email','web','comment','parent_id_comment'));
      //print_r($data);
      
      $uria = $this->input->post('uria');
      $urib = $this->input->post('urib');
      
      $id = isset($data['id']) ? $data['id'] : NULL;
      $exe = $this->article_m->save_comment($data, $id);
      redirect(base_url('article/'.$uria.'/'.$urib));
      //die();
    }
    
    
     public function save() {
        $data = $this->article_m->array_from_post(array('id', 'title', 'slug', 'pubdate', 'body'));
        
        $id = isset($data['id']) ? $data['id'] : NULL;
        $exe = $this->article_m->save($data, $id);
        
        redirect(base_url('admin/article'));
    }
    
    
    
    public function get_anak($parent_id_comment = 0){
        $all = $this->article_m->get_coms($parent_id_comment);
        return $all;
    }
    
    public function okki(){
        $data['listing'] = $this->article_m->get_allcom();
        $this->load->view('default/templates/lister',$data);
    }
    /* function display_comment($parent_id_comment = 0){
	$sql = mysql_query("select * from comment where parent_id_comment = ".$parent_id_comment);
	if(mysql_num_rows($sql) > 0){
		echo "<ul>";
		while($row = mysql_fetch_array($sql)){
			echo "<li>".$row['name']. " Says : ". $row['comment'];
			display_comment($row['id']);
			echo "</li>";
		}
		echo "</ul>";
	}
 }
     */
    //demi rekursif aku harus stress 2 hari
    public function list_coms($parent_id_comment = 0){
        $all = $this->article_m->get_coms($parent_id_comment);
        $str = "<ul>";
        foreach($all as $list){
        $str .= "<li>".$list['name'].' Said : '.$list['comment'];
        $this->list_coms($list['id']);
        $str .= "</li>";
        
        }
        /*
        echo "<ul>";
        foreach ($all as $list){
            
            echo "<li>".$list['name'].' Said : '.$list['comment'];
            $this->list_coms($list['id']);
            echo "</li>";
            
        }
        echo "</ul>";
        */
        $str .= "</ul>";
       dump($str);
     
//$data['isi_komen'] = $this->article_m->get_nested();
        //$this->load->view('default/templates/lister', $data);
        //echo json_encode($dataku,JSON_PRETTY_PRINT);
    }
}
