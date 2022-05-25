<?php echo form_open_multipart('users/upload'); ?>
	<div class="row justify-content-md-center">
		<div class="col-md-4 col-md-offset-4">
			<h2 class="text-center"><?php echo $title; ?></h2>
			<hr />
			<div class="form-group">
				<input type="file" name="userfile" class="form-control" >
				<?php echo $error; ?>
			</div>
<br>
			
			<br>
			<div class="d-grid gap-2">
				<button type="submit" class="btn btn-primary btn-lg button-custom">Upload</button>
			</div>
		</div>
	</div>
	
<?php echo form_close(); ?>