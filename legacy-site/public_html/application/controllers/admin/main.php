<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @brief 관리자 로그인
 */
class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		

        if ( !$this->session->userdata('ADMIN_SESSION') )
			redirect('/admin/auth');
	}

	public function index()
	{
		$data['parent'] = 'main';

		$this->load->view('admin/_common/header', $data);
		$this->load->view('admin/main/index');
		$this->load->view('admin/_common/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */