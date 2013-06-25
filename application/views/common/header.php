<?php 
/* 
 * Filename:    header.php
 * Location:    /application/views/common/
*/ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="A powerful, yet ever so tiny application-starter-kit" />
        <meta name="keywords" content="Application-Starter-Kit, PHP, CodeIgniter" />

        <title>Quantum | <?php echo $pagetitle; ?></title>

        <!-- Quarx Custom Styles -->
        <link rel="shortcut icon" type="image" href="<?php echo $root; ?>images/favicon.ico" />
        <link rel="stylesheet" href="<?php echo $root; ?>css/raw.min.css" />
        <link rel="stylesheet" href="<?php echo $root; ?>css/desktop-style.css" lang="EN" dir="ltr" type="text/css" />
        <link rel='stylesheet' media='screen and (min-width: 768px) and (max-width: 960px)' href='<?php echo $root; ?>css/tablet-style.css' />
        <link rel='stylesheet' media='screen and (min-width: 120px) and (max-width: 768px)' href='<?php echo $root; ?>css/mobile-style.css' />
        
        <?php if(isMobile()){ ?>
        <!-- For all things mobile -->
        <?php } ?>

        <script type="text/javascript" src="<?php echo $root; ?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $root; ?>js/quantum.js"></script>

        <script type="text/javascript">
            
            $(document).ready(function() {

                $("#searchForm").submit(function() {
                    if ($("#searchBar").val().length < 3) {
                        alert("You need to search for at least three characters")
                        return false;
                    }
                });
            
            });
                
        </script>

        <style type="text/css">
        <?php get_module_css(); //provided by the modular_tools library ?>
        </style>

        <script type="text/javascript">
        <?php get_module_js(); //provided by the modular_tools library ?>
        </script>

    </head>
    <body>
        
        <div id="wrapper" class="grid">

            <div class="grid">
                <div id="header" class="device g999">
                    <div class="raw50"><h1 class="padded5">Quantum</h1></div>
                    <form class="mhide" id="searchForm" method="post" action="<?php echo site_url('search/result'); ?>">    
                        <div class="searchBar"><input id="searchBar" name="search" type="text" value="Search" /></div>
                    </form>
                </div>
            </div>

            <div class="grid">
            
<?php //End of File ?>