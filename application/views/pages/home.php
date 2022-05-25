<div id="wrapper">
    <div class="img">
        <img class="post-thumb thumbnail home-img" src="<?php echo site_url(); ?>assets/images/hulk.jpg ?>">
        <div class="slang">
            <?php if($this->session->userdata('logged_in') === TRUE): ?>
            <h1>Hello <br> <strong><?php echo $user->nickname ?>. </strong> <br> Welcome to our gym! </h1>
            <?php endif; ?>

            <br>
            <br>


            <div class="texto">
                <h4><i>Consistency is the key! There is not a fast aproach.</i></h4>
            </div>
        </div>
    </div>