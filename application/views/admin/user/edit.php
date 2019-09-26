 <div class="col-md-12">
 <div class="row">
 
<form action="<?php echo base_url($url) ;?>" method="POST">
		<div class="col-md-12">
		 
			<input type="hidden" name="id" value="<?php echo $user->id;?>">
				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Email address 
					</label>
					<input type="text" name="email" class="form-control" value="<?php echo $user->email;?>"  >
					 
				</div>
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						Password
					</label>
					<input type="password" name="password" class="form-control"  <?php echo $req;?> >
				</div>
				
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						Nama
					</label>
					<input type="text" name="name" class="form-control" value="<?php echo $user->name;?>">
				</div>
			 
				<input type="submit" name="input" value="Save" class="btn btn-primary">
</form>
		</div>
	</div>
	</div>
	
	