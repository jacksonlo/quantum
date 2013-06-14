<?php

/* Filename:    view.php
 * Location:    /application/views/admin
 */

?>

<div class="grid"><!-- content -->

    <?php foreach($profile as $p) : ?>

    <div class="device">
        <div class="raw100">
            <h1>Welcome <?php echo $this->session->userdata('username'); ?></h1>
            <div class="spacer"></div>
            <p>Your Profile: </p>
        </div>
        <div class="spacer"></div>
        <div class="raw40">
            <div class="raw50"><p>Full Name</p></div>
            <div class="raw50"><p><?php echo $p->admin_full_name; ?></p></div>
            <div class="raw50"><p>Email</p></div>
            <div class="raw50"><p><?php echo $p->admin_email; ?></p></div>
        </div>
        <div class="spacer"></div>
        <div class="raw100">
            <a href="<?php echo site_url('admin/edit'); ?>">Edit My Profile</a>
        </div>
    </div>

    <?php endforeach; ?>

    <div class="spacer"></div>
</div><!--/content -->

<?php //End of file ?>