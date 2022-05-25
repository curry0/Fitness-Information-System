<html>
	<head style="color:white;">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>HulkGYM</title>

		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>" media="all">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>"> 

    <script src="http://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</head>
	<body>

		<nav class="navbar navbar-expand-lg navbar-light" style="color:white ">
  <div class="container-fluid" style="color:white;">
    <a class="navbar-brand" style="color:white;" href="<?php echo base_url(); ?>">HulkGYM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto">
        <li class="nav-item ">
          <a class="nav-link active" style="color:white " href="<?php echo base_url(); ?>">Home
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" style="color:white " href="<?php echo base_url(); ?>posts">Forum</a>
        </li>


        <li class="nav-item">
          <a class="nav-link active" style="color:white " href="<?php echo base_url(); ?>categories">Categories</a>
        </li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
          <?php if(!$this->session->userdata('logged_in')): ?>
            <li><a class="nav-link active" style="color:white " href="<?php echo base_url(); ?>users/register">Register</a></li>
            <li><a class="nav-link active" style="color:white " href="<?php echo base_url(); ?>users/login">Login</a></li>
          <?php endif; ?>
          <?php if($this->session->userdata('logged_in')): ?>
                     
            <li><a class="nav-link active" style="color:white " href="<?php echo base_url(); ?>dashboard/index">Profile</a></li>
            <li><a class="nav-link active" style="color:white " href="<?php echo base_url(); ?>posts/create">Create Post</a></li>
            <li><a class="nav-link active" style="color:white " href="<?php echo base_url(); ?>categories/create">Create Category</a></li>
            <li><a class="nav-link active" style="color:white " href="<?php echo base_url(); ?>users/logout">Logout</a></li>
          <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <!-- Flash messages -->
  <?php if($this->session->flashdata('user_registered')): ?>
    <?php echo '<p class = "alert alert-custom">'.$this->session->flashdata('user_registered').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_created')): ?>
    <?php echo '<p class = "alert alert-custom">'.$this->session->flashdata('post_created').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_updated')): ?>
    <?php echo '<p class = "alert alert-custom">'.$this->session->flashdata('post_updated').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('category_created')): ?>
    <?php echo '<p class = "alert alert-custom">'.$this->session->flashdata('category_created').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_deleted')): ?>
    <?php echo '<p class = "alert alert-custom">'.$this->session->flashdata('post_deleted').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('login_failed')): ?>
    <?php echo '<p class = "alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('user_loggedin')): ?>
    <?php echo '<p class = "alert alert-custom">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('user_loggedout')): ?>
    <?php echo '<p class = "alert alert-custom">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('category_deleted')): ?>
    <?php echo '<p class = "alert alert-custom">'.$this->session->flashdata('category_deleted').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('image_uploaded')): ?>
    <?php echo '<p class = "alert alert-custom">'.$this->session->flashdata('image_uploaded').'</p>'; ?>
  <?php endif; ?>

   <?php if($this->session->flashdata('password_changed')): ?>
    <?php echo '<p class = "alert alert-custom">'.$this->session->flashdata('password_changed').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('user_updated')): ?>
    <?php echo '<p class = "alert alert-custom">'.$this->session->flashdata('user_updated').'</p>'; ?>
  <?php endif; ?>