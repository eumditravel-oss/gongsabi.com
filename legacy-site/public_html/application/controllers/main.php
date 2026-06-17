<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$data = array();

		$this->load->view('front/_common/header');
		$this->load->view('front/main/index', $data);
		$this->load->view('front/_common/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */