<?php

/* Filename:    menu.php
 * Location:    /application/view/common
 */

?>

<div class="grid">
    <div class="device">
        <div class="horizontal_menu">
            <ul id="menu">    
                <li><a class="mainNav" href="<?php echo site_url('home'); ?>">Home</a></li>
                
                <li><a class="mainNav" href="<?php echo site_url('contact'); ?>">Contact</a></li>
                
                <?php if(!$this->session->userdata('user_type') || $this->session->userdata('user_type') != 'admin'){ ?>
                <li><a class="mainNav" href="<?php echo site_url('profile/login'); ?>">Profile</a>
                    <?php if(logged_in()){ ?>
                    <ul>
                        <li><a class="mainNav" href="<?php echo site_url('profile/logout'); ?>">Logout</a></li>
                    </ul>
                    <?php }else{ ?>
                    <ul>
                        <li><a class="mainNav" href="<?php echo site_url('profile/join'); ?>">Join</a></li>
                    </ul>
                    <?php } ?>
                </li>
                <?php } ?>

                <?php get_module_menus(); ?>

                <?php if($this->session->userdata('user_type') == 'admin'){ ?>
                <li><a class="mainNav" href="<?php echo site_url('admin/login'); ?>">Admin</a>
                    <?php if(logged_in()){ ?>
                    <ul>
                        <li><a class="mainNav" href="<?php echo site_url('admin/manager'); ?>">User Manager</a></li>
                        <li><a class="mainNav" href="<?php echo site_url('admin/view'); ?>">My Profile</a></li>
                        <li><a class="mainNav" href="<?php echo site_url('admin/logout'); ?>">Logout</a></li>
                    </ul>
                    <?php } ?>
                </li>
                <?php } ?>

            </ul>

            <ul id="menu" style="float: right;">    
                <li><a class="mainNav" href="<?php echo lang_swap('en'); ?>">English</a></li>
                <li><a class="mainNav" href="<?php echo lang_swap('fr'); ?>">French</a></li>
                <li><a class="mainNav" href="<?php echo lang_swap('es'); ?>">Spanish</a></li>
                <li><a class="mainNav" href="<?php echo lang_swap('de'); ?>">German</a></li>
            </ul>
        </div>
    </div>
</div>

<div id="body" class="device">

<?php //End of file ?>