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

class home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        $this->lang->load(config_item('language_abbr'), config_item('language'));
    }
     
/* Main Pages
***************************************************************/

    public function index() 
    {
        $data['root'] = base_url();
        $data['pageRoot'] = base_url().'index.php';
        $data['pagetitle'] = 'Home';
        
        // load the view components
        $this->load->view('common/header', $data);
        $this->load->view('common/menu', $data);
        $this->load->view('homepage', $data);
        $this->load->view('common/footer', $data);
    }
    
    public function documentation() 
    {
        $data['root'] = base_url();
        $data['pageRoot'] = base_url().'index.php';
        $data['pagetitle'] = 'Documentation';
        
        $this->load->view('common/header', $data);
        $this->load->view('common/menu', $data);
        $this->load->view('documentation', $data);
        $this->load->view('common/footer', $data);
    }
    
}

/* End of file home.php */
/* Location: ./application/controllers/ */