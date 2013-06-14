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

class lang_tool {
    
    public function lang_tool(){
    
        function lang_swap($lang){
            $CI =& get_instance();

            $currentURL = current_url();
            $currentLANG = '/'.substr($currentURL, strlen(base_url()), 2).'/';

            $newURL = str_replace($currentLANG, '/'.$lang.'/', $currentURL);

            return $newURL;
        }
    }
}
//End of File
?>