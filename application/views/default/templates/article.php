

<?php if (count($articles)) : foreach ($articles as $article): ?>
        <article class="col-md-12"> <?php echo get_excerpt_detail($article); ?></article>
        <?php
    endforeach;
endif;
?>
<br>

<?php $this->load->helper('comment'); ?>
<?= get_comment(); ?>

<br>
&nbsp;
 