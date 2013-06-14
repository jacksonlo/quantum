<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
     
class install extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->lang->load(config_item('language_abbr'), config_item('language'));
    }

/* Initial Setup and Install
***************************************************************/

    public function index()
    {
        $conf = file_get_contents('./config.json');
        $c = json_decode($conf);

        $db_connect = $this->connect_to_db($c->db_username, $c->db_password, $c->db_name);

        if($db_connect){
            $this->load->database();
            $this->finish_the_install($c);

        }else{
            $data['db_status'] = 'failed to connect';
        }        
    }

    function finish_the_install($c)
    {
        $data['db_status'] = 'Database Connection Successful';

        $data['root'] = base_url();
        $data['pageRoot'] = base_url().'index.php';
        $data['pagetitle'] = 'Installing';
    
        $this->load->database();
        $this->load->model('install_model');
        $add_master = $this->install_model->add_master_user($c->admin_username, $c->admin_password, $c->admin_email);

        if($add_master == true){
            
            /* Update the footer
            *************************************/
            $path_to_footer = './application/views/common/footer.php';
            
            $file_f = file_get_contents($path_to_footer);
            $file_f = str_replace("{owner}", $c->owner, $file_f);
            $file_f = str_replace("{year}", $c->copyright, $file_f);

            $f = file_put_contents($path_to_footer, $file_f);
            
            if($f){
                $data['footer_status'] = 'Copyright Details Successful';
            }else{
                $data['footer_status'] = 'Copyright Details Failed';
            }

            /* Update contact
            *************************************/
            $path_to_contact = './application/controllers/contact.php';
            
            $file_c = file_get_contents($path_to_contact);
            $file_c = str_replace("{contact}", $c->contact_email, $file_c);

            $conn = file_put_contents($path_to_contact, $file_c);

            if($f){
                $data['contact_status'] = 'Contact Details Successful';
            }else{
                $data['contact_status'] = 'Contact Details Failed';
            }

            /* Update the header
            *************************************/
            $path_to_header = './application/views/common/header.php';
            
            $file_h = file_get_contents($path_to_header);
            $file_h = str_replace("{descr}", $c->meta_description, $file_h);
            $file_h = str_replace("{key}", $c->meta_keywords, $file_h);

            $head = file_put_contents($path_to_header, $file_h);

            if($head){
                $data['header_status'] = 'Header Details Successful';
            }else{
                $data['header_status'] = 'Header Details Failed';
            }
        }

        $this->load->view('common/header-minimal', $data);
        $this->load->view('install/installing', $data);
    }

    function connect_to_db($user, $pass, $name)
    {
        $path_to_file = './application/config/database.php';
        
        $file_contents = file_get_contents($path_to_file);
        $file_contents = str_replace("{user}", $user, $file_contents);
        $file_contents = str_replace("{password}", $pass, $file_contents);
        $file_contents = str_replace("{name}", $name, $file_contents);

        $dump = file_put_contents($path_to_file, $file_contents);

        if($dump){
            return true;
        }else{
            return false;
        }
    }

}

/* End of file install.php */
/* Location: ./application/controllers/setup */