<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sample extends MX_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->lang->load(config_item('language_abbr'), config_item('language'));
    }

/* Main Pages
***************************************************************/

    public function index(){
        $this->load->model('model_sample');
                
        //set some data and parameters
        $data['root'] = base_url();
        $data['pageRoot'] = base_url().'index.php';
        $data['pagetitle'] = 'Blog';
          
        // load the view components
        $this->load->view('common/header', $data);
        $this->load->view('common/menu', $data);
        $this->load->view('sample/sample', $data);
        $this->load->view('common/footer', $data); 
    }
    
}

/* End of file sample.php */
/* Location: /controllers/ */