
<div class="row">
<div class="col-md-9">
    
    <div align="center">
        <?php echo $page_link; ?>
    </div>
    
    <?php if(count($articles)) : foreach($articles as $article): ?>
    <article class="col-md-12"> <?php echo get_excerpt($article); ?></article>
    <?php endforeach; endif; ?>
     
</div>
       
<div col-md-3>
 <h2 align="center"> 
Recent News
</h2>
   <div style="float:right;">
        <?php $this->load->view('default/sidebar'); ?>
   </div>
</div>


    

    
 
   
 
    
</div>
 