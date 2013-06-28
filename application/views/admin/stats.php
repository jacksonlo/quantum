<?php

/* Filename:    stats.php
 * Location:    /application/views/admin/
 */

?>

<div class="grid"><!-- content -->

    <div class="spacer"></div>

    <div class="">
        <h1>Users Statistics</h1>
        <div class="spacer"></div>

        <h5>Number of Users Logged in:</h5>
        <div class="spacer"></div>
        <table border="1">
        <tr>
        <th>Stat</th>
        <th># of Users</th>
        </tr>
        <tr>
        <td>Today</td>
        <td><?php echo $today ?></td>
        </tr>
        <tr>
        <td>Yesterday</td>
        <td><?php echo $yday; ?></td>
        </tr>
        <tr>
        <td>Last 7 days</td>
        <td><?php echo $last7; ?></td>
        </tr>
        <tr>
        <td>Most Common Login Time</td>
        <td><?php echo $comTime; ?></td>
        </tr>
        <tr>
        <td>Total Users Logged in All Time</td>
        <td><?php echo $total; ?></td>
        </tr>
        <tr>
        <td>Users Logged in Right Now</td>
        <td><?php echo $now; ?></td>
        </tr>
        </table>
        <div class="spacer"></div>
  
        </div>
    </div>

    <div class="spacer"></div>

</div><!--/content -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
</script>

<script>
$(document).ready(function()
{
    $('tr').hide();
    $('tr:odd').css("background-color","beige");
    $('tr').fadeIn(2000);
})


</script>


<?php //End of file ?>