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
class profile_tools{
    
    public function profile_tools(){ 

        function logged_in(){
            $CI =& get_instance();
            if($CI->session->userdata('logged_in')){
                return true;
            }else{
                return false;
            }
        }
    }
}

//End of File
?>