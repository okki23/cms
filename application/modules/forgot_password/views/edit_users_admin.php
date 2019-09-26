 <div class="col-md-12">
 <div class="row">
     
 
<form action="<?php echo base_url($url) ;?>" method="POST">
		<div class="col-md-12">		 
			<input type="text" name="id" value="<?php echo $user->id;?>">
                        <input type="text" name="level" value="2">
                        
                                <div class="form-group">
					 
					<label for="exampleInputEmail1">
						Email address 
					</label>
					<input type="text" name="email" class="form-control" value="<?php echo $user->email;?>"  >
					 
				</div>
				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Username 
					</label>
					<input type="text" name="username" class="form-control" value="<?php echo $user->username;?>"  >
					 
				</div>
                               
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						Password
					</label>
					<input type="password" name="password" class="form-control" >
				</div>
                        
                                <div class="form-group">
					 
					<label for="exampleInputEmail1">
						Full Name 
					</label>
					<input type="text" name="name" class="form-control" value="<?php echo $user->name;?>"  >
					 
				</div>
                        
                                <div class="form-group">
					 
					<label for="exampleInputEmail1">
						No HP 
					</label>
					<input type="text" name="no_hp" class="form-control" value="<?php echo $user->no_hp;?>"  >
					 
				</div>
                        
                                <div class="form-group">
					 
					<label for="exampleInputEmail1">
						Tanggal Daftar 
					</label>
					<input type="text" name="tgl_daftar" id="dp" class="form-control" value="<?php echo $user->no_hp;?>"  >
					 
				</div>
				
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						Status
					</label>
					<select name="status" class="form-control">
                                           <option value="" <?php
                                            if($user->status == ''){
                                                echo "selected=selected";
                                            }
                                            ?>
                                            > --Pilih-- </option>
                                            <option value="Y" <?php
                                            if($user->status == 'Y'){
                                                echo "selected=selected";
                                            }
                                            ?>
                                            > Active </option>
                                            <option value="N"<?php
                                            if($user->status == 'N'){
                                                echo "selected=selected";
                                            }
                                            ?>> Not Active </option>
                                        </select>
				</div>
			 
				<input type="submit" name="input" value="Save" class="btn btn-primary">
</form>
		</div>
	</div>
	</div>
	
	