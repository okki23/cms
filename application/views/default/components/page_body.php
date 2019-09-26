<style>
.custom-search-form{
    margin-top:5px;
}
</style>



<body>


    <div class="container">
        <div class="row">
            <table>
                <tr>
                    <td>  <img src="<?php echo base_url('assets/img/table2.png'); ?>" width="50" height="50"></td>
                    <td>   <h3>  <?php echo $meta_title; ?> </h3> </td>
                </tr>
            </table>


            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->


                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php echo get_menu($menu); ?>
                             
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo base_url('admin/login'); ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Sign In </a></li>

                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div> 
 
          <div class="row">
           <form role="form" method="POST" action="<?php echo base_url('article/result'); ?>">
              <!-- Search Field -->
                <div class="row">
                    <div class="col-md-8">
                    &nbsp;
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" type="text" name="search" placeholder="Search"/>
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"><span style="margin-left:10px;">Search</span></button>
                                </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>  
              </form>
           </div>
   
        <div class="row">
            <?php $this->load->view('default/templates/' . $subview); ?>
        </div>
        
        




</body>
<footer class="footer">
      <div class="container">
       <div align="right" style="padding: 5px 30px 5px 5px;">
       <h4> <small>   &copy; 2016 CMS Meja V 1.01   </small></h4>
       </div>
      </div>
</footer>