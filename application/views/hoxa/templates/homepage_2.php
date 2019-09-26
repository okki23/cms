<style>
.custom-search-form{
    margin-top:5px;
}
</style>



<?php
 
if($sliderstat->slider_status == 'Y'){
   
?>

<div class="carousel slide" id="carousel-761432">
				<ol class="carousel-indicators">
                                    <?php
                                    foreach($slidercont as $listslide){
                                      
                                        if($listslide->id == '1'){
                                            echo '<li class="active" data-slide-to="0" data-target="#carousel-761432">
					</li>';
                                        }else{
                                              echo '<li data-slide-to="0" data-target="#carousel-761432">
					</li>';
                                        }
                                    }
                                    ?>
					
					 
				</ol>
				<div class="carousel-inner">
                                     <?php
                                    foreach($slidercont as $listph){
                                      
                                        if($listph->order == '1'){
                                             echo '<div class="item active">
						<img alt="Carousel Bootstrap First" src="'.base_url('uploads/'.$listph->foto).'">
						<div class="carousel-caption">
                                                <h4>
						'.$listph->caption_a.'
						</h4>
						<p>
						'.$listslide->caption_b.'
						</p>
						</div>
                                                </div>';
                                        }else{
                                             echo '<div class="item ">
						<img alt="Carousel Bootstrap First" src="'.base_url('uploads/'.$listph->foto).'">
						<div class="carousel-caption">
                                                <h4>
						'.$listph->caption_a.'
						</h4>
						<p>
						'.$listslide->caption_b.'
						</p>
						</div>
                                                </div>';
                                        }
                                           
                                        
                                    }
                                    ?>
					
					 
				</div> <a class="left carousel-control" href="#carousel-761432" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-761432" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>



<?php
}else{
?>


<?php
}
?>

	 

      <div class="col-sm-8 blog-main">
          
          <div class="blog-post" style="color: #000;">
             
            <h2> News Update </h2>
            
            <?php
            foreach($articles as $rowar){
            ?>
            <h2 class="blog-post-title"><?php echo get_excerpt($rowar); ?></h2>
            <?php
            }
            ?>
           
          </div><!-- /.blog-post -->
          
          
 
        </div><!-- /.blog-main -->
<!-- 

-->
<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            
           
          <div class="sidebar-module sidebar-module-inset">
              
           

              
           <h2 align="center">   </h2>
           <p class="blog-post-title">
               
              <form role="form" method="POST" action="<?php echo base_url('article/result'); ?>">
        
              <!-- Search Field -->
                <div class="row">

                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="text" name="search" placeholder="Search"/>
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"><span style="margin-left:10px;">Search</span></button>
                            </span>
                            </span>
                        </div>
                    </div>
                </div>
              </form>
                    
           </p>
           
          </div>
     
        </div><!-- /.blog-sidebar -->
        
        
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            
           
          <div class="sidebar-module sidebar-module-inset">
              
           

              
           <h2 align="center"> Recent News </h2>
           <p class="blog-post-title">
               
               <ul class="list-group">
                   <?php echo anchor($news_archive_link,'+ News Archive');?>
                     
               </ul> 
                    
           </p>
           
          </div>
     
        </div><!-- /.blog-sidebar -->
        
        
    
</div>
  
    <footer class="footer">
      <div class="container">
       <div align="right" style="padding: 5px 30px 5px 5px;">
       <h4> <small>   &copy; 2016 CMS MEJA    </small></h4>
       </div>
      </div>
    </footer>