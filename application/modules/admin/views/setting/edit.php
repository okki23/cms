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
		 
			<input type="hidden" name="id" value="<?php echo $setting->id; ?>" >
				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Site Name 
					</label>
					 <input type="text" name="site_name" class="form-control"  value="<?php echo $setting->site_name;?>"  >
					 	 
				</div>
                                <div class="form-group">
					 
					<label for="exampleInputEmail1">
						URL 
					</label>
					 <input type="text" name="url" class="form-control"  value="<?php echo $setting->url;?>"  >
					 	 
				</div>
                                
                           
				
				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Site Description  
					</label>
					<input type="text" name="site_description" class="form-control" value="<?php echo $setting->site_description;?>"  >
					 
				</div>
                        
                                        
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						Template
                                                 
					</label>
                                        <select name="template" class="form-control">
                                            
                                            <?php
                                            if($setting->template == ''){
                                                echo '<option value="" selected="selected">--</option>';
                                            }
                                                 
                                           
                                            foreach($list_template as $list){
                                                if($list->template_name == $setting->template){
                                                    echo '<option value="'.$list->template_name.'" selected=selected> '.$list->template_name.' </option>';
                                                }else{
                                                    echo '<option value="'.$list->template_name.'"> '.$list->template_name.' </option>';
                                                }
                                                
                                            }
                                            ?>
                                               
                                        </select>
					
				</div>
                        
                                <div class="form-group">
					 
					<label for="exampleInputPassword1">
						Style
                                                 
					</label>
                                        <select name="style" class="form-control">
                                            
                                            <?php
                                            if($setting->style == ''){
                                                echo '<option value="" selected="selected">--</option>';
                                            }
                                                 
                                           
                                            foreach($list_template as $list){
                                                if($list->template_name == $setting->style){
                                                    echo '<option value="'.$list->template_name.'" selected=selected> '.$list->template_name.' </option>';
                                                }else{
                                                    echo '<option value="'.$list->template_name.'"> '.$list->template_name.' </option>';
                                                }
                                                
                                            }
                                            ?>
                                               
                                        </select>
					
				</div>
                        
                                 
                        
                                
                        
                               <div class="form-group">
					 
					<label for="exampleInputEmail1">
						Favicon  
                                                
					</label>
                                    
                                        <table>
						<tr>
						<td> <input class="form-control" id="hasil" type="text" name="filename" value="<?php echo $setting->favicon; ?>" /> 
 </td>
						<td> &nbsp; <a id="getfile" class="btn btn-primary"> ...  </a>
                                                    <a id="batalin" onclick="cancelbtn();" class="btn btn-danger"> X  </a>						</td>
						<tr>
					</table>
                                   <br>
                                <div id="elfinder-tag" style="height: 100% !important;"></div>
					 
				</div>
                        
                        
                                 <div class="form-group">
					 
					<label for="exampleInputEmail1">
						Limit Post  
					</label>
					 <input type="number" name="limit_post_per_page" class="form-control"  value="<?php echo $setting->limit_post_per_page;?>"  >
					 	 
				</div>
                        
                        
                                <div class="form-group">
					 
					<label for="exampleInputEmail1">
						Slider Status  
					</label>
					<?php 
					echo form_dropdown('slider_status',array('Y'=>'Active','N'=>'Not Active'),$this->input->post('slider_status') ? $this->input->post('slider_status') : $setting->slider_status,'class="form-control"' );
					?>
					 	 
				</div>
                        
                      
			 
			 
				<input type="submit" name="input" value="Save" class="btn btn-primary">
</form>
		</div>
	</div>
	</div>
	</div>

 