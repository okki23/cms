<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rss
 *
 * @author Sapta
 */
class Rss extends FrontEnd_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();

        $this->load->model('article_m');
        $this->load->helper('xml');
    }

    function index() {
        $data['encoding'] = 'utf-8';
        $data['feed_name'] = 'www.meja-cms.com';
        $data['feed_url'] = 'http://www.meja-cms.com';
        $data['page_description'] = 'Welcome to www.meja-cms.com feed url page';
        //$data['page_language'] = 'en-ca';
        $data['creator_email'] = 'cmsmeja@gmail.com';
        $query = $this->article_m->get_all(10);
        //print_r($query);die();
        $data['ARTICLE_DETAILS'] = null;
        if ($query) {
            $data['ARTICLE_DETAILS'] = $query;
        }
        header("Content-Type: application/rss+xml");
        $this->load->view('v_article_feed', $data);
    }

}
