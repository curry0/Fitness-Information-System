

<?php echo validation_errors(); ?>


<?php echo form_open ('users/update'); ?>
<div class = "editprofile">

<div class="row justify-content-md-center">

  <div class="col-md-4 col-md-offset-4">
    <h2 class="text-center"><?= $title; ?></h2>
    <hr />
    <input type="hidden" name="id" value="<?php echo $user->id; ?>">
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name = "name" placeholder="Chane your profile name" value="<?php echo $user->name; ?>">

    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="text" class="form-control" name = "email" placeholder="Change your email" value="<?php echo $user->email; ?>">

    </div>
        <div class="form-group">
      <label>Nickname</label>
      <input type="text" class="form-control" name = "nickname" placeholder="Edit your nickname" value="<?php echo $user->nickname; ?>">

    </div>



        <div class="form-group">
      <label>Experience</label>
      <input type="text" class="form-control" name = "experience" placeholder="Your experience" value="<?php echo $user->experience; ?>">

    </div>  



        <div class="form-group">
      <label>Favorite exercise</label>
      <input type="text" class="form-control" name = "fav_exercise" placeholder="Your favorite exercise" value="<?php echo $user->fav_exercise; ?>">

    </div> 
   
    <br>


    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-primary btn-lg button-custom">Update</button>
    </div>

  </div>
</div>
</div>


<?php echo form_close(); ?>
