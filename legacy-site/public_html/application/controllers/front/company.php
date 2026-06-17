<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @brief 회사소개
 */
class Company extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function company1()
	{
		$data = array();

    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['company']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['company'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['company']['child']['company1'];
    	
		$this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header', $data);
		if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
			$this->load->view('front/company/company1_eng', $data);
		else
			$this->load->view('front/company/company1', $data);
		$this->load->view('front/_common/new_footer');
	}

	public function company2()
	{
		$data = array();

    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['company']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['company'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['company']['child']['company2'];
    	
		$this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header', $data);
		if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
			$this->load->view('front/company/company2_eng', $data);
		else
			$this->load->view('front/company/company2', $data);
		$this->load->view('front/_common/new_footer');
	}

	public function company3()
	{
        $data = array();

        $condition = array(
            'page' => ( $this->input->get('page') ) ? $this->input->get('page') : 0,
            'keyword' => ( $this->input->get('keyword') ) ? $this->input->get('keyword') : ''
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'gonggo', 'gonggo', $condition);

        $data['condition'] = $condition;

        unset($data['condition']['page']);

        $data['url_query'] = '/front/company/company3?'.http_build_query($data['condition']);

        $config['base_url']                 = $data['url_query'];
        $config['total_rows']               = $board_data['count'];
        $config['per_page']                 = (int)$this->config->item('paging_limit');
        $config['page_query_string']        = true;
        $config['num_links']                = 5;
        $config['query_string_segment']     = 'page';

        $config['full_tag_open']    = '<ul class="pagination">';
        $config['full_tag_close']   = '</ul>';
        $config['first_link']       = '<i class="fa fa-angle-double-left"></i>';
        $config['first_tag_open']   = '<li class="page-item first">';
        $config['first_tag_close']  = '</li>';
        $config['prev_link']        = '<i class="fa fa-angle-left"></i>';
        $config['prev_tag_open']    = '<li class="page-item prev">';
        $config['prev_tag_close']   = '</li>';
        $config['next_link']        = '<i class="fa fa-angle-right"></i>';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']   = '</li>';
        $config['last_link']        = '<i class="fa fa-angle-double-right"></i>';
        $config['last_tag_open']    = '<li class="page-item last">';
        $config['last_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close']    = '</a></li>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['anchor_class']     = 'class="page-link"';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $data['board_data'] = $board_data;

    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['company']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['company'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['company']['child']['company3'];
    	
		$this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header', $data);
		if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
			$this->load->view('front/company/company3_eng', $data);
		else
			$this->load->view('front/company/company3', $data);
		$this->load->view('front/_common/new_footer');
	}

	public function recruit_view($seq)
	{	
		$data = array();

		$data['seq'] = $seq;

    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['company']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['company'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['company']['child']['company3'];
    	
		$this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header', $data);
		$this->load->view('front/company/recruit_view', $data);
		$this->load->view('front/_common/new_footer');		
	}

	public function company4()
	{
		$data = array();

    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['company']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['company'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['company']['child']['company4'];
    	
		$this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header', $data);
		if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
			$this->load->view('front/company/company4_eng', $data);
		else
			$this->load->view('front/company/company4', $data);
		$this->load->view('front/_common/new_footer');
	}

	/**
	 * @brief 회사소개
	 */
	public function index()
	{
		$this->company1();
	}

	/**
	 * @brief 이용약관
	 */
	public function term()
	{
		$data = array();

        $data['name'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['term']['name'];
        $data['id'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['term']['id'];

		$data['term'] = $this->load->view('template/term1', '', true);

		$this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header_single', $data);
		$this->load->view('front/company/term', $data);
		$this->load->view('front/_common/new_footer');
	}

	/**
	 * @brief 개인정보처리방침
	 */
	public function privacy()
	{
		$data = array();

        $data['name'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['privacy']['name'];
        $data['id'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['privacy']['id'];

		$data['privacy'] = $this->load->view('template/term2', '', true);

		$this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header_single', $data);
		$this->load->view('front/company/privacy', $data);
		$this->load->view('front/_common/new_footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */