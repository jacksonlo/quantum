<?php

/* Filename:    login.php
 * Location:    /application/views/profile/
 */

?>

<div class="grid"><!-- content -->

    <div class="spacer"></div>

    <div class="small-device gFFF">
        <h1>Login</h1>
        
        <div class="spacer"></div>

        <form method="post" id="login">
            <p class="raw100">Username</p>
            <input id="a_username" class="raw70 padded5" type="text" name="username" />

            <p class="raw100">Password</p>
            <input id="a_password" class="raw70 padded5" type="password" name="password" />

            <div class="spacer"></div>

            <button type="submit" class="raw75 padded10">Login</button>
        </form>

        <div class="spacer"></div>

        <div class="raw100">
            <a href="<?php echo site_url('profile/login/forgot'); ?>">Forgot your password?</a><br />
            <a href="<?php echo site_url('profile/join'); ?>">Don't have an account?</a>
        </div>
    </div>

    <div class="spacer"></div>

</div><!--/content -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
</script>
<script>
$(document).ready(function()
{
    $("#login").submit(function()
    {
        $.post("<?php echo site_url('profile/login/validate') ?>", { username:$('username').val(), password:$('password').val() }, function(result)
        {
            if(result == 'yes') //correct login
            {
                alert("You have successfully logged in!");
            }
            else
            {
                alert("Incorrect login information. Please try again.");
            }
        })   
    })
})
</script>

<?php if(isset($_GET['e'])){ ?>
    <script type="text/javascript">
        alert('Either your username or password was wrong, your account may also be disabled.');
    </script>
<?php } ?>

<?php //End of file ?>