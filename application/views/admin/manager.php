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
        <form class="mhide" id="userSearchForm" method="post">    
        <div class="searchBar"><input id="userSearch" name="search" type="text" value="Search" /></div>
        </form>
        
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
</script>
<script>
$(document).ready(function()
{
    $('#userSearchForm').submit(function(e)
    {
        e.preventDefault();
        console.log($('#userSearch').val());
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/manager/search_user'); ?>", 
            data: { mysearch:$('#userSearch').val() },
            success: function(result)
            {
                console.log(result);
                if(result)
                {
                    //use jquery to display the appropriate students

                }
            }
        })
    })
})
</script>

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