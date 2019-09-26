 

 
 
		<div class="container">
		<h1> Page </h1>
		<a href = "<?php echo base_url('admin/page/edit'); ?>" class="btn btn-primary" title="Add User"> <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> Add </a>
		<br>
		&nbsp;
		<table id="example" class="table table-bordered" cellspacing="0" width="100%" border = "1">
		<thead>
			<tr>
				<th>Title</th>
				<td> Parent </th>
				<th>Opsi</th>
			 
			</tr>
		</thead>
		<tbody>
		<?php
		if(count($page)){
		foreach($page as $row){
		?>
			<tr>
				<td><?php echo $row->title; ?></td>
				<td><?php echo $row->parent_slug; ?></td>
				<td><?php echo btn_edit('admin/page/edit/'.$row->id);?>  &nbsp;  
					<?php echo btn_delete('admin/page/delete/'.$row->id);?>  &nbsp;  </td>		 
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

 