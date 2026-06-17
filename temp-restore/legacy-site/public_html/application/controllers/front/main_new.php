<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_new extends CI_Controller {

	public function index()
	{
		$data = array();

        $banner_list = $this->banner_model->get_banner_list(array(
            'area' => 'main_bottom'
        ));
        $data['banner_list'] = $banner_list;

		// 왼쪽 배너
        $banner_list = $this->banner_model->get_banner_list(array(
            'area' => 'main_left'
        ));
        $data['left_banner_list'] = $banner_list;

		// 오른쪽 배너
        $banner_list = $this->banner_model->get_banner_list(array(
            'area' => 'main_right'
        ));
        $data['right_banner_list'] = $banner_list;

		// 동영상 강의 시청 및 구매
		$youtube = HP_GET_BOARD_LIST($this->config->item('site_id'), 'youtube', 'youtube', array('limit' => 3));
		$data['youtube'] = $youtube;

		// 공사비닷컴 FAQ
		$faq = HP_GET_BOARD_LIST($this->config->item('site_id'), 'faq', 'faq', array('limit' => 3));
		$data['faq'] = $faq;

		// 공사비닷컴 소식
		$notice = HP_GET_BOARD_LIST($this->config->item('site_id'), 'notice', 'notice', array('limit' => 4));
		$data['notice'] = $notice;

		$this->load->view('front/_common/new_header', $data);
		if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
			$this->load->view('front/new/index_eng');
		else
			$this->load->view('front/new/index');
		$this->load->view('front/_common/new_footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */