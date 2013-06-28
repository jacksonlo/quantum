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

class login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        $this->lang->load(config_item('language_abbr'), config_item('language'));
    }
     
/* Main Pages
***************************************************************/

    public function index() {
        if($this->session->userdata('logged_in')){
            redirect('profile/view');
        }

        $data['root'] = base_url();
        $data['pageRoot'] = base_url().'index.php';
        $data['pagetitle'] = 'Login';
        
        $this->load->view('common/header', $data);
        $this->load->view('common/menu', $data);
        $this->load->view('profile/login', $data);
        $this->load->view('common/footer', $data);
    }

    public function forgot() {

        $data['root'] = base_url();
        $data['pageRoot'] = base_url().'index.php';
        $data['pagetitle'] = 'Forgot Password';
        
        $this->load->view('common/header', $data);
        $this->load->view('common/menu', $data);
        $this->load->view('profile/forgot', $data);
        $this->load->view('common/footer', $data);
    }
    

/* Invisible Functions
***************************************************************/

    public function timestamp()
    {
        $this->load->model('login_model');
        $q = $this->login_model->timestampProc();
    }

    public function validate() {
        $this->load->model('login_model');
        $q = $this->login_model->login_validate();

        if($q)
        {
            $this->timestamp();
            echo "yes";
            //redirect('profile/view');
        }
        else
        {
            echo "no";
            //redirect('profile/login?e');
        }
    }

    public function recover() {
        $this->load->model('login_model');
        $q = $this->login_model->password_reset();

        if($q['status']){
            $mail = $this->email_new_password($q['password'], $this->input->post('email'), $this->input->post('username'));
            if($mail){
                redirect('profile/login');
            }else{
                redirect('profile/error');
            }
        }else{
            redirect('profile/error');
        }
    }


/* Email Function
***************************************************************/
    public function email_new_password($pass, $to, $name){
        if($to === '' || $name === ''){
            redirect('login/forgot?e');
        }else{
            
            $from = 'do-not-reply';
            $subject = 'Your New Password';
            $message = '
<h4>Your New Password</h4><br />
<p>Username: '.$name.'</p>
<p>Password: '.$pass.'</p>
<p>Please be sure to change your password the next time you login. Thank you.</p>';
            
            //load the email base class
            $this->load->library('email');

            //configure the emailer
            $config['charset'] = 'utf-8';
            $config['protocol'] = 'sendmail';
            $config['mailtype'] = 'html';
            $config['wordwrap'] = TRUE;
            $this->email->initialize($config);
            
            //set the who, and from
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            
            if($this->email->send()){
                return true;
            }else{        
                $this->email->print_debugger(); 
            }
        }
    }

}

/* End of file login.php */
/* Location: ./application/controllers/profile */
?>