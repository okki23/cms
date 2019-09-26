
<div class="row">
<div class="col-md-9">
    
 
    
    <?php if(count($articles)) : foreach($articles as $article): ?>
    <article class="col-md-12"> <?php echo get_excerpt($article); ?></article>
    <?php endforeach; endif; ?>
    
    
    <div align="center">
        <?php
    $data = array(
        'total_rows' => $total_rows,
        'limit' => $limit,
        'segment' => 2,
        'url' => base_url('news_archive/')
    );
    $config = create_paging(1,$data);
    $this->pagination->initialize($config);
    echo $this->pagination->create_links();
    //echo $page_link;
    ?>
    </div>
    
    
    
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
 