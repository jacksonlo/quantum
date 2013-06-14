<?php /*
    Filename:   contact.php
    Location:   /application/views/contact
*/ ?>

<div class="grid"><!-- content -->
    
    <div class="device">

        <div class="raw40 no-float">

            <div class="spacer"></div>

            <h1>Contact us</h1>

            <div class="spacer"></div>
            
            <form method="post" action="<?php echo site_url('contact/send'); ?>">
                
                <?php if(isset($this->db)){ ?>
                <input type="hidden" name="to" value="mattlantz@gmail.com" />
                <?php } ?>

                <div class="raw30"><p class="padded5">Name</p></div>
                <input class="raw65 padded5" type="text" data-type="Name" name="name" />
                
                <div class="raw30"><p class="padded5">Email</p></div>
                <input class="raw65 padded5" type="text" data-type="Email" name="email" />

                <div class="raw30"><p class="padded5">Phone</p></div>
                <input class="raw65 padded5" type="text" data-type="Phone" name="phone" />

                <div class="raw30"><p class="padded5">Message</p></div>
                <textarea  class="raw65 padded5" id="msgBox" name="message"></textarea>
                
                <div class="spacer"></div>

                <input class="raw100" type="submit" value="Send" />
            </form>
        </div>

        <div class="spacer"></div>

    </div>

</div><!--/content -->

<?php /* End of File */ ?>