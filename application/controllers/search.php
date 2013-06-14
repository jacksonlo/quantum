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

class search extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->lang->load(config_item('language_abbr'), config_item('language'));
    }

/* Main Pages
***************************************************************/

    public function index() 
    {
        redirect('search/result');
    }

    public function result() 
    {
        $this->load->model('modelsearch');
        $result = array();
        $data['searchterm'] = $this->input->post('search');

        $data['root'] = base_url();
        $data['pageRoot'] = base_url().'index.php';
        $data['pagetitle'] = 'Search Results';

        $this->load->view('common/header', $data);
        $this->load->view('common/menu', $data);

        $string = $this->input->post('search');
        $str_set = explode(" ", $string);

        $modules = get_module_list();

        foreach ($modules as $m) :
                $module_model = 'model_'.$m;
                $this->load->model($m.'/'.$module_model);
                
                foreach ($str_set as $s) :
                    array_push($result, $this->$module_model->search($string));
                endforeach;

        endforeach;

        $data['result'] = $result;

        if(!$data['result']){
            $data['error'] = 'Your search returned no results. Sorry.';
        }

        $this->load->view('search/results', $data);
        $this->load->view('common/footer', $data);
    }
}

/* End of file search.php */
/* Location: ./application/controllers/ */