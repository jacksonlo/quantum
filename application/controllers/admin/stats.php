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

class stats extends CI_Controller {

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
        $data['pagetitle'] = 'User Statistics';
        $data['today'] = $this->today();
        $data['yday'] = $this->yday();
        $data['last7'] = $this->last7();
        $data['comTime'] = $this->comTime();
        $data['total'] = $this->total();
        $data['now'] = $this->now();
        
        $this->load->view('common/header', $data);
        $this->load->view('common/menu', $data);
        $this->load->view('admin/stats', $data);
        $this->load->view('common/footer', $data);
    }

/* Login Statistic Functions
***************************************************************/  

    public function today()
    {
        $this->load->model('stats_model');
        $q = $this->stats_model->todayStat();
        return $q;
    }

    public function yday()
    {
        $this->load->model('stats_model');
        $q = $this->stats_model->ydayStat();
        return $q;
    }

    public function last7()
    {
        $this->load->model('stats_model');
        $q = $this->stats_model->last7Stat();
        return $q;
    }

    public function comTime()
    {
        $this->load->model('stats_model');
        $q = $this->stats_model->comTimeStat();
        return $q;
    }

    public function total()
    {
        $this->load->model('stats_model');
        $q = $this->stats_model->totalStat();
        return $q;
    }

    public function now()
    {
        $this->load->model('stats_model');
        $q = $this->stats_model->nowStat();
        return $q;
    }

}

/* End of file stats.php */
/* Location: ./application/controllers/admin */