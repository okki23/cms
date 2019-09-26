 



<div class="container">
    <h1> Article </h1>
    <a href = "<?php echo base_url('admin/article/edit'); ?>" class="btn btn-primary" title="Add User"> <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> Add </a>
    <br>
    &nbsp;
    <table id="example" class="table table-bordered" cellspacing="0" width="100%" border = "1">
        <thead>
            <tr>
                <th>Title</th>
                <td>Pubdate </th>
                <th>Opsi</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if (count($article)) {
                foreach ($article as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row->title; ?></td>
                        <td><?php echo $row->pubdate; ?></td>
                        <td><?php echo btn_edit('admin/article/edit/' . $row->id); ?>  &nbsp;  
                            <?php echo btn_delete('admin/article/delete/' . $row->id); ?>  &nbsp;  </td>		 
                    </tr>
                    <?php
                }
            } else {
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

