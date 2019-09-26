<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png"  href="<?php echo base_url('assets/img/table2.png'); ?>">
    <title><?php echo "Administrator ".$meta_title; ?></title>
<?php if(isset($sortable) && $sortable == TRUE) : ?>
<link href="<?php echo base_url('assets/css/listnest.css');?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js');?> "></script>


<script type="text/javascript" src="<?php echo base_url('assets/jquery-ui/jquery-ui.js');?>"> </script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.mjs.nestedSortable.js');?>"> </script>
<?php
endif;
?>
<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js');?> "></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

 
    <link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/login.css');?>" rel="stylesheet">
	 
	<script type="text/javascript" src="<?php echo base_url('assets/js/tinymce.min.js');?>"> </script>
 
  </head>