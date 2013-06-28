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

class inbox extends CI_Controller 
{

    public function __construct(){
        parent::__construct();
        
        $this->lang->load(config_item('language_abbr'), config_item('language'));
    }
     
/* Main Pages
***************************************************************/

    public function index() 
    {
        $this->load->model('inbox_model');
        $data['mail'] = $this->inbox_model->get_mail();

        $data['root'] = base_url();
        $data['pageRoot'] = base_url().'index.php';
        $data['pagetitle'] = 'Inbox';
        
        $this->load->view('common/header', $data);
        $this->load->view('common/menu', $data);
        $this->load->view('inbox', $data);
        $this->load->view('common/footer', $data);
    }

/* Inbox Functions
***************************************************************/
    
    public function send()
    {
        $this->load->model('inbox_model');
        $q = $this->inbox_model->sendProc();
        //print_r("contr:" . $q);

        if($q)
        {
            //print_r("contr work");
            echo true;
        }
        else
        {
            echo false;
        }
    }

}
 

/* End of file login.php */
/* Location: ./application/controllers/profile */
?>