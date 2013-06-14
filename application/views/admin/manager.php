<?php

/* Filename:    manager.php
 * Location:    /application/views/admin/
 */

?>

<div class="grid"><!-- content -->

    <div class="spacer"></div>

    <div class="">
        <h1>User Manager</h1>
        <p>Here you're able to disable/enable user accounts.</p>
        
        <div class="spacer"></div>
        
        <?php foreach($user as $u) : ?>

            <div class="raw100">
                <div class="raw25"><?php echo $u->profile_username; ?></div>
                <div class="raw25"><?php echo $u->profile_full_name; ?></div>
                <div class="raw25"><?php echo $u->profile_email; ?></div>
                <div class="raw25">
                    <?php if($u->profile_state == 'disabled'){ ?>
                    <button class="go raw50" onclick="enableUser('<?php echo encrypt($u->profile_id); ?>');">Enable</button>
                    <?php }else{ ?>
                    <button class="caution raw50" onclick="disableUser('<?php echo encrypt($u->profile_id); ?>');">Disable</button>
                    <?php } ?>
                    <button class="stop raw50" onclick="deleteUser('<?php echo encrypt($u->profile_id); ?>');">Delete</button>
                </div>
            </div>

        <?php endforeach; ?>

        <div class="spacer"></div>

    </div>

    <div class="spacer"></div>

</div><!--/content -->

<script type="text/javascript">

    function enableUser(id){
        window.location = "<?php echo site_url('admin/manager/enable_user'); ?>"+"/"+id;
    }

    function disableUser(id){
        window.location = "<?php echo site_url('admin/manager/disable_user'); ?>"+"/"+id;
    }

    function deleteUser(id){
        var r = confirm("Are you sure you want to delete this user?");
        if (r == true){
            window.location = "<?php echo site_url('admin/manager/delete_user'); ?>"+"/"+id;
        }
    }

</script>

<?php //End of file ?>