<?php

/* Filename:    edit.php
 * Location:    /application/views/admin
 */

?>

<div class="grid"><!-- content -->

    <div class="device">

        <div class="spacer"></div>

            <h1>Edit My Profile</h1>
            
            <div class="spacer"></div>

            <?php foreach ($profile as $p) : ?>

            <form method="post" action="<?php echo site_url('admin/edit/save_edits'); ?>">

                <div class="raw50">
                    <p class="raw100">Username: <?php echo $p->admin_username; ?></p>

                    <div class="spacer"></div>

                    <p class="raw100">Full Name</p>
                    <input class="raw70 padded5" type="text" name="full_name" value="<?php echo $p->admin_full_name; ?>" />

                    <p class="raw100">Email</p>
                    <input class="raw70 padded5" type="email" name="email" value="<?php echo $p->admin_email; ?>" />
                </div>
                <div class="raw50">
                    <p class="raw100">New Password</p>
                    <input class="raw70 padded5" type="password" name="new_password" />
                </div>
                <div class="spacer"></div>
                <div class="raw50">
                    <button type="submit" class="raw75 padded10">Save</button>
                </div>
            </form>

            <?php endforeach; ?>

            <div class="spacer"></div>

        </div>

        <div class="spacer"></div>

    </div>

</div><!--/content -->

<?php //End of file ?>