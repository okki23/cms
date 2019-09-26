 



<?php if (count($articles)) : foreach ($articles as $article): ?>
        <article class="col-md-12"> <?php echo get_excerpt($article); ?></article>
    <?php endforeach;
endif;
?>
 
        <br>
        
    <div class="pagination" align="center">
    <?php
    $data = array(
        'total_rows' => $total_rows,
        'limit' => $limit,
        'segment' => 2,
        'url' => base_url('news_archive/')
    );
    $config = create_paging(2,$data);
    $this->pagination->initialize($config);
    echo $this->pagination->create_links();
    //echo $page_link;
    ?>
    </div>











