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

class manager extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        $this->lang->load(config_item('language_abbr'), config_item('language'));
    }
     
/* Main Pages
***************************************************************/

    public function index() {
        $this->load->model('admin_model');
        $data['user'] = $this->admin_model->get_users();
        
        $data['root'] = base_url();
        $data['pageRoot'] = base_url().'index.php';
        $data['pagetitle'] = 'User Manager';
        
        // load the view components
        $this->load->view('common/header', $data);
        $this->load->view('common/menu', $data);
        $this->load->view('admin/manager', $data);
        $this->load->view('common/footer', $data);
    }

/* Manage Users
***************************************************************/

    public function disable_user($id){
        $this->load->model('admin_model');
        $qry = $this->admin_model->disable_user($id);

        if($qry){
            redirect('admin/manager?s');
        }else{
            redirect('admin/manager?e');
        }
    }

    public function enable_user($id){
        $this->load->model('admin_model');
        $qry = $this->admin_model->enable_user($id);

        if($qry){
            redirect('admin/manager?s');
        }else{
            redirect('admin/manager?e');
        }
    }

    public function delete_user($id){
        $this->load->model('admin_model');
        $qry = $this->admin_model->delete_user($id);

        if($qry){
            redirect('admin/manager?s');
        }else{
            redirect('admin/manager?e');
        }
    }

    public function search_user($id)
    {
        $this->load->model('admin_model');
        $qry = $this->admin_model->search_user($id);

        if($qry)
        {
            return $qry;
        }
        else return false;
    }

}

/* End of file logout.php */
/* Location: ./application/controllers/admin */