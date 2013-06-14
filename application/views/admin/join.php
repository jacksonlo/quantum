<?php

/* Filename:    homepage.php
 * Location:    /application/views/
 */

?>

<div class="grid"><!-- content -->

    <div class="device">

        <div class="spacer"></div>

            <h1>Join</h1>
            
            <div class="spacer"></div>

            <div class="raw50">

            <form method="post" action="<?php echo site_url('profile/join/submit'); ?>">
                <p class="raw100">Username</p>
                <input class="raw70 padded5" type="text" name="username" />

                <p class="raw100">Password</p>
                <input class="raw70 padded5" type="password" name="password" />

                <div class="spacer"></div>

                <p class="raw100">Full Name</p>
                <input class="raw70 padded5" type="text" name="full_name" />

                <p class="raw100">Email</p>
                <input class="raw70 padded5" type="text" name="email" />

                <div class="spacer"></div>

                <button type="submit" class="raw75 padded10">Join</button>
            </form>

            </div>

            <div class="spacer"></div>

        </div>

        <div class="spacer"></div>

    </div>

</div><!--/content -->

<?php //End of file ?>