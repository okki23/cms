<script src="<?php echo base_url('assets/js/jquery.swipebox.js'); ?> "></script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/swipebox.css');?> ">
 
<div class="row">
  <div class="col-md-9">
      <h2><?php echo $page->title; ?></h2>
      <br>
      
      <a href="<?php echo base_url('foto'); ?>" class = "btn btn-primary"> <span class="glyphicon glyphicon-chevron-left"> </span> Back </a>
      <br>
      &nbsp;
      <div align="justify"> <?php echo $page->body; ?> </div>
  </div>
   
    
    <div class="col-md-9">
    
        <?php
        if(count($list_photo) < 1){
            echo "the gallery is empty!";
        }else{
            
            foreach($list_photo as $list){
                echo ' <a href="'.$list->photo.'" class="swipebox" title="'.$list->caption.'">
                        <img src="'.$list->photo.'" style="width:170px; height:100px;" alt="image" class="img-thumbnail">
                     </a>';
            }
        }
        
        ?>
   
	
      
 
    </div>
  <div class="col-md-3">
  <?php $this->load->view('default/sidebar'); ?>
  </div>
</div>

<script type="text/javascript">
	$( document ).ready(function() {

			/* Basic Gallery */
			$( '.swipebox' ).swipebox();
		 
 

      });
 </script>