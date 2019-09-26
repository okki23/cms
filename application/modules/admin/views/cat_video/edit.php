        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/jquery-ui/css/base/jquery-ui.css'); ?>" />
        <script type="text/javascript" src="<?php echo base_url('assets/jquery-1.7.2.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery-ui/js/jquery-ui.min.js'); ?>"></script>
     

<div class="container">
<div class="col-md-12">
<div class="row">
 
<form action="<?php echo base_url($url) ;?>" method="POST" enctype="multipart/form-data">
		<div class="col-md-12">

 
			<input type="hidden" name="id" value="<?php echo $cat_photo->id; ?>" >
				 
 
				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Category Photo  
					</label>
					<input type="text" name="nama_kategori" class="form-control" value="<?php echo $cat_photo->nama_kategori;?>"  >
					 
				</div>
				 
                             
			 
				<input type="submit" name="input" value="Save" class="btn btn-primary">
</form>
		</div>
	</div>
	</div>
	</div>
 
	
	