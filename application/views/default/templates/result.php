<div class="container">
<h3>  <span class="label label-success">  Result of "<?php echo $result; ?>"  </span> </h3>
</div>
 
<?php if (count($articles)) : foreach ($articles as $article): ?>
        <article class="col-md-12"> <?php echo get_excerpt_detail($article); ?></article>
        <?php
    endforeach;
endif;
?>
<br>
  