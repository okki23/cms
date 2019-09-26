 

 
 
		<div class="container">
		<h1> Setting </h1>
		 
		<!--id
site_name
url
site_description
template
style
favicon
limit_post_per_page
slider_status
-->
                <table id="example" class="table table-bordered" cellspacing="0" width="100%" border = "1">
		<thead>
			<tr>
				<th>Site Name</th>
				<th>Theme </th>
                                <th>Limit Per Page </th>
                                <th>Slider </th>    
				<th>Opsi</th>
			 
			</tr>
		</thead>
		<tbody>
		<?php
		if(count($setting)){
		foreach($setting as $row){
		?>
			<tr>
				<td><?php echo $row->site_name; ?></td>
				<td><?php echo $row->template; ?></td>
                                <td><?php echo $row->limit_post_per_page; ?></td>
				<td><?php echo $row->slider_status; ?></td>
				<td><?php echo btn_edit('admin/setting/edit/'.$row->id);?>  &nbsp;  
					<?php echo btn_delete('admin/setting/delete/'.$row->id);?>  &nbsp;  </td>		 
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

 