<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @brief 사업실적
 */
class Result extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->building();
	}

	/**
	 * @brief 건축분야
	 */
	public function building()
	{
		$enh_menu 			= $this->config->item('enh_menu');
		$data['top_menu'] 	= $enh_menu;
		$data['left_menu'] 	= $enh_menu['result'];
		$data['parent'] 	= 'result';
		$data['now'] 		= 'building';

		$page 				= trim($this->input->get('page'));
		$keyword 			= trim($this->input->get('keyword'));

		$condition = array(
			'target' 	=> 'building',
			'use_yn'	=> '1',
			'page'	 	=> $page,
			'keyword'	=> $keyword
		);

		$data['condition']  = $condition;

		$data['list']		= $this->result_model->get_results($condition);
		$_count 			= $this->result_model->get_results_count($condition);
		$data['count']		= $_count[0]->cnt;

		$config['base_url'] 			= '/result/building?keyword='.$keyword;
		$config['total_rows'] 			= $data['count'];
		$config['per_page'] 			= 9; 
		$config['num_links']			= 10;
        $config['page_query_string']    = true;
        $config['query_string_segment']	= 'page';

        $config['full_tag_open'] 		= '<ul class="pagination">';
        $config['full_tag_close'] 		= '</ul>';
        $config['first_link'] 			= '<<';
        $config['first_tag_open'] 		= '<li>';
        $config['first_tag_close'] 		= '</li>';
        $config['prev_link'] 			= '<';
        $config['prev_tag_open'] 		= '<li class="page-item prev">';
        $config['prev_tag_close'] 		= '</li>';
        $config['next_link'] 			= '>';
        $config['next_tag_open'] 		= '<li class="page-item next">';
        $config['next_tag_close'] 		= '</li>';
        $config['last_link'] 			= '>>';
        $config['last_tag_open'] 		= '<li>';
        $config['last_tag_close'] 		= '</li>';
        $config['cur_tag_open'] 		= '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] 		= '</a></li>';
        $config['num_tag_open'] 		= '<li class="page-item">';
        $config['num_tag_close'] 		= '</li>';
        $config['anchor_class']			= 'class="page-link"';

		$this->pagination->initialize($config);

		$data['pagination']				= $this->pagination->create_links();

		$this->load->view('front/_common/header', $data);
		$this->load->view('front/result/building');
		$this->load->view('front/_common/footer');
	}

	public function building_view($seq)
	{
		$enh_menu 			= $this->config->item('enh_menu');
		$data['top_menu'] 	= $enh_menu;
		$data['left_menu'] 	= $enh_menu['result'];
		$data['parent'] 	= 'result';
		$data['now'] 		= 'building';

		$page 				= trim($this->input->get('page'));
		$keyword 			= trim($this->input->get('keyword'));

		$condition = array(
			'target'	=> 'building',
			'seq'	 	=> $seq,
			'page'	 	=> $page,
			'keyword'	=> $keyword
		);

		$data['condition']  = $condition;

		$_info = $this->result_model->get_result($condition);
		$data['info']	= $_info[0];

		$_prev = $this->result_model->get_prev_result($condition);
		if ( count($_prev) > 0 )
			$data['prev'] = $_prev[0];
		else
			$data['prev'] = (object) array('seq' => '', 'title' => '이전 글이 없습니다.');

		$_next = $this->result_model->get_next_result($condition);
		if ( count($_next) > 0 )
			$data['next'] = $_next[0];
		else
			$data['next'] = (object) array('seq' => '', 'title' => '다음 글이 없습니다.');

		$this->load->view('front/_common/header', $data);
		$this->load->view('front/result/building_view');
		$this->load->view('front/_common/footer');
	}

	/**
	 * @brief 주택분야
	 */
	public function house()
	{
		$enh_menu 			= $this->config->item('enh_menu');
		$data['top_menu'] 	= $enh_menu;
		$data['left_menu'] 	= $enh_menu['result'];
		$data['parent'] 	= 'result';
		$data['now'] 		= 'house';

		$page 				= trim($this->input->get('page'));
		$keyword 			= trim($this->input->get('keyword'));

		$condition = array(
			'target' 	=> 'house',
			'use_yn'	=> '1',
			'page'	 	=> $page,
			'keyword'	=> $keyword
		);

		$data['condition']  = $condition;

		$data['list']		= $this->result_model->get_results($condition);
		$_count 			= $this->result_model->get_results_count($condition);
		$data['count']		= $_count[0]->cnt;

		$config['base_url'] 			= '/result/house?keyword='.$keyword;
		$config['total_rows'] 			= $data['count'];
		$config['per_page'] 			= 9; 
		$config['num_links']			= 10;
        $config['page_query_string']    = true;
        $config['query_string_segment']	= 'page';

        $config['full_tag_open'] 		= '<ul class="pagination">';
        $config['full_tag_close'] 		= '</ul>';
        $config['first_link'] 			= '<<';
        $config['first_tag_open'] 		= '<li>';
        $config['first_tag_close'] 		= '</li>';
        $config['prev_link'] 			= '<';
        $config['prev_tag_open'] 		= '<li class="page-item prev">';
        $config['prev_tag_close'] 		= '</li>';
        $config['next_link'] 			= '>';
        $config['next_tag_open'] 		= '<li class="page-item next">';
        $config['next_tag_close'] 		= '</li>';
        $config['last_link'] 			= '>>';
        $config['last_tag_open'] 		= '<li>';
        $config['last_tag_close'] 		= '</li>';
        $config['cur_tag_open'] 		= '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] 		= '</a></li>';
        $config['num_tag_open'] 		= '<li class="page-item">';
        $config['num_tag_close'] 		= '</li>';
        $config['anchor_class']			= 'class="page-link"';

		$this->pagination->initialize($config);

		$data['pagination']				= $this->pagination->create_links();

		$this->load->view('front/_common/header', $data);
		$this->load->view('front/result/house');
		$this->load->view('front/_common/footer');
	}

	public function house_view($seq)
	{
		$enh_menu 			= $this->config->item('enh_menu');
		$data['top_menu'] 	= $enh_menu;
		$data['left_menu'] 	= $enh_menu['result'];
		$data['parent'] 	= 'result';
		$data['now'] 		= 'house';

		$page 				= trim($this->input->get('page'));
		$keyword 			= trim($this->input->get('keyword'));

		$condition = array(
			'target'	=> 'house',
			'seq'	 	=> $seq,
			'page'	 	=> $page,
			'keyword'	=> $keyword
		);

		$data['condition']  = $condition;

		$_info = $this->result_model->get_result($condition);
		$data['info']	= $_info[0];

		$_prev = $this->result_model->get_prev_result($condition);
		if ( count($_prev) > 0 )
			$data['prev'] = $_prev[0];
		else
			$data['prev'] = (object) array('seq' => '', 'title' => '이전 글이 없습니다.');

		$_next = $this->result_model->get_next_result($condition);
		if ( count($_next) > 0 )
			$data['next'] = $_next[0];
		else
			$data['next'] = (object) array('seq' => '', 'title' => '다음 글이 없습니다.');

		$this->load->view('front/_common/header', $data);
		$this->load->view('front/result/house_view');
		$this->load->view('front/_common/footer');
	}

	/**
	 * @brief 기타
	 */
	public function etc()
	{
		$enh_menu 			= $this->config->item('enh_menu');
		$data['top_menu'] 	= $enh_menu;
		$data['left_menu'] 	= $enh_menu['result'];
		$data['parent'] 	= 'result';
		$data['now'] 		= 'etc';

		$page 				= trim($this->input->get('page'));
		$keyword 			= trim($this->input->get('keyword'));

		$condition = array(
			'target' 	=> 'etc',
			'use_yn'	=> '1',
			'page'	 	=> $page,
			'keyword'	=> $keyword
		);

		$data['condition']  = $condition;

		$data['list']		= $this->result_model->get_results($condition);
		$_count 			= $this->result_model->get_results_count($condition);
		$data['count']		= $_count[0]->cnt;

		$config['base_url'] 			= '/result/etc?keyword='.$keyword;
		$config['total_rows'] 			= $data['count'];
		$config['per_page'] 			= 9; 
		$config['num_links']			= 10;
        $config['page_query_string']    = true;
        $config['query_string_segment']	= 'page';

        $config['full_tag_open'] 		= '<ul class="pagination">';
        $config['full_tag_close'] 		= '</ul>';
        $config['first_link'] 			= '<<';
        $config['first_tag_open'] 		= '<li>';
        $config['first_tag_close'] 		= '</li>';
        $config['prev_link'] 			= '<';
        $config['prev_tag_open'] 		= '<li class="page-item prev">';
        $config['prev_tag_close'] 		= '</li>';
        $config['next_link'] 			= '>';
        $config['next_tag_open'] 		= '<li class="page-item next">';
        $config['next_tag_close'] 		= '</li>';
        $config['last_link'] 			= '>>';
        $config['last_tag_open'] 		= '<li>';
        $config['last_tag_close'] 		= '</li>';
        $config['cur_tag_open'] 		= '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] 		= '</a></li>';
        $config['num_tag_open'] 		= '<li class="page-item">';
        $config['num_tag_close'] 		= '</li>';
        $config['anchor_class']			= 'class="page-link"';

		$this->pagination->initialize($config);

		$data['pagination']				= $this->pagination->create_links();

		$this->load->view('front/_common/header', $data);
		$this->load->view('front/result/etc');
		$this->load->view('front/_common/footer');
	}

	public function etc_view($seq)
	{
		$enh_menu 			= $this->config->item('enh_menu');
		$data['top_menu'] 	= $enh_menu;
		$data['left_menu'] 	= $enh_menu['result'];
		$data['parent'] 	= 'result';
		$data['now'] 		= 'etc';

		$page 				= trim($this->input->get('page'));
		$keyword 			= trim($this->input->get('keyword'));

		$condition = array(
			'target'	=> 'etc',
			'seq'	 	=> $seq,
			'page'	 	=> $page,
			'keyword'	=> $keyword
		);

		$data['condition']  = $condition;

		$_info = $this->result_model->get_result($condition);
		$data['info']	= $_info[0];

		$_prev = $this->result_model->get_prev_result($condition);
		if ( count($_prev) > 0 )
			$data['prev'] = $_prev[0];
		else
			$data['prev'] = (object) array('seq' => '', 'title' => '이전 글이 없습니다.');

		$_next = $this->result_model->get_next_result($condition);
		if ( count($_next) > 0 )
			$data['next'] = $_next[0];
		else
			$data['next'] = (object) array('seq' => '', 'title' => '다음 글이 없습니다.');

		$this->load->view('front/_common/header', $data);
		$this->load->view('front/result/etc_view');
		$this->load->view('front/_common/footer');
	}

	/**
	 * @brief 진행현장
	 */
	public function site()
	{
		$enh_menu 			= $this->config->item('enh_menu');
		$data['top_menu'] 	= $enh_menu;
		$data['left_menu'] 	= $enh_menu['result'];
		$data['parent'] 	= 'result';
		$data['now'] 		= 'site';

		$page 				= trim($this->input->get('page'));
		$keyword 			= trim($this->input->get('keyword'));

		$condition = array(
			'target' 	=> 'site',
			'use_yn'	=> '1',
			'page'	 	=> $page,
			'keyword'	=> $keyword
		);

		$data['condition']  = $condition;

		$data['list']		= $this->result_model->get_results($condition);
		$_count 			= $this->result_model->get_results_count($condition);
		$data['count']		= $_count[0]->cnt;

		$config['base_url'] 			= '/result/site?keyword='.$keyword;
		$config['total_rows'] 			= $data['count'];
		$config['per_page'] 			= 9; 
		$config['num_links']			= 10;
        $config['page_query_string']    = true;
        $config['query_string_segment']	= 'page';

        $config['full_tag_open'] 		= '<ul class="pagination">';
        $config['full_tag_close'] 		= '</ul>';
        $config['first_link'] 			= '<<';
        $config['first_tag_open'] 		= '<li>';
        $config['first_tag_close'] 		= '</li>';
        $config['prev_link'] 			= '<';
        $config['prev_tag_open'] 		= '<li class="page-item prev">';
        $config['prev_tag_close'] 		= '</li>';
        $config['next_link'] 			= '>';
        $config['next_tag_open'] 		= '<li class="page-item next">';
        $config['next_tag_close'] 		= '</li>';
        $config['last_link'] 			= '>>';
        $config['last_tag_open'] 		= '<li>';
        $config['last_tag_close'] 		= '</li>';
        $config['cur_tag_open'] 		= '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] 		= '</a></li>';
        $config['num_tag_open'] 		= '<li class="page-item">';
        $config['num_tag_close'] 		= '</li>';
        $config['anchor_class']			= 'class="page-link"';

		$this->pagination->initialize($config);

		$data['pagination']				= $this->pagination->create_links();

		$this->load->view('front/_common/header', $data);
		$this->load->view('front/result/site');
		$this->load->view('front/_common/footer');
	}

	public function site_view($seq)
	{
		$enh_menu 			= $this->config->item('enh_menu');
		$data['top_menu'] 	= $enh_menu;
		$data['left_menu'] 	= $enh_menu['result'];
		$data['parent'] 	= 'result';
		$data['now'] 		= 'site';

		$page 				= trim($this->input->get('page'));
		$keyword 			= trim($this->input->get('keyword'));

		$condition = array(
			'target'	=> 'site',
			'seq'	 	=> $seq,
			'page'	 	=> $page,
			'keyword'	=> $keyword
		);

		$data['condition']  = $condition;

		$_info = $this->result_model->get_result($condition);
		$data['info']	= $_info[0];

		$_prev = $this->result_model->get_prev_result($condition);
		if ( count($_prev) > 0 )
			$data['prev'] = $_prev[0];
		else
			$data['prev'] = (object) array('seq' => '', 'title' => '이전 글이 없습니다.');

		$_next = $this->result_model->get_next_result($condition);
		if ( count($_next) > 0 )
			$data['next'] = $_next[0];
		else
			$data['next'] = (object) array('seq' => '', 'title' => '다음 글이 없습니다.');

		$this->load->view('front/_common/header', $data);
		$this->load->view('front/result/site_view');
		$this->load->view('front/_common/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */