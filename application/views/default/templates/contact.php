<div class="row">
  <div class="col-md-9">
      <h2><?php echo $page->title; ?></h2>
      <br>
      
       
      
      
      	<div class="col-md-12">
            <form method="POST" action="<?php echo base_url('mail/send_mail'); ?>" enctype="multipart/form-data">
                <div class="col-md-12">
                    <input id="name" name="name" type="text" class="form-control" placeholder="Name"> 
                    <br>
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email address">
                    <br>
                </div>
                <div class="col-md-12">
                    <textarea id="message" name="message" class="form-control" placeholder="Your Message" rows="5"></textarea>
                </div>
                  
                <div class="col-md-12">
                    <br>
                    <button id="contact-submit" type="submit" class="btn btn-block btn-primary">Send</button>
                </div>
            </form>
        </div>
  </div>
  <div class="col-md-3">
  <?php $this->load->view('default/sidebar'); ?>
  </div>
</div>