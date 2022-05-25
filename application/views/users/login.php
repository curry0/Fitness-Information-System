<?php echo form_open('users/login'); ?>
<div class="login" >
	<div class="row justify-content-md-center">
		<div class="col-md-4 col-md-fofset-4">
			<h2 class="text-center"><?php echo $title; ?></h2>
			<hr />
			<div class="form-group">
				<br>
				<input type="text" name="username" class="form-control" placeholder="Type your username" required autofocus>
			</div>
<br>
			<div class="form-group ">
				<input type="password" name="password" class="form-control" placeholder="Type your password" required autofocus>
			</div>
			<br>
			<input type="checkbox" class="checkbox" id="remember_me">
					<label for="remember_me">Remember me</label>
<br>
			<div class="d-grid gap-2">
				<br>
				<button type="submit" class="btn btn-primary btn-lg button-custom ">Login</button>
				<div class="help-text">
					<p><a href="#">Forget your password?</a></p>
				</div><!--.help-text-->
			</div>
		</div>
	</div>
</div>
	
<?php echo form_close(); ?>