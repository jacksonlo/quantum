<?php

/* Filename:    installing.php
 * Location:    /application/views/install/
 */

?>

<div class="grid"><!-- content -->

    <div class="spacer"></div>

    <div class="small-device gFFF">
        
        <div class="spacer"></div>
        
        <p>Quantum is currently installing...</p>
        <br />
        <p><?php echo @$db_status; ?></p>
        <p><?php echo @$footer_status; ?></p>
        <p><?php echo @$contact_status; ?></p>
        <p><?php echo @$header_status; ?></p>
        
        <div class="spacer"></div>
        <?php if(!@$footer_status){ ?>
        <button onclick="window.location='<?php echo site_url('install'); ?>'">Complete the install</button>
        <?php }else{ ?>
        <p>Complete</p>
        <br />
        <button onclick="window.location='<?php echo site_url('home'); ?>'">Visit the site</button>
        <?php } ?>
    </div>

    <div class="spacer"></div>

</div><!--/content -->

<?php //End of file ?>