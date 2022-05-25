
<?php echo form_open('users/changePassword')?>
<div class="changepas">
<div class="row justify-content-md-center">
	<div class="col-md-4 col-md-offset-4">
		<h2 class="text-center"><?= $title; ?></h2>
		<hr />
		<div class="form-group" style="margin-bottom: 10px;">
			<input type="password" name="oldpassword" id="oldpassword" class="form-control" placeholder="Old Password">
			<?php echo form_error('oldpassword', '<div class = "error">', '</div>')?> 
		</div>

		<div class="form-group" style="margin-bottom: 10px;">
			<input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="New Password">
			<?php echo form_error('newpassword', '<div class = "error">', '</div>')?> 
		</div>
		<div class="form-group" style="margin-bottom: 10px;">
			<input type="password" name="passwordconfirm" id="passwordconfirm" class="form-control" placeholder="Confirm Password">
			<?php echo form_error('passwordconfirm', '<div class = "error">', '</div>')?> 
		</div>

		<div class="d-grid gap-2">
			<button type="submit" class="btn btn-primary btn-lg button-custom">Update</button>
		</div>
	</div>
</div>
</div>
<?php echo form_close(); ?>



