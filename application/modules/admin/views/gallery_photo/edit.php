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
/*var cek = $("#hasil").val();

if(cek == ''){
$('#cancelbtn').hide();
}else{
$('#cancelbtn').show();
}

$('#cancelbtn').click(function(){
alert('oncom');
});
*/

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



		 
			<input type="hidden" name="id" value="<?php echo $gallery_photo->id; ?>" >
				<div class="form-group">
					 <label for="exampleInputEmail1">
						Foto
					</label>
					<table>
						<tr>
						<td> <input class="form-control" id="hasil" type="text" name="photo" value="<?php echo $gallery_photo->photo; ?>" /> 
 </td>
						<td> &nbsp; <a id="getfile" class="btn btn-primary"> ...  </a>

<a id="batalin" onclick="cancelbtn();" class="btn btn-danger"> X  </a>						</td>
						<tr>
					</table>
					 
					
					 
				</div>

  <div id="elfinder-tag" style="height: 90%; border: 0px;  padding: 0px 0px 90px 0px;" ></div>
				 
                            <div class="form-group">
					 
					<label for="exampleInputEmail1">
						Kategori  
					</label>
                                        <select name="id_cat" class="form-control">
                                            <option value="">---</option>
                                            <?php 
                                            foreach($get_cat as $listcat){
                                                if($listcat->id == $gallery_photo->id_cat){
                                            echo '<option value='.$listcat->id.' selected=selected> '.$listcat->nama_kategori.'</option>';
                                 
                                                }else{
                                            echo '<option value='.$listcat->id.'> '.$listcat->nama_kategori.'</option>';
                                 
                                                }
                                            }
                                            ?>
                                        </select>
				</div>
				
    
                                <div class="form-group">
					 
					<label for="exampleInputEmail1">
						Caption  
					</label>
					<input type="text" name="caption" class="form-control" value="<?php echo $gallery_photo->caption;?>"  >
					 
				</div>
				 
                                <div class="form-group">
					 
					<label for="exampleInputPassword1">
						Order 
					</label>
					<input type="text" name="order" class="form-control" value="<?php echo $gallery_photo->order;?>">
				</div>
				
				 
			 
			 
				<input type="submit" name="input" value="Save" class="btn btn-primary">
                                <a href="<?php echo base_url('admin/gallery_photo/');?>" class="btn btn-default"> Cancel</a>
</form>
		</div>
	</div>
	</div>
	</div>
 
	
	