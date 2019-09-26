 

 
 
		<div class="container">
		<h1> User </h1>
		<a href = "<?php echo base_url('admin/user/edit'); ?>" class="btn btn-primary" title="Add User"> <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> Add </a>
		<br>
		&nbsp;
		<table id="example" class="table table-bordered" cellspacing="0" width="100%" border = "1">
		<thead>
			<tr>
				<th>Username</th>
				<th>Email</th>
				<th>Opsi</th>
			 
			</tr>
		</thead>
		<tbody>
		<?php
		if(count($user)){
		foreach($user as $row){
			
		?>
			<tr>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->email;?></td>
				<td> <?php echo btn_edit('admin/user/edit/'.$row->id);?>  &nbsp;  
					<?php echo btn_delete('admin/user/delete/'.$row->id);?>  &nbsp;  </td>		 
			</tr>
		<?php
		}
		}else{
		?>
		
			<tr>
				<td colspan="3"> No Data To Display</td>
			</tr>
			
		<?php
		
		}
		?>
		</tbody>
		</table>
			
		</div>

 