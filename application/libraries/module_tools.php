<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Quantum
 *
 * A modular application starter kit built with CodeIgniter
 *
 * @package     Quantum
 * @author      Matt Lantz
 * @copyright   Copyright (c) 2013 Matt Lantz
 * @license     http://ottacon.co/quantum/license
 * @link        http://ottacon.co/quantum
 * @since       Version 1.0
 * 
 */

class module_tools{
    
    public function module_tools(){ 

        function get_module_menus(){
            //scan the modules directory for modules
            $modules = "application/modules/";
             
            //get all files in specified directory
            $files = glob($modules . "*");
             
            //check for each module's menu
            foreach($files as $file){
                if(is_dir($file)){
                    include($file.'/menu.php');
                }
            }
        }

        function get_module_list(){
            //scan the modules directory for modules
            $modules = "application/modules/";
            $res = array();
             
            //get all files in specified directory
            $files = glob($modules . "*");
             
            //check for each module's menu
            foreach($files as $file){
                if(is_dir($file)){
                    array_push($res, substr($file, 20));
                }
            }

            return $res;
        }

        function get_module_css(){
            $CI =& get_instance();
            $router =& load_class('Router', 'core');

            $currentModule = $router->fetch_class();

            //scan the modules directory for modules
            $modules = "application/modules/";
             
            //get all files in specified directory
            $files = glob($modules . "*");
             
            //check for each module's menu
            foreach($files as $file){
                if(is_dir($file)){
                    
                    $pieces = explode("/", $file);
                    $currentDir = end($pieces);
                    
                    if($currentDir == $currentModule){
                        include($file.'/css/styles.css');
                    }
                }
            }
        }

        function get_module_js(){
            $CI =& get_instance();
            $router =& load_class('Router', 'core');

            $currentModule = $router->fetch_class();

            //scan the modules directory for modules
            $modules = "application/modules/";
             
            //get all files in specified directory
            $files = glob($modules . "*");
             
            //check for each module's menu
            foreach($files as $file){
                if(is_dir($file)){
                    
                    $pieces = explode("/", $file);
                    $currentDir = end($pieces);
                    
                    if($currentDir == $currentModule){
                        include($file.'/js/module_functions.js');
                    }
                }
            }
        }
    }
}

//End of File
?>