<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js');?> "></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js');?> "></script> 
<link href="<?php echo base_url('assets/css/bootstrap-datepicker3.min.css');?>" rel="stylesheet">
<script type="text/javascript">
  $(document).ready(function(){
        $('#dp').datepicker({format: 'yyyy-mm-dd'
    
    });
      });
</script>
<div class="container">
<div class="col-md-12">
 <div class="row">
 
<form action="<?php echo base_url($url) ;?>" method="POST">
		<div class="col-md-12">
		 
			<input type="hidden" name="id" value="<?php echo $article->id; ?>" >
				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Publish Date  
					</label>
					 <input type="text" name="pubdate" class="form-control" id="dp" value="<?php echo $article->pubdate;?>"  >
					 
					 
				</div>
				
				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Title  
					</label>
					<input type="text" name="title" class="form-control" value="<?php echo $article->title;?>"  >
					 
				</div>
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						Slug
					</label>
					<input type="text" name="slug" class="form-control" value="<?php echo $article->slug;?>">
				</div>
				
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						 Body
					</label>
					<textarea name="body">   <?php echo $article->body;?></textarea>
					 
				</div>
			 
			 
				<input type="submit" name="input" value="Save" class="btn btn-primary">
</form>
		</div>
	</div>
	</div>
	</div>


<script type="text/javascript">
		tinymce.init({
  selector: 'textarea',
  height: 500,
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
	
	