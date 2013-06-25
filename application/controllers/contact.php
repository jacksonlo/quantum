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

class contact extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->lang->load(config_item('language_abbr'), config_item('language'));
    }
     
/* Contact Page
***************************************************************/
    public function index() 
    {  
        $data['root'] = base_url();
        $data['pageRoot'] = base_url().'index.php';
        $data['pagetitle'] = 'Contact';

        $this->load->view('common/header', $data);
        $this->load->view('common/menu', $data);
        $this->load->view('contact/contact', $data);
        $this->load->view('common/footer', $data);    
    }

/* Send Email
***************************************************************/
    
    public function send() 
    {
        $to = "me@example.com";

        $from = $_POST['email'];
        $message = $_POST['message'];
        $name = $_POST['name'];
        $subject = 'Contact From Your Website';
        
        $message= '
        <style type="text/css">
            p, h1{ 
                font-family: arial;
            }
        </style>
        <h1>The Message</h1>
        <p>You\'ve received a message from: <b>'.$name.'</b><br />
        You can contact them at: <b>'.$from.'</b><br />
        Your message:'.$message.'</p>';
        
        $this->load->library('email');

        $config['charset'] = 'utf-8';
        $config['protocol'] = 'sendmail';
        $config['mailtype'] = 'html';
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        
        if($this->email->send()){
            redirect('contact/sent');
        }else{
            $this->email->print_debugger();   
        }
    }
    
/* Mail Sent Page
***************************************************************/

    public function sent() 
    {
        $data['root'] = base_url();
        $data['pageRoot'] = base_url().'index.php';
        $data['pagetitle'] = 'Contact: Message Sent';
          
        $this->load->view('common/header', $data);
        $this->load->view('common/menu', $data);
        $this->load->view('contact/sent', $data);
        $this->load->view('common/footer', $data);    
    }
    
}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */