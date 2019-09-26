
<div class="container">
    <h3> Komentar : </h3>
    <?php
    $list_comment = $this->comment_m->get_parent_comment($requested_id);
    if (count($list_comment)) {
        foreach ($list_comment as $listing_com) {
            ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>    <?php echo $listing_com->name; ?>   <span class="label label-primary"> <?php echo tanggalan(substr($listing_com->date_post, 0, 10)); ?>  Pada  <?php echo substr($listing_com->date_post, 12, 14); ?> </span>  <br><hr>
                    <p><?php echo $listing_com->comment; ?></p>
                    <p> <a href="javascript:void(0)" id="linkrep" onclick="balaskomen('<?php echo $listing_com->id; ?>');
                                    return false;" data="<?php echo $listing_com->id; ?>">   Balas </a> </p><hr/>
                    
                    <div class="col-md-12">
                        <div class="balaskomen_<?=$listing_com->id;?> container"></div>
                    </div>
                    
                    <div class="col-md-12">
                        <?php
                        $list_child_comment = $this->comment_m->get_child_comment($listing_com->id);
                        foreach ($list_child_comment as $child_comment) {
                            echo '<div class="komen_' . $child_comment->id . ' container">
                                    
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> ' . $child_comment->name . ' <span class="label label-primary">' . tanggalan(substr($child_comment->date_post, 0, 10)) . ' Pada ' . substr($child_comment->date_post, 12, 14) . '</span>  <br>
                                    <div style="clear:both;margin-bottom:8px;"></div>
                                    <ul style="list-style:none;"><li>' . $child_comment->comment . '</li></ul>
                                    <hr/>
                                 </div>';
                        }
                        ?>
                    </div>
                    
                    <div style="clear: both;"></div>
                </li>
            </ul>
            <?php
        }
        ?>

        <?php
    } else {
        ?>
        <h4><span class="label label-danger">Tidak ada komentar untuk postingan ini</span></h4>
        <?php
    }
    ?>


    <div class="view_comment">
        <h3> Tinggalkan Komentar <span class="btlkomen"></span></h3>
        <hr>
        <?php
        $this->load->view('comment/comment_form');
        ?>
    </div>

</div>

<script type="text/javascript">
    function balaskomen(id) {
        var dthtml = $(".view_comment").html();
        $(".balaskomen_" + id).append(dthtml + '<div style="clear: both;margin-bottom:10px;"></div>');
        $(".btlkomen").append("<a href='javascript:void(0)' onclick='batalkomen(" + id + ");return false;'>Batalkan</a>");

        $(".view_comment").hide();
        $("#idbalas").val(id);
    }

    function batalkomen(id) {
        $(".balaskomen_" + id).empty();
        $(".btlkomen").empty();
        $(".view_comment").show();
    }
</script>