<?php

/* Filename:    forgot.php
 * Location:    /application/views/profile/
 */

?>

<div class="grid"><!-- content -->

    <div class="spacer"></div>

    <div class="small-device gFFF">
        <h1>Forgot your Password</h1>
        
        <div class="spacer"></div>

        <form method="post" action="<?php echo site_url('profile/login/recover'); ?>">
            <p class="raw100">Username</p>
            <input class="raw70 padded5" name="username" />

            <p class="raw100">Email</p>
            <input class="raw70 padded5" name="email" />

            <div class="spacer"></div>

            <button type="submit" class="raw75 padded10">Reset Password</button>
        </form>

        <div class="spacer"></div>

        <div class="raw100">
            <a href="<?php echo site_url('profile/login'); ?>">I remember my password!</a>
        </div>
    </div>

    <div class="spacer"></div>

</div><!--/content -->

<?php //End of file ?>