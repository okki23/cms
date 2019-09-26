<div class="container">
    <div class="col-md-9">
                    <form action="<?php echo base_url('article/comment_article');?>" method="POST"> 
                    <input type="hidden" name="id_article" value="<?php echo $this->uri->segment(2); ?>" >
                    <input type="hidden" name="uria" value="<?php echo $this->uri->segment(2); ?>">
                    <input type="hidden" name="urib" value="<?php echo $this->uri->segment(3); ?>">
                    <input type="hidden" name="parent_id_comment" id="idbalas">
 

                    <label> Name : </label>
                    <input type="text" name="name" class="form-control">
                    <br>
                    <label> Email : </label>
                    <input type="text" name="email" class="form-control">
                    <br>
                    <label> Website : </label>
                    <input type="text" name="web" class="form-control">
                    <br>
                    <label> Comment : </label>
                    <textarea class="form-control" name="comment"> </textarea>
                    <br>
                   
                    <input type="submit" value="Komentar" name="komentar" class="btn btn-primary">
                    </form>
    </div>
</div>