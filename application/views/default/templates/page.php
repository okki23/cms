<div class="row">
  <div class="col-md-9">
      <h2><?php echo $page->title; ?></h2>
      <br>
      <div align="justify"> <?php echo $page->body; ?> </div>
  </div>
  <div class="col-md-3">
  <?php $this->load->view('default/sidebar'); ?>
  </div>
</div>