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

class view extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        $this->lang->load(config_item('language_abbr'), config_item('language'));
    }
     
/* Main Pages
***************************************************************/

    public function index() {
        $this->load->model('admin_model');
        $data['profile'] = $this->admin_model->get_account_details($this->session->userdata('user_id'));

        // $this->output->cache(90);
        $data['root'] = base_url();
        $data['pageRoot'] = base_url().'index.php';
        $data['pagetitle'] = 'Login';

        $this->load->view('common/header', $data);
        $this->load->view('common/menu', $data);
        $this->load->view('admin/view', $data);
        $this->load->view('common/footer', $data);
    }

}

/* End of file main.php */
/* Location: ./application/controllers/admin */