<?php

function get_comment() {
    $ci =& get_instance();
    $ci->load->model('comment/comment_m');
    
    $str_form = $ci->load->view('comment/comment_view');
    return $str_form;
}

?>
