
<?php echo validation_errors(); ?>

<?php echo form_open_multipart('users/register'); ?>
<div class="row justify-content-md-center">
	<div class="col-md-4 col-md-offset-4">
		<h2 class="text-center"><?= $title; ?></h2>
		<hr />
		<div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control" name="name" placeholder="Name">
		</div>
		<br>
		<div class="form-group">
			<label>Nickname</label>
			<input type="text" class="form-control" name="nickname" placeholder="Nickname">
		
		</div>
		
		<br>

		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" name="email" placeholder="Email">
		</div>

		<br>
		<div class="form-group">
			<label>Upload Image</label>
			<input type="file" class="form-control" placeholder="Upload Image" name="userfile" size="20">
		</div>
		<br>
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username" placeholder="Username">
		</div>
		<br>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" placeholder="Password">
		</div>
		<br>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
		</div><br>
				<div class="form-group">
			<label>Experience</label>
			<input type="text" class="form-control" name="experience" placeholder="Your experience">
		</div><br>
				<div class="form-group">
			<label>Favorite exercise</label>
			<input type="text" class="form-control" name="fav_exercise" placeholder="Favorite exercise">
		</div><br>
		<div class="d-grid gap-2">
			<button type="submit" class="btn btn-primary btn-lg button-custom">Submit</button>
		</div>
	</div>
</div>
<?php echo form_close(); ?>