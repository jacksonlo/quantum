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

class logout extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        $this->lang->load(config_item('language_abbr'), config_item('language'));
    }
     
/* Main Pages
***************************************************************/

    public function index() {
        
        $this->session->sess_destroy();
        
        $data['root'] = base_url();
        $data['pageRoot'] = base_url().'index.php';
        $data['pagetitle'] = 'Logout';
        
        // load the view components
        $this->load->view('common/header', $data);
        $this->load->view('common/menu', $data);
        $this->load->view('profile/logout', $data);
        $this->load->view('common/footer', $data);
    }
 

    // need to login, and recover password

}

/* End of file main.php */
/* Location: ./application/controllers/ */