
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

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
           <h2 align="center"> Recent News </h2>
           <p class="blog-post-title">
               
               <ul class="list-group">
                   <?php echo anchor($news_archive_link,'+ News Archive');?>
                     
               </ul> 
                    
           </p>
             <div align="right">
                <?php echo $paging; ?>
            </div>
          </div>
     
        </div><!-- /.blog-sidebar -->
    
</div>
  
