 

 
 
		<div class="container">
		<h1> Page </h1>
                 <?php
                    $dataSearch = array(
                        "url" => base_url('admin/page/index'),
                        "data_filter" => array(
                            "title" => "Title"
                             
                        )
                    );
                    echo search_box($dataSearch);
                    ?>
        
                
		<a href = "<?php echo base_url('admin/page/edit'); ?>" class="btn btn-primary" title="Add User"> <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> Add </a>
		<br>
		&nbsp;
		<table id="example" class="table table-bordered" cellspacing="0" width="100%" border = "1">
		<thead>
			<tr>
				<th>Title</th>
				<td>Parent </th>
                                <td>Status </th>
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
                                <td><?php echo $row->p_status; ?></td>
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



<div class="row">
    <div align="center">
<?php
$data = array(
    'total_rows' => $total_rows,
    'limit' => 10,
    'segment' => 4,
    'url' => base_url('admin/page/index/')
);
$config = create_paging(1, $data);
$this->pagination->initialize($config);
echo $this->pagination->create_links();
//echo $page_link;
?>
    </div>
</div>



<script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js'); ?> "></script> 
<link href="<?php echo base_url('assets/css/bootstrap-datepicker3.min.css'); ?>" rel="stylesheet">

<script type="text/javascript">


    $('.search-panel .dropdown-menu').find('a').click(function (e) {
        e.preventDefault();
        var param = $(this).attr("value");
        var concept = $(this).text();
        var oke = $('.input-group #search_param').val(param);
        $('.search-panel span#search_concept').text(concept);
        $('.input-group #search_param').val(param);
        if (oke != '') {
            $('.search').prop("disabled", false);
            if (param == 'modified') {
                $('.search').attr("id", "modified");
                $('#modified').datepicker({format: 'yyyy-mm-dd'});
            } else {
                $('.search').removeAttr('id');
            }
        } else {
            $('.search').prop("disabled", false);
        }
    });



</script>
 