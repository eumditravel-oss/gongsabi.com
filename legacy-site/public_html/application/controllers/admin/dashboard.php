<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct()
    {       
        parent::__construct();  

        if ( !$this->session->userdata('ADMIN_SESSION') )
        	redirect('/admin/auth');
    }

	public function index()
	{
		$data = array();

        $this->load->view('admin/_common/header');
		$this->load->view('admin/dashboard/main', $data);
		$this->load->view('admin/_common/footer');	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */