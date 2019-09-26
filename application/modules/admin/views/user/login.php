<div class="row">
    <?php
    //echo validation_errors(); 
    '<pre>' . print_r($this->session->userdata, TRUE) . '</pre>';
    ?>
    <form action="" method="POST">
        <div class="col-md-12">
            <form role="form" action="" method="POST">
                <div class="form-group">

                    <label for="exampleInputEmail1">
                        Email address
                    </label>
                    <input type="text" name="email" class="form-control">

                </div>
                <div class="form-group">

                    <label for="exampleInputPassword1">
                        Password
                    </label>
                    <input type="password" name="password" class="form-control">
                </div>

                <input type="submit" name="input" value="Sign In" class="btn btn-primary">
                <a href="<?php echo base_url('forgot_password'); ?>"> Forgot password ?</a>
            </form>
        </div>
</div>