 <div class="container">
 <div class="col-md-12">
 <div class="row">
 
<form action="<?php echo base_url($url) ;?>" method="POST">
		<div class="col-md-12">
		 
			<input type="hidden" name="id" value="<?php echo $page->id; ?>" >
				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Parent  
					</label>
					<?php 
					echo form_dropdown('parent_id',$pages_no_parents,$this->input->post('parent_id') ? $this->input->post('parent_id') : $page->parent_id,'class="form-control"' );
					?>
					 
				</div>
                        
                                <div class="form-group">
					 
					<label for="exampleInputEmail1">
						Template  
					</label>
					<?php 
					echo form_dropdown('template',array('homepage'=>'Homepage','news_archive'=>'News Archive','page'=>'Page','gallery_photo'=>'Photo Gallery','gallery_photo_detail'=>'Gallery Photo Detail','gallery_video'=>'Video Gallery','about'=>'About','contact'=>'Contact'),$this->input->post('template') ? $this->input->post('template') : $page->template,'class="form-control"' );
					?>
					 
				</div>
				
				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Title  
					</label>
					<input type="text" name="title" class="form-control" value="<?php echo $page->title;?>"  >
					 
				</div>
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						Slug
					</label>
					<input type="text" name="slug" class="form-control" value="<?php echo $page->slug;?>">
				</div>
				
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						 Body
					</label>
					<textarea name="body">   <?php echo $page->body;?></textarea>
					 
				</div>
                        
                               <div class="form-group">
				<label for="exampleInputEmail1">
						Status  
					</label>
					<?php 
                                        
					echo form_dropdown('p_status',array(''=>'--','Y'=>'Active','N'=>'Not Active',),$this->input->post('p_status') ? $this->input->post('p_status') : $page->p_status,'class="form-control"' );
					?>
					 	 
                               </div>
			 
			 
				<input type="submit" name="input" value="Save" class="btn btn-primary">
                                <a href="<?php echo base_url('admin/page/');?>" class="btn btn-default"> Cancel</a>
</form>
		</div>
	</div>
	</div>
	</div>
	<script type="text/javascript">
		tinymce.init({
  selector: 'textarea',
  height: 250,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
		</script>
	
	