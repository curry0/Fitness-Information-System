  <h2><?php echo $title ?></h2>
  <hr />

  <div class="container emp-profile">

    <div class="row">
      <div class="col-md-4">
        <div class="profile-img">
         <?php if($user->user_image){ ?>
          <img src="<?php echo base_url('assets/images/users/'.$user->user_image) ?>" class = "img-thumbnail"  alt = "user-image"  />
        <?php } else { ?>
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/1200px-User_icon_2.svg.png" class = "img-thumbnail" alt = "user-image"  /> 
        <?php } ?>
        <hr>
        <div class="d-grid gap-2">
          <a href="<?php echo site_url('users/upload')?>" class="btn btn-primary button-custom ">Upload Image</a>
        </div> 
      </div>


    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-8">
      <div class="tab-content profile-tab" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="row">
            <div class="col-md-6">
              <label>Name</label>
            </div>
            <div class="col-md-6">
              <p><?php echo $user->name ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label>Email</label>
            </div>
            <div class="col-md-6">
              <p><?php echo $user->email ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label>Username</label>
            </div>
            <div class="col-md-6">
              <p><?php echo $user->username ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label>Nickname</label>
            </div>
            <div class="col-md-6">
              <p><?php echo $user->nickname ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label>ID</label>
            </div>
            <div class="col-md-6">
              <p><?php echo $user->id ?></p>
            </div>
          </div>
                    <div class="row">
            <div class="col-md-6">
              <label>Register Date</label>
            </div>
            <div class="col-md-6">
              <p><?php echo $user->register_date ?></p>
            </div>
          </div>
                    <div class="row">
            <div class="col-md-6">
              <label>Experience</label>
            </div>
            <div class="col-md-6">
              <p><?php echo $user->experience ?></p>
            </div>
          </div>
                    <div class="row">
            <div class="col-md-6">
              <label>Favorite exercise</label>
            </div>
            <div class="col-md-6">
              <p><?php echo $user->fav_exercise ?></p>
            </div>
          </div>
          <hr>
          <a href="<?php echo site_url('users/edit')?>" class="btn btn-primary btn-block button-custom">Edit your profile</a>
          <a href="<?php echo site_url('users/changePassword')?>" class="btn btn-primary btn-block button-custom">Change your password</a>
        </div>


      </div>
    </div>
  </div>

  </div>


  </div>
