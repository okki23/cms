<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/jquery-ui/css/base/jquery-ui.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/elfinder/css/theme.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/elfinder/css/elfinder.min.css'); ?>" />
        <script type="text/javascript" src="<?php echo base_url('assets/jquery-1.7.2.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery-ui/js/jquery-ui.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/elfinder/js/elfinder.min.js'); ?>"></script>

        <script type="text/javascript">
            jQuery(document).ready(function () {
                jQuery('#elfinder-tag').elfinder({
                    url: '<?php echo site_url('welcome/elfinder_init'); ?>',
                }).elfinder('instance');
            });
        </script>
    </head>
    <body>

        <div id="container">
            <div id="body">
                <div id="elfinder-tag" style="height: 100% !important;"></div>
            </div>

            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        </div>

    </body>
</html>