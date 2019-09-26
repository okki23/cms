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
        if(count($get_category) < 1){
            echo "the photo is empty!";
        }else{
            
            foreach($get_category as $list){
                $foto = $this->gallery_photo_m->get_thumb($list->id);
                
                echo ' <a href='.base_url('gallery_photo_detail/'.$list->id).'> 
                        <div style="width:30%; height: 75%;" class="img-thumbnail">
                           <div align="center">
                           
                            <img src="'.base_url('assets/img/folder.png').'">
                            <br>
                           '. @thumbs($foto).'
                            
                           </div>
                           
                         
                          
                            &nbsp;
                           <div style="width:100%; height: 20%;" align="center" class="img-thumbnail">
                            '.$list->nama_kategori.'
                           </div>
                        </div> </a> &nbsp;';
                /*
                echo '<div style="width:20%; height: 20%;" class="img-thumbnail">'
                . '<a href="'.base_url('gallery_photo_detail/'.$list->id).'">
                        <img src="'.base_url('assets/img/folder.png').'" >
                         <p> '.$list->nama_kategori.' </p>
                        </a>
                       
                        </div>
                        &nbsp;';
                
                 */
            }
        }
        
        /*
        if(count($gallery_photo) < 1){
            echo "the gallery is empty!";
        }else{
            get_category
            foreach($gallery_photo as $list){
                echo '<a href="'.$list->photo.'" class="swipebox" title="'.$list->caption.'">
                        <img src="'.$list->photo.'" width="20%" height="20%" alt="image" class="img-thumbnail">
                     </a>';
            }
        }
        */
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