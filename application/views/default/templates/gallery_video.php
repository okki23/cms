<script src="<?php echo base_url('assets/js/jquery.swipebox.js'); ?> "></script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/swipebox.css');?> ">

<div class="row">
  <div class="col-md-9">
      <h2><?php echo $page->title; ?></h2>
      <br>
      <div align="justify"> <?php echo $page->body; ?> </div>
  </div>
   
    
    <div class="col-md-9">
    
        
        <?php
        if(count($gallery_video) < 1){
            echo "the gallery is empty!";
        }else{
            
            foreach($gallery_video as $list){
                
                if($list->video_ff == ''){
                    
                }else{
                    echo ' <div style="width:30%; height: 75%;" class="img-thumbnail">
                        
                           <video controls style="width:100%; height: 136px;"> 
                           <source src="'.$list->video_ff.'" type="video/mp4">
                           
                           Your browser does not support the video tag.
                           </video>
                            &nbsp;
                           <div style="width:100%; height: 20%;" class="img-thumbnail" align="center">
                       '.$list->caption.'
                       </div>
                           </div>
                           ';
                }
                
                if($list->video_url == ''){
                    
                }else{
                     echo '<div style="width:30%; height: 20%;" class="img-thumbnail">
                           <a class="swipebox-video" rel="youtube" href="'.$list->video_url.'">
                              
                               <div class="embed-responsive embed-responsive-16by9">
                                       <iframe class="embed-responsive-item" src="'.$list->embed_code.'"></iframe>
                               </div>
                           </a>
                           
                           &nbsp;
                           <div style="width:100%; height: 20%;" class="img-thumbnail" align="center">
                       '.$list->caption.'
                       </div>
                       </div>
                       
                       ';
                }
               
                
                
            }
        }
        
        ?>
 
    <br>

     
    
    
    </div>
  <div class="col-md-3">
  <?php $this->load->view('default/sidebar'); ?>
  </div>
</div>

<script type="text/javascript">
	$( document ).ready(function() {

			/* Basic Gallery */
			$( '.swipebox' ).swipebox();
		 /* Video */
			$(".swipebox-video").swipebox();

 

      });
 </script>