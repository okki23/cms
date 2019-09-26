        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/jquery-ui/css/base/jquery-ui.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/elFinder/css/theme.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/elFinder/css/elfinder.min.css'); ?>" />
        <script type="text/javascript" src="<?php echo base_url('assets/jquery-1.7.2.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery-ui/js/jquery-ui.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/elFinder/js/elfinder.min.js'); ?>"></script>


 <script type="text/javascript">
function cancelbtn(){
			//alert('oke');
			$("#hasil").val('');
		}
$(document).ready(function(){
$("#elfinder-tag").hide();

  $("#getfile").click(function(){
        $("#elfinder-tag").toggle();
    });

});
            jQuery(document).ready(function () {
                jQuery('#elfinder-tag').elfinder({
                    url: '<?php echo base_url('file_manager/elfinder_init'); ?>',
		   getFileCallback: function(file) {
					  var filePath = file; //file contains the relative url.
					  console.log(filePath);
					  //var imgPath = "<img src = '"+filePath+"'/>";
					  //$('#selectedImages').append(imgPath); //add the image to a div so you can see the selected images
					  $("#hasil").val(filePath);
					  $('#elfinder-tag').hide(); //close the window after image is selected
					}
                }).elfinder('instance');
            });
        </script>

<div class="container">
<div class="col-md-12">
 <div class="row">
 
<form action="<?php echo base_url($url) ;?>" method="POST" enctype="multipart/form-data">
		<div class="col-md-12">
                  
			<input type="hidden" name="id" value="<?php echo $gallery_video->id; ?>" >

<div class="form-group">
					 <label for="exampleInputEmail1">
						Video From File
					</label>
					<table>
						<tr>
						<td> <input class="form-control" id="hasil" type="text" name="video_ff" value="<?php echo $gallery_video->video_ff; ?>" /> 
 </td>
						<td> &nbsp; <a id="getfile" class="btn btn-primary"> ...  </a> 
<a id="batalin" onclick="cancelbtn();" class="btn btn-danger"> X  </a> </td>
						<tr>
					</table>
					 
					
					 
				</div>


  <div id="elfinder-tag" style="height: 90%; border: 0px;  padding: 0px 0px 90px 0px;" ></div>

				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Video URL  
					</label>
					<input type="text" name="video_url" class="form-control" value="<?php echo $gallery_video->video_url;?>"  >
					 
				</div>
                        
                                <div class="form-group">
					 
					<label for="exampleInputEmail1">
						Embed Code <br> 
                                                (For embed your videos please use the http://www.vtubetools.com)
					</label>
					<input type="text" name="embed_code" class="form-control" value="<?php echo $gallery_video->embed_code;?>"  >
					 
				</div>
				
				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Caption  
					</label>
					<input type="text" name="caption" class="form-control" value="<?php echo $gallery_video->caption;?>"  >
					 
				</div>
				 
                                <div class="form-group">
					 
					<label for="exampleInputPassword1">
						Order 
					</label>
					<input type="text" name="order" class="form-control" value="<?php echo $gallery_video->order;?>">
				</div>
				
				 
			 
			 
				<input type="submit" name="input" value="Save" class="btn btn-primary">
                                <a href="<?php echo base_url('admin/gallery_video/');?>" class="btn btn-default"> Cancel</a>
</form>
		</div>
	</div>
	</div>
	</div>
 
	
	