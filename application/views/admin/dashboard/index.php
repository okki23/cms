<h3 align="center"> Welcome to Administrator </h3> 
<br>
 <div class="col-md-9">
        <h3>Recently Modified Article</h3>
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
        
         <div clas="col-md-9">
            <?php echo $paging; ?>
        </div>
        
 </div>
        