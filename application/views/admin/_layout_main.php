<?php $this->load->view('admin/components/page_head'); ?>

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
                <a class="navbar-brand" href="<?php echo base_url('admin/dashboard'); ?>"><?php echo $meta_title; ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>">  Dashboard </a></li>
                    <li ><a href="<?php echo base_url('admin/user'); ?>">  User </a></li>
                    <li><a href="<?php echo base_url('admin/page'); ?>">  Pages </a></li>
                    <li ><a href="<?php echo base_url('admin/page/order'); ?>">  Page Order </a></li>
                    <li ><a href="<?php echo base_url('admin/article'); ?>">  Article </a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Widget  <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li ><a href="<?php echo base_url('admin/slider'); ?>">  Slider </a></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Gallery  <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li ><a href="<?php echo base_url('admin/cat_photo'); ?>">  Kategori Foto </a></li>
                            <li ><a href="<?php echo base_url('admin/gallery_photo'); ?>">  Foto </a></li>
                            <li ><a href="<?php echo base_url('admin/gallery_video'); ?>">  Video </a></li>

                        </ul>
                    </li> 
                    <li ><a href="<?php echo base_url('admin/setting'); ?>">  Setting </a></li>

                </ul>

                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class=" glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $name; ?>  <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('admin/user'); ?>"> <span class=" glyphicon glyphicon-wrench" aria-hidden="true"></span> User Setting</a></li>  
                            <li> <a href="<?php echo base_url(); ?>" target="_blank"> <span class=" glyphicon glyphicon-home" aria-hidden="true"></span>  View Your Site </a></li>
                            <li><a href="#"> <a href="<?php echo base_url('admin/login/logout'); ?>"> <span class=" glyphicon glyphicon-off" aria-hidden="true"></span>  Logout </a></li>

                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <section>

                </section>
            </div>


        </div>
    </div>

    <?php $this->load->view($subview); ?>
</body>

<?php $this->load->view('admin/components/page_tail'); ?>