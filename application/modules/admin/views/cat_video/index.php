 
 
 
		<div class="container">
		<h1> Video Category </h1>
		<a href = "<?php echo base_url('admin/cat_video/edit'); ?>" class="btn btn-primary" title="Add User"> <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> Add </a>
		<br>
		&nbsp;
		<table id="example" class="table table-bordered" cellspacing="0" width="100%" border = "1">
		<thead>
			<tr>
				<th>Category Photo</th>
				 
				<th>Opsi</th>
			 
			</tr>
		</thead>
		<tbody>
		<?php
		if(count($cat_video)){
		foreach($cat_video as $row){
		?>
			<tr>
				<td><?php echo $row->nama_kategori; ?></td>
				 
				<td><?php echo btn_edit('admin/cat_video/edit/'.$row->id);?>  &nbsp;  
					<?php echo btn_delete('admin/cat_video/delete/'.$row->id);?>  &nbsp;  </td>		 
			</tr>
		<?php
		}
		}else{
		?>
		
			<tr>
				<td colspan="4"> No Data To Display</td>
			</tr>
			
		<?php
		
		}
		?>
		</tbody>
		</table>
			
		</div>

 