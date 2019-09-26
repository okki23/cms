
<link rel='stylesheet' id='camera-css'  href='<?php echo base_url('assets/css/camera.css'); ?>' type='text/css' media='all'> 
 
    <script type='text/javascript' src='<?php echo base_url('assets/js/jquery.mobile.customized.min.js'); ?>'> </script>
    <script type='text/javascript' src='<?php echo base_url('assets/js/jquery.easing.1.3.js'); ?>'></script> 
    <script type='text/javascript' src='<?php echo base_url('assets/js/camera.min.js')?>'></script> 
    
    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_1').camera({
				thumbnails: true
			});

			 
		});
	</script>
<body>
    
<header id="header">

	<!-- Top header bar -->
	<div id="topHeader">
    
	<div class="wrapper">
         
        <div class="top_nav">
        <div class="container">
        <div class="right">
            
            <ul>
            	<li class="link"><a href="<?php echo base_url('admin/user/login'); ?>"><i class="fa fa-lock"></i> Login</a></li>
                <li class="link"><a href="register.html"><i class="fa fa-edit"></i> Register</a></li>
                <li><a href="mailto:info@yourdomain.com"><i class="fa fa-envelope"></i> info@sitedomain.com</a></li>
                <li><i class="fa fa-phone"></i> +88 123 456 7890</li>
            	
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
            </ul>
            
        </div><!-- end right social links -->
        
        </div>
        </div>
            
 	</div>
    
	</div><!-- end top navigation -->
	
    
	<div id="trueHeader">
    
	<div class="wrapper">
    
     <div class="container">
    
		<!-- Logo -->
		<div class="logo">
                    
                <table>
                    <tr>
                        <td>  <img src="<?php echo base_url('assets/img/table2.png'); ?>" width="50" height="50"> <h4> <?php echo $meta_title; ?> </h4> </td>
                       
                    </tr>
                </table>
                    
                </div>
		
	<!-- Menu -->
	<div class="menu_main">
        
	<div class="navbar yamm navbar-default">
    
    <div class="container">
      <div class="navbar-header">
        <div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1"  > <span>Menu</span>
          <button type="button" > <i class="fa fa-bars"></i></button>
        </div>
      </div>
      
      <div id="navbar-collapse-1" class="navbar-collapse collapse pull-right">
      
        <ul class="nav navbar-nav">
        
         
         <?php echo get_menu($menu); ?> 
        </ul>
           
        <div id="wrap">
          
        </div>  
            
      </div>
      </div>
     </div>
     
	</div><!-- end menu -->
        
	</div>
		
	</div>
    
	</div>
    
</header>

<div class="container">
 <?php 
 if($subview == 'homepage'){
      
 
 
 
 ?>
    
    <div class="row">
          

  
                    <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
                        <?php
                        foreach($slidercont as $listph){
                        ?>
                        <div data-thumb="<?php echo base_url('uploads/'.$listph->foto);?>" data-src="<?php echo base_url('uploads/'.$listph->foto);?>">
                            <div class="camera_caption fadeFromBottom">
                            <p> <b> <?php echo $listph->caption_a; ?> </b> <br>
                                    <?php echo $listph->caption_b; ?> </p>
                            </div>

                        </div>
                        <?php
                        }
                        ?>
                   
                    
                    </div><!-- #camera_wrap_1 --> 
             
        </div>
    
    <?php
    }else{
    ?>
    
    <?php
    }
    ?>
 

<!--header-->

    <div class="content_left">
    <div class="blog_post">	
        <div class="blog_postcontent">
         <!--loop isi-->
           <?php $this->load->view($curr_template->template.'/templates/' . $subview); ?>
        </div>
    </div><!-- /# end post -->
   
    </div>
    
 
        
        <div class="right_sidebar">
    
    <div class="sidebar_widget">
        
      
            
        <form role="form" method="POST" id="site-searchform" action="<?php echo base_url('article/result'); ?>">
        <div>
        <input class="input-text"  name="search" id="s" value="Search..." onFocus="if (this.value == 'Search...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Search...';}" type="text" />
        <input id="searchsubmit" value="Search" type="submit" />
        </div>
        
        </form>
        <br>
        &nbsp;
        <hr>
     
    
</div><!-- end right sidebar -->


</div><!-- end content area -->


    	
        
	 
    </div>
 <br>
<div class="footer1">
<div class="container">
	
	 
    
    
    
    <div class="clearfix divider_dashed1"></div>
    
    <div class="one_fourth animate" data-anim-type="fadeInUp">
        <ul class="faddress">
            <li><img src="images/footer-logo.png" alt="" /></li>
            <li><i class="fa fa-map-marker fa-lg"></i>&nbsp; 2901 Marmora Road, Glassgow,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seattle, WA 98122-1090</li>
            <li><i class="fa fa-phone"></i>&nbsp; 1 -234 -456 -7890</li>
            <li><i class="fa fa-print"></i>&nbsp; 1 -234 -456 -7890</li>
            <li><a href="mailto:info@yourdomain.com"><i class="fa fa-envelope"></i> info@yourdomain.com</a></li>
            <li><img src="images/footer-wmap.png" alt="" /></li>
        </ul>
	</div><!-- end address -->
    
    <div class="one_fourth animate" data-anim-type="fadeInUp">
    
	</div><!-- end links -->
        
   
  
    
</div>
</div><!-- end footer -->

<div class="clearfix"></div>

<div class="copyright_info">
<div class="container">

	<div class="clearfix divider_dashed10"></div>
    
    <div class="one_half animate" data-anim-type="fadeInRight">
            Copyright &copy; 2016 CMS Meja 
        
    </div>
    
    <div class="one_half last">
        
        <ul class="footer_social_links">
            <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-skype"></i></a></li>
            <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-flickr"></i></a></li>
            <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-html5"></i></a></li>
            <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li class="animate" data-anim-type="zoomIn"><a href="#"><i class="fa fa-rss"></i></a></li>
        </ul>
            
    </div>
    
</div>
</div><!-- end copyright info -->

    
 <!--footer here-->
 

<a href="#" class="scrollup">Scroll</a><!-- end scroll to top of the page-->





</div>
    
     

</body>