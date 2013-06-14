<?php

/**
 * Quantum
 *
 * A modular application-starter-kit built with CodeIgniter
 *
 * @package     Quantum
 * @author      Matt Lantz
 * @copyright   Copyright (c) 2013 Matt Lantz
 * @license     http://ottacon.co/quantum/license
 * @link        http://ottacon.co/quantum
 * @since       Version 1.0
 * 
 */

class install_model extends CI_Model {

    function add_master_user($user, $pass, $email)
    {
        $qry = $this->db->query("INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_full_name`, `admin_email`) VALUES (1, '".$user."', '".sha1($pass)."', '".$user."', '".$email."');");
        
        if($qry) {
            return true;
        }else{
            return false;
        }
    }

}

// End of File

?>