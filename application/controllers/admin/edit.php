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

class edit extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        $this->lang->load(config_item('language_abbr'), config_item('language'));
    }
     
/* Main Pages
***************************************************************/
    public function _remap($data){
        if($data == 'index'){
            $this->editor($data);
        }else{
            $this->save_edits();
        }
    }

    public function editor($id) {
        $id = $this->session->userdata('user_id');

        $this->load->model('admin_model');
        $qry = $this->admin_model->get_account_details($id);

        if($qry){
            $data['profile'] = $qry;
            $data['root'] = base_url();
            $data['pageRoot'] = base_url().'index.php';
            $data['pagetitle'] = 'Editor';
            
            $this->load->view('common/header', $data);
            $this->load->view('common/menu', $data);
            $this->load->view('admin/edit', $data);
            $this->load->view('common/footer', $data);
        }else{
            redirect('admin/view');
        }
    }

    public function save_edits(){
        $this->load->model('admin_model');
        $qry = $this->admin_model->update_admin();

        if($qry){
            redirect('admin/view?s');
        }else{
            redirect('admin/view?e');
        }
    }

}

/* End of file edit.php */
/* Location: ./application/controllers/profile */