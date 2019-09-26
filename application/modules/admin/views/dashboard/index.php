<h3 align="center"> Welcome to Administrator </h3> 
<br>
<div class="container">
 <div class="col-md-12">
        <h3>Recently Modified Article  </h3>
        
    <?php
    $dataSearch = array(
        "url" => base_url('admin/dashboard/index'),
        "data_filter" => array(
            "title" => "Title",
            "modified" => "Modified"
        )
    );
    echo search_box($dataSearch);
    ?>
        
         <br>
         &nbsp;
        <ul class="list-group">
             
            <?php 
            foreach($recent_articles as $list){
                //http://localhost/mycms/index.php/admin/article/edit/11
            ?>
            
            <li class="list-group-item"> <?php echo '<a href="'.base_url('admin/article/edit/'.$list->id).'"> '.$list->title.'</a>'; ?> -  Last update On <?php echo $list->modified; ?> </li>
            <?php
            }
            ?>
              
        </ul>
        
        <div class="row">
            <div align="center">
                <?php
            $data = array(
                'total_rows' => $total_rows,
                'limit' => 10,
                'segment' => 4,
                'url' => base_url('admin/dashboard/index/')
            );
            $config = create_paging(1,$data);
            $this->pagination->initialize($config);
            echo $this->pagination->create_links();
            //echo $page_link;
            ?>
            </div>
        </div>
        
 </div>
 </div>

<script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js');?> "></script> 
<link href="<?php echo base_url('assets/css/bootstrap-datepicker3.min.css');?>" rel="stylesheet">
 
 <script type="text/javascript">
    
    
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("value");
		var concept = $(this).text();
                var oke = $('.input-group #search_param').val(param);
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
                if(oke != ''){
                    $('.search').prop("disabled",false); 
                    if(param == 'modified'){
                       $('.search').attr("id","modified");
                       $('#modified').datepicker({format: 'yyyy-mm-dd'});
                    }else{
                       $('.search').removeAttr('id');
                    }
                }else{
                    $('.search').prop("disabled",false);
                }
	});
        
   
 
</script>