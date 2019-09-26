<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png"  href="<?php echo base_url('assets/img/table2.png'); ?>">
        <title><?php echo "Administrator " . $meta_title; ?></title>

        <script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?> "></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>


        <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/login.css'); ?>" rel="stylesheet">

        <script type="text/javascript" src="<?php echo base_url('assets/js/tinymce.min.js'); ?>"></script>

    </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo $meta_title; ?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">



                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>


        <div class="container">
            <div class="row">

                <?php if (isset($get_email->email)) { ?>
                    <form action="<?php echo base_url($url); ?>" method="POST">
                        <div class="col-md-12">
                            <input type="hidden" name="email" value="<?php echo @$get_email->email; ?>"  >

                            <div class="form-group">

                                <label for="exampleInputEmail1">
                                    New Password 
                                </label>
                                <input type="password" name="password" class="form-control"  >

                            </div>


                            <input type="submit" name="input" value="Save" class="btn btn-primary">

                        </div>
                    </form>
                <?php } else { ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            <h2>
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error :</span>
                                Email INVALID !
                            </h2>
                        </div>
                        <a href="<?php echo base_url('forgot_password'); ?>" class="btn btn-primary"> Back</a>
                    </div>
                <?php } ?>
            </div>
        </div>


    </body>
</html>