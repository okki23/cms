 



<div class="container">
    <h1> User </h1>

    <div class="row"> 

        <div class="col-md-12">

        </div>
        <br>
        &nbsp;

    </div>

    <?php
    $dataSearch = array(
        "url" => base_url('admin/user/index'),
        "data_filter" => array(
            "name" => "Username",
            "email" => "Email"
        )
    );
    echo search_box($dataSearch);
    ?>
    <a href = "<?php echo base_url('admin/user/edit'); ?>" class="btn btn-primary" title="Add User"> <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> Add </a>
    <br>
    &nbsp;
    <table id="example" class="table table-bordered" cellspacing="0" width="100%" border = "1">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th style="text-align: center;">Opsi</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if (count($user)) {
                foreach ($user as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td align="center"> <?php echo btn_edit('admin/user/edit/' . $row->id); ?>  &nbsp;  
                            <?php echo btn_delete('admin/user/delete/' . $row->id); ?>  &nbsp;  </td>		 
                    </tr>
                    <?php
                }
            } else {
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

<div class="row">
    <div align="center">
<?php
$data = array(
    'total_rows' => $total_rows,
    'limit' => 10,
    'segment' => 4,
    'url' => base_url('admin/user/index/')
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

