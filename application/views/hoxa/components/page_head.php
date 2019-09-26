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
        <link rel="icon" type="image/png"  href="<?php echo base_url('assets/themes/default/img/table2.png'); ?>">
        <title><?php echo $meta_title; ?></title>

        
 

        <script type="text/javascript" src="<?php echo base_url();?>/assets/themes/hoxa/js/universal/jquery.js"></script>

        <script src="<?php echo base_url();?>/assets/themes/hoxa/js/style-switcher/jquery-1.js"></script>

        <script src="<?php echo base_url();?>/assets/themes/hoxa/js/style-switcher/styleselector.js"></script>

        <script src="<?php echo base_url();?>/assets/themes/hoxa/js/animations/js/animations.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="<?php echo base_url();?>/assets/themes/hoxa/js/slidepanel/slidepanel.js"></script>

        <script src="<?php echo base_url();?>/assets/themes/hoxa/js/mainmenu/bootstrap.min.js"></script> 

        <script src="<?php echo base_url();?>/assets/themes/hoxa/js/mainmenu/customeUI.js"></script> 

        <script type="text/javascript" src="<?php echo base_url();?>/assets/themes/hoxa/js/carousel/jquery.jcarousel.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url();?>/assets/themes/hoxa/js/tabs/tabwidget/tabwidget.js"></script>

        <script src="<?php echo base_url();?>/assets/themes/hoxa/js/scrolltotop/totop.js" type="text/javascript"></script>

        <script src="<?php echo base_url();?>/assets/themes/hoxa/js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>

        <script type="text/javascript">
        (function($) {
        "use strict";

                jQuery(document).ready(function() {
                                jQuery('#mycarouselthree').jcarousel();
                });

        })(jQuery);
        </script>


        <script type="text/javascript" src="<?php echo base_url();?>/assets/themes/hoxa/js/accordion/custom.js"></script>

        <script type="text/javascript" src="<?php echo base_url();?>/assets/themes/hoxa/js/mainmenu/sticky.js"></script>

        <script type="text/javascript" src="<?php echo base_url();?>/assets/themes/hoxa/js/mainmenu/modernizr.custom.75180.js"></script>

        <script type="text/javascript" src="<?php echo base_url();?>/assets/themes/hoxa/js/cubeportfolio/jquery.cubeportfolio.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url();?>/assets/themes/hoxa/js/cubeportfolio/main4.js"></script>

        <script type="text/javascript" src="<?php echo base_url();?>/assets/themes/hoxa/js/cubeportfolio/main6.js"></script>

        <script defer src="<?php echo base_url();?>/assets/themes/hoxa/js/carousel/jquery.flexslider.js"></script>

        <script defer src="<?php echo base_url();?>/assets/themes/hoxa/js/carousel/custom.js"></script>

        <script type="text/javascript" src="<?php echo base_url();?>/assets/themes/hoxa/js/lightbox/jquery.fancybox.js"></script>

        <script type="text/javascript" src="<?php echo base_url();?>/assets/themes/hoxa/js/lightbox/custom.js"></script>

        <link rel="stylesheet" href="<?php echo base_url();?>/assets/themes/hoxa/css/reset.css" type="text/css" />

        <link rel="stylesheet" href="<?php echo base_url();?>/assets/themes/hoxa/css/style.css" type="text/css" />

        <link rel="stylesheet" href="<?php echo base_url();?>/assets/themes/hoxa/css/font-awesome/css/font-awesome.min.css">

        <link rel="stylesheet" media="screen" href="<?php echo base_url();?>/assets/themes/hoxa/css/responsive-leyouts.css" type="text/css" />

        <link href="<?php echo base_url();?>/assets/themes/hoxa/js/animations/css/animations.min.css" rel="stylesheet" type="text/css" media="all" />

        <link href="<?php echo base_url();?>/assets/themes/hoxa/js/mainmenu/sticky.css" rel="stylesheet">

        <link href="<?php echo base_url();?>/assets/themes/hoxa/js/mainmenu/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo base_url();?>/assets/themes/hoxa/js/mainmenu/demo.css" rel="stylesheet">

        <link href="<?php echo base_url();?>/assets/themes/hoxa/js/mainmenu/menu.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/themes/hoxa/js/slidepanel/slidepanel.css">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/themes/hoxa/js/cubeportfolio/cubeportfolio.min.css">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/themes/hoxa/js/tabs/tabwidget/tabwidget.css" />

        <link rel="stylesheet" href="<?php echo base_url();?>/assets/themes/hoxa/js/carousel/flexslider.css" type="text/css" media="screen" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/themes/hoxa/js/carousel/skin.css" />

        <link rel="stylesheet" href="<?php echo base_url();?>/assets/themes/hoxa/js/accordion/accordion.css" type="text/css" media="all">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/themes/hoxa/js/lightbox/jquery.fancybox.css" media="screen" />

 
    </head>
