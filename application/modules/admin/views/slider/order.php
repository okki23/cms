<section>
	<h2> Order Pages</h2>
	<p class="alert alert-info"> <b>Drag to order pages and then click 'Save'</b></p>
	<div id="orderResult"> </div>
	<input type="button" id="save" value="Save" class="btn btn-primary" />
	 
</section>
 
 

<script type="text/javascript">
$(function(){
	$.post('<?php echo base_url('admin/page/order_ajax');?>',{},function(data){
		$("#orderResult").html(data);
	});
	
	$('#save').click(function(){
		//alert('ngehe');
		oSortable = $('.sortable').nestedSortable('toArray');
		console.log(oSortable);		
		
		$.post('<?php echo base_url('admin/page/order_ajax');?>',{sortable:oSortable},function(data){
			$("#orderResult").html(data);
		});
		
	});


});


</script>
