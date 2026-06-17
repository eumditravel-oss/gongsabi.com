<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$data = array();

		$front_slider = array();

		/*
		$condition = array(
			'parent' 	=> 'business'
		);

		$_info = $this->main_model->get_random_main($condition);

		$front_slider[] = array(
			'parent' => 'business',
			'items'	 => $_info
		);
		*/

		$condition = array(
			'parent' 	=> 'result'
		);

		$_info = $this->main_model->get_random_main($condition);

		$condition['items'] = $_info;
		array_push($front_slider, $condition);

		$condition = array(
			'parent' 	=> 'customer'
		);

		$_info = $this->main_model->get_random_main($condition);

		$condition['items'] = $_info;
		array_push($front_slider, $condition);

		$data['front_slider'] = $front_slider;

		$_recruit = $this->recruit_model->get_lastest_recruit();
		$data['recruit'] = $_recruit;

		$this->load->view('front/_common/main_header', $data);
		$this->load->view('front/main/index');
		$this->load->view('front/_common/main_footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */