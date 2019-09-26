<section>
    
    <p class="alert alert-info"> <b>Drag to order pages and then click 'Save'</b></p>
  
    <div id="orderResult"> 
   
    
    </div>
    <div id="loader" align="center">
    <img src="<?php echo base_url('assets/img/loader_action.gif'); ?>" width="100" height="100">
    </div>
    <input type="button" id="save" value="Save" class="btn btn-primary" />

</section>



<script type="text/javascript">
    $(function(){
        $("#loader").hide();
        $.post('<?php echo base_url('admin/page/order_ajax'); ?>',{},function(data){
            $("#orderResult").html(data);
        });
	
        $('#save').click(function(){
            //alert('ngehe');
            oSortable = $('.sortable').nestedSortable('toArray');
            //console.log(oSortable);
            //return false;
            $("#orderResult").slideUp(function(){
                $("#loader").show();
                $.post('<?php echo base_url('admin/page/order_ajax'); ?>',{sortable:oSortable},function(data){
                  $("#orderResult").html(data);
                  $("#loader").hide();
                  $("#orderResult").slideDown();
                  
            });
                
                
            });
		
        });


    });


</script>
