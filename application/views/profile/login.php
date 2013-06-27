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
            <input id="username" class="raw70 padded5" type="text" name="username" />

            <p class="raw100">Password</p>
            <input id="password" class="raw70 padded5" type="password" name="password" />

            <div class="spacer"></div>

            <button type="submit" class="raw75 padded10">Login</button>
        </form>

        <div class="spacer"></div>

        <div class="raw100">
            <h6>Incorrect login information or your account may have been disabled.</h6>
            <div class="spacer"></div>

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
    $('h6').hide();
    $("#login").submit(function(e)
    {
        e.preventDefault();
        console.log($('#username').val());
        console.log($('#password').val());
        $.post("<?php echo site_url('profile/login/validate') ?>", { username:$('#username').val(), password:$('#password').val() }, function(result)
        {
            if(result == 'yes') //correct login
            {
                $('#login').fadeOut("slow", function()
                {
                    $(this).text("Success").fadeIn("slow");
                })
                $('h6').fadeOut("slow");
                $("a[href*='profile/login/forgot']").fadeOut("slow");
                $("a[href*='profile/join']").fadeOut("slow");
                //.fadeIn();
                //alert("You have successfully logged in!");
            }
            else
            {
                $('#login').fadeOut("slow");
                $('h6').fadeIn(2000);
                $('#login').fadeIn("slow");
                //alert("Incorrect login information or your account may have been disabled.");
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