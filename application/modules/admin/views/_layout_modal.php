<?php $this->load->view('admin/components/page_head'); ?>

<body>
    <div class="modal show" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="gridSystemModalLabel">Login</h4>
                </div>
                <div class="modal-body">
                    <?php $this->load->view($subview); ?>
                </div>

                <div class="modal-footer">
                    <p> &copy; 2016 <?php echo $meta_title; ?></p>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</body>
<?php $this->load->view('admin/components/page_tail'); ?>