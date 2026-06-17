<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function index()
    {
    	$data = array();

        $banner_list = $this->banner_model->get_banner_list(array(
        	'use_random' => true,
        	'limit' => 1,
            'area' => 'customer'
        ));
        $data['banner_list'] = $banner_list;

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['child']['notice'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
		$this->load->view('front/customer/main', $data);		
		$this->load->view('front/_common/new_footer');    	
    }

	public function notice()
	{
		$data = array();

        $keyword 	= ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '';
        $page 		= $this->input->get('page');

	    $board_condition = array(
	        'board_db'      => 'notice',
	        'board_type'    => 'notice',
	        'page'			=> $page,
	        'keyword'		=> $keyword
	    );

	    $board_list = $this->board_model->get_board_list($board_condition);
	    $board_count = $this->board_model->get_board_count($board_condition);

		$data['board_list'] = $board_list;
		$data['board_count'] = $board_count[0]->cnt;

		unset($board_condition['board_db']);
		unset($board_condition['board_type']);
		unset($board_condition['page']);

		$data['condition'] = $board_condition;

		$data['url_query'] = '/front/customer/notice?'.http_build_query($board_condition);

		$config['base_url'] 				= $data['url_query'];
		$config['total_rows'] 				= $data['board_count'];
		$config['per_page']					= (int)$this->config->item('paging_limit');
		$config['page_query_string']		= true;
		$config['num_links']				= 5;
		$config['query_string_segment']		= 'page';

        $config['full_tag_open'] 	= '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] 	= '</ul>';
        $config['first_link'] 		= '<i class="fa fa-angle-double-left"></i>';
        $config['first_tag_open'] 	= '<li class="page-item first">';
        $config['first_tag_close'] 	= '</li>';
        $config['prev_link'] 		= '<i class="fa fa-angle-left"></i>';
        $config['prev_tag_open'] 	= '<li class="page-item prev">';
        $config['prev_tag_close'] 	= '</li>';
        $config['next_link'] 		= '<i class="fa fa-angle-right"></i>';
        $config['next_tag_open'] 	= '<li>';
        $config['next_tag_close'] 	= '</li>';
        $config['last_link'] 		= '<i class="fa fa-angle-double-right"></i>';
        $config['last_tag_open'] 	= '<li class="page-item last">';
        $config['last_tag_close'] 	= '</li>';
        $config['cur_tag_open'] 	= '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] 	= '</a></li>';
        $config['num_tag_open'] 	= '<li>';
        $config['num_tag_close'] 	= '</li>';
        $config['anchor_class']		= 'class="page-link"';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['child']['notice'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
		$this->load->view('front/customer/notice', $data);
		$this->load->view('front/_common/new_footer');
	}

	public function notice_view($board_seq)
	{
		$data = array();

		$list_condition = array(
			'page' => $this->input->get('page'),
			'keyword' => $this->input->get('keyword')
		);

	    $board_condition = array(
	        'board_db'      => 'notice',
	        'board_type'    => 'notice',
	        'board_seq'		=> $board_seq
	    );

	    $board_list = $this->board_model->get_board_list($board_condition);
	    $board_count = $this->board_model->get_board_count($board_condition);

		$data['board_list'] = $board_list;
		$data['board_count'] = $board_count[0]->cnt;
		$data['list_condition'] = $list_condition;

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['child']['notice'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
		$this->load->view('front/customer/notice_view', $data);
		$this->load->view('front/_common/new_footer');
	}

	public function pds()
	{
		$data = array();

        $keyword 	= ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '';
        $page 		= $this->input->get('page');

	    $board_condition = array(
	        'board_db'      => 'pds',
	        'board_type'    => 'pds',
	        'page'			=> $page,
	        'keyword'		=> $keyword
	    );

	    $board_list = $this->board_model->get_board_list($board_condition);
	    $board_count = $this->board_model->get_board_count($board_condition);

		$data['board_list'] = $board_list;
		$data['board_count'] = $board_count[0]->cnt;

		unset($board_condition['board_db']);
		unset($board_condition['board_type']);
		unset($board_condition['page']);

		$data['condition'] = $board_condition;

		$data['url_query'] = '/front/customer/pds?'.http_build_query($board_condition);

		$config['base_url'] 				= $data['url_query'];
		$config['total_rows'] 				= $data['board_count'];
		$config['per_page']					= (int)$this->config->item('paging_limit');
		$config['page_query_string']		= true;
		$config['num_links']				= 5;
		$config['query_string_segment']		= 'page';

        $config['full_tag_open'] 	= '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] 	= '</ul>';
        $config['first_link'] 		= '<i class="fa fa-angle-double-left"></i>';
        $config['first_tag_open'] 	= '<li class="page-item first">';
        $config['first_tag_close'] 	= '</li>';
        $config['prev_link'] 		= '<i class="fa fa-angle-left"></i>';
        $config['prev_tag_open'] 	= '<li class="page-item prev">';
        $config['prev_tag_close'] 	= '</li>';
        $config['next_link'] 		= '<i class="fa fa-angle-right"></i>';
        $config['next_tag_open'] 	= '<li>';
        $config['next_tag_close'] 	= '</li>';
        $config['last_link'] 		= '<i class="fa fa-angle-double-right"></i>';
        $config['last_tag_open'] 	= '<li class="page-item last">';
        $config['last_tag_close'] 	= '</li>';
        $config['cur_tag_open'] 	= '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] 	= '</a></li>';
        $config['num_tag_open'] 	= '<li>';
        $config['num_tag_close'] 	= '</li>';
        $config['anchor_class']		= 'class="page-link"';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['child']['pds'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
		$this->load->view('front/customer/pds', $data);
		$this->load->view('front/_common/new_footer');
	}

	public function pds_view($board_seq)
	{
		$data = array();

		$list_condition = array(
			'page' => $this->input->get('page'),
			'keyword' => $this->input->get('keyword')
		);

	    $board_condition = array(
	        'board_db'      => 'pds',
	        'board_type'    => 'pds',
	        'board_seq'		=> $board_seq
	    );

	    $board_list = $this->board_model->get_board_list($board_condition);
	    $board_count = $this->board_model->get_board_count($board_condition);

		$data['board_list'] = $board_list;
		$data['board_count'] = $board_count[0]->cnt;
		$data['list_condition'] = $list_condition;

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['child']['pds'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
		$this->load->view('front/customer/pds_view', $data);
		$this->load->view('front/_common/new_footer');
	}

	public function faq()
	{
		$data = array();

        $keyword 		= ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '';
        $page 			= $this->input->get('page');
        $board_category = ( $this->input->get('board_category') ) ? $this->input->get('board_category') : '';

	    $board_condition = array(
	        'board_db'      	=> 'faq',
	        'board_type'    	=> 'faq',
	        'page'				=> $page,
	        'keyword'			=> $keyword,
	        'board_category'	=> $board_category
	    );

	    $board_list = $this->board_model->get_board_list($board_condition);
	    $board_count = $this->board_model->get_board_count($board_condition);

		$data['board_list'] = $board_list;
		$data['board_count'] = $board_count[0]->cnt;

		unset($board_condition['board_db']);
		unset($board_condition['board_type']);
		unset($board_condition['page']);

		$data['condition'] = $board_condition;

		$data['url_query'] = '/front/customer/faq?'.http_build_query($board_condition);

		$config['base_url'] 				= $data['url_query'];
		$config['total_rows'] 				= $data['board_count'];
		$config['per_page']					= (int)$this->config->item('paging_limit');
		$config['page_query_string']		= true;
		$config['num_links']				= 5;
		$config['query_string_segment']		= 'page';

        $config['full_tag_open'] 	= '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] 	= '</ul>';
        $config['first_link'] 		= '<i class="fa fa-angle-double-left"></i>';
        $config['first_tag_open'] 	= '<li class="page-item first">';
        $config['first_tag_close'] 	= '</li>';
        $config['prev_link'] 		= '<i class="fa fa-angle-left"></i>';
        $config['prev_tag_open'] 	= '<li class="page-item prev">';
        $config['prev_tag_close'] 	= '</li>';
        $config['next_link'] 		= '<i class="fa fa-angle-right"></i>';
        $config['next_tag_open'] 	= '<li>';
        $config['next_tag_close'] 	= '</li>';
        $config['last_link'] 		= '<i class="fa fa-angle-double-right"></i>';
        $config['last_tag_open'] 	= '<li class="page-item last">';
        $config['last_tag_close'] 	= '</li>';
        $config['cur_tag_open'] 	= '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] 	= '</a></li>';
        $config['num_tag_open'] 	= '<li>';
        $config['num_tag_close'] 	= '</li>';
        $config['anchor_class']		= 'class="page-link"';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['child']['faq'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
		$this->load->view('front/customer/faq', $data);
		$this->load->view('front/_common/new_footer');
	}

	public function faq_view($board_seq)
	{
		$data = array();

		$list_condition = array(
			'page' => $this->input->get('page'),
			'keyword' => $this->input->get('keyword')
		);

	    $board_condition = array(
	        'board_db'      => 'faq',
	        'board_type'    => 'faq',
	        'board_seq'		=> $board_seq
	    );

	    $board_list = $this->board_model->get_board_list($board_condition);
	    $board_count = $this->board_model->get_board_count($board_condition);

		$data['board_list'] = $board_list;
		$data['board_count'] = $board_count[0]->cnt;
		$data['list_condition'] = $list_condition;

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['child']['faq'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
		$this->load->view('front/customer/faq_view', $data);
		$this->load->view('front/_common/new_footer');
	}

	public function qna()
	{
		$data = array();

        $keyword 	= ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '';
        $page 		= $this->input->get('page');

	    $board_condition = array(
	        'board_db'      => 'qna',
	        'board_type'    => 'qna',
	        'page'			=> $page,
	        'keyword'		=> $keyword
	    );

	    $board_list = $this->board_model->get_board_list($board_condition);
	    $board_count = $this->board_model->get_board_count($board_condition);

		$data['board_list'] = $board_list;
		$data['board_count'] = $board_count[0]->cnt;

		unset($board_condition['board_db']);
		unset($board_condition['board_type']);
		unset($board_condition['page']);

		$data['condition'] = $board_condition;

		$data['url_query'] = '/front/customer/qna?'.http_build_query($board_condition);

		$config['base_url'] 				= $data['url_query'];
		$config['total_rows'] 				= $data['board_count'];
		$config['per_page']					= (int)$this->config->item('paging_limit');
		$config['page_query_string']		= true;
		$config['num_links']				= 5;
		$config['query_string_segment']		= 'page';

        $config['full_tag_open'] 	= '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] 	= '</ul>';
        $config['first_link'] 		= '<i class="fa fa-angle-double-left"></i>';
        $config['first_tag_open'] 	= '<li class="page-item first">';
        $config['first_tag_close'] 	= '</li>';
        $config['prev_link'] 		= '<i class="fa fa-angle-left"></i>';
        $config['prev_tag_open'] 	= '<li class="page-item prev">';
        $config['prev_tag_close'] 	= '</li>';
        $config['next_link'] 		= '<i class="fa fa-angle-right"></i>';
        $config['next_tag_open'] 	= '<li>';
        $config['next_tag_close'] 	= '</li>';
        $config['last_link'] 		= '<i class="fa fa-angle-double-right"></i>';
        $config['last_tag_open'] 	= '<li class="page-item last">';
        $config['last_tag_close'] 	= '</li>';
        $config['cur_tag_open'] 	= '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] 	= '</a></li>';
        $config['num_tag_open'] 	= '<li>';
        $config['num_tag_close'] 	= '</li>';
        $config['anchor_class']		= 'class="page-link"';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['child']['qna'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
		$this->load->view('front/customer/qna', $data);
		$this->load->view('front/_common/new_footer');
	}

	public function qna_view($board_seq)
	{
		$data = array();

		$list_condition = array(
			'page' => $this->input->get('page'),
			'keyword' => $this->input->get('keyword')
		);

	    $board_condition = array(
	        'board_db'      => 'qna',
	        'board_type'    => 'qna',
	        'board_seq'		=> $board_seq
	    );

	    $board_list = $this->board_model->get_board_list($board_condition);
	    $board_count = $this->board_model->get_board_count($board_condition);

	    if ( $this->session->userdata('MEMBER_SESSION') && ( $board_list[0]->ins_user == $this->session->userdata('MEMBER')['member_id'] ) )
	    {
			$data['board_list'] = $board_list;
			$data['board_count'] = $board_count[0]->cnt;
			$data['list_condition'] = $list_condition;

	        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
	        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['name'];
	        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer'];
	        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['child']['qna'];
	        
	        $this->load->view('front/_common/new_header');
	        $this->load->view('front/_common/sub_header', $data);
			$this->load->view('front/customer/qna_view', $data);
			$this->load->view('front/_common/new_footer');
	    }
	    else
	    {
			$this->session->set_flashdata('SESSION_MESSAGE', '본인이 등록한 글만 열람이 가능합니다.');
			redirect('/front/customer/qna');
	    }
	}

	public function qna_modify($board_seq)
	{
		$data = array();

	    $board_condition = array(
	        'board_db'      => 'qna',
	        'board_type'    => 'qna',
	        'board_seq'		=> $board_seq
	    );

	    $board_list = $this->board_model->get_board_list($board_condition);
	    $board_count = $this->board_model->get_board_count($board_condition);

	    if ( $this->session->userdata('MEMBER_SESSION') && ( $board_list[0]->ins_user == $this->session->userdata('MEMBER')['member_id'] ) )
	    {
			$data['board_list'] = $board_list;

	        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
	        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['name'];
	        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer'];
	        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['child']['qna'];
	        
	        $this->load->view('front/_common/new_header');
	        $this->load->view('front/_common/sub_header', $data);
			$this->load->view('front/customer/qna_modify', $data);
			$this->load->view('front/_common/new_footer');
	    }
	    else
	    {
			$this->session->set_flashdata('SESSION_MESSAGE', '본인이 등록한 글만 열람이 가능합니다.');
			redirect('/front/customer/qna');
	    }
	}

	public function qna_modify_proc()
	{
		$board_seq		= trim($this->input->post('board_seq'));
		$board_category	= trim($this->input->post('board_category'));
		$board_name		= trim($this->input->post('board_name'));
		$board_company	= trim($this->input->post('board_company'));
		$board_email	= trim($this->input->post('board_email'));
		$board_hp		= trim($this->input->post('board_hp'));
		$board_phone	= trim($this->input->post('board_phone'));
		$board_title	= trim($this->input->post('board_title'));
		$board_content	= trim($this->input->post('board_content'));

		$values = array(
			'board_db'		=> 'qna',
			'board_type'	=> 'qna',
			'board_seq'		=> $board_seq,
			'upd_user'		=> $this->session->userdata('MEMBER')['member_id'],
			'upd_datetime'	=> date('Y-m-d H:i:s', now())
		);

		$values['board_name'] 		= $board_name;
		$values['board_company'] 	= $board_company;
		$values['board_email'] 		= $board_email;
		$values['board_phone'] 		= $board_phone;
		$values['board_title'] 		= $board_title;
		$values['board_content'] 	= $board_content;

		$result = $this->board_model->modify_board($values);

		if ($result)
		{
			$this->session->set_flashdata('SESSION_MESSAGE', '수정 하였습니다.');
			redirect('/front/customer/qna_modify/'.$board_seq);
		}
		else
		{
			$this->session->set_flashdata('SESSION_MESSAGE', '수정 실패 하였습니다.');
			redirect('/front/customer/qna_modify/'.$board_seq);
		}
    }

	public function qna_regist()
	{
		$data = array();

		if ( $this->session->userdata('MEMBER_SESSION') )
	    {

	        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
	        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['name'];
	        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer'];
	        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['child']['qna'];
	        
	        $this->load->view('front/_common/new_header');
	        $this->load->view('front/_common/sub_header', $data);
			$this->load->view('front/customer/qna_regist', $data);
			$this->load->view('front/_common/new_footer');
	    }
	    else
	    {
			$this->session->set_flashdata('SESSION_MESSAGE', '로그인이 필요합니다.');
			redirect('/front/customer/qna');
	    }	
	}

	public function qna_regist_proc()
	{
		if ( $this->session->userdata('MEMBER_SESSION') )
	    {    
			$board_name		= trim($this->input->post('board_name'));
			$board_company	= trim($this->input->post('board_company'));
			$board_email	= trim($this->input->post('board_email'));
			$board_phone	= trim($this->input->post('board_phone'));
			$board_title	= trim($this->input->post('board_title'));
			$board_content	= trim($this->input->post('board_content'));

			$values = array(
				'board_db'		=> 'qna',
				'board_type'	=> 'qna',
				'board_name'	=> $board_name,
				'board_company'	=> $board_company,
				'board_email'	=> $board_email,
				'board_phone'	=> $board_phone,
				'board_title'	=> $board_title,
				'board_content'	=> $board_content,
				'ins_user'		=> $this->session->userdata('MEMBER')['member_id'],
				'ins_datetime'	=> date('Y-m-d H:i:s', now())
			);

			$result = $this->board_model->regist_board($values);

			if ($result)
			{
	            // NOTI 발송
	            SEND_NOTI('qna');

				$this->session->set_flashdata('ERROR_MESSAGE', '등록 되었습니다.');
				redirect('/front/customer/qna_view/'.$result);
			}
			else
			{
				$this->session->set_flashdata('ERROR_MESSAGE', '등록 실패 하였습니다.');
				redirect('/front/customer/qna_regist');
			}
	    }
	    else
	    {
			$this->session->set_flashdata('SESSION_MESSAGE', '로그인이 필요합니다.');
			redirect('/front/customer/qna');
	    }
	}

	public function contact()
	{
		$data = array();

        $data['name'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['contact']['name'];
        $data['id'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['contact']['id'];

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['customer']['child']['qna'];
        
        $this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header_single', $data);		
		if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
			$this->load->view('front/customer/contact_regist_eng', $data);
		else
			$this->load->view('front/customer/contact_regist', $data);
		$this->load->view('front/_common/new_footer');
	}

	public function contact_regist_proc()
	{  
        $board_type         = 'contact';
        $board_company      = $this->input->post('board_company');
        $board_name         = $this->input->post('board_name');
        $board_email        = $this->input->post('board_email');
        $board_hp           = $this->input->post('board_hp');
        $board_content      = $this->input->post('board_content');
        $board_etc_1        = $this->input->post('board_etc_1');
        $board_etc_2        = $this->input->post('board_etc_2');
        $board_etc_3        = $this->input->post('board_etc_3');
        $board_etc_4        = $this->input->post('board_etc_4');
        $board_etc_5        = $this->input->post('board_etc_5');

        $values = array(
            'board_type'        => $board_type,
            'board_content'     => $board_content,
            'ins_user'          => $this->session->userdata('MEMBER')['member_id']
        );

        if ( isset($board_company) && $board_company )
            $values['board_company'] = $board_company;
        if ( isset($board_name) && $board_name )
            $values['board_name'] = $board_name;
        if ( isset($board_email) && $board_email )
            $values['board_email'] = $board_email;
        if ( isset($board_hp) && $board_hp )
            $values['board_hp'] = $board_hp;
        if ( isset($board_etc_1) && $board_etc_1 )
            $values['board_etc_1'] = $board_etc_1;
        if ( isset($board_etc_2) && $board_etc_2 )
            $values['board_etc_2'] = $board_etc_2;
        if ( isset($board_etc_3) && $board_etc_3 )
            $values['board_etc_3'] = $board_etc_3;
        if ( isset($board_etc_4) && $board_etc_4 )
            $values['board_etc_4'] = $board_etc_4;
        if ( isset($board_etc_5) && $board_etc_5 )
            $values['board_etc_5'] = $board_etc_5;

        // 파일 업로드 디렉토리
        $upload_dir = $this->config->item('gongsabi_data_contact_path');

        if ( !is_dir($upload_dir) ) {
            @mkdir($upload_dir, 0777, TRUE);
        }

        $config['upload_path']      = $upload_dir;
        $config['allowed_types']    = 'gif|jpg|jpeg|png|xls|xlsx|doc|docx|ppt|pptx|pdf|hwp|txt';
        $config['encrypt_name']     = TRUE;
        
        $this->load->library('upload', $config);
    
        if ( $this->upload->do_upload('board_attach_1'))
        {
            $upload_board_attach_1 = $this->upload->data();

            $upload_board_attach_1_name = $upload_board_attach_1['file_name'];
            $upload_board_attach_1_orig = $upload_board_attach_1['orig_name'];
            $upload_board_attach_1_path = $upload_board_attach_1['full_path'];

            $values['board_attach_1'] = $upload_board_attach_1_name.'|'.$upload_board_attach_1_orig;
        }
    
        if ( $this->upload->do_upload('board_attach_2'))
        {
            $upload_board_attach_2 = $this->upload->data();

            $upload_board_attach_2_name = $upload_board_attach_2['file_name'];
            $upload_board_attach_2_orig = $upload_board_attach_2['orig_name'];
            $upload_board_attach_2_path = $upload_board_attach_2['full_path'];

            $values['board_attach_2'] = $upload_board_attach_2_name.'|'.$upload_board_attach_2_orig;
        }
    
        if ( $this->upload->do_upload('board_attach_3'))
        {
            $upload_board_attach_3 = $this->upload->data();

            $upload_board_attach_3_name = $upload_board_attach_3['file_name'];
            $upload_board_attach_3_orig = $upload_board_attach_3['orig_name'];
            $upload_board_attach_3_path = $upload_board_attach_3['full_path'];

            $values['board_attach_3'] = $upload_board_attach_3_name.'|'.$upload_board_attach_3_orig;
        }

        if ( !$board_type )
            redirect('/');

        // 2023-07-24 이서진 요청 - 등록 막음
        // $result = HP_GET_BOARD_REGIST($this->config->item('site_id'), $board_type, $board_type, $values);
        $result = false;

		if ($result)
		{
            // NOTI 발송
            SEND_NOTI('contact');

			$this->session->set_flashdata('SESSION_MESSAGE', '등록 되었습니다.\n담당자를 통해서 연락 드리겠습니다.');
			redirect('/front/customer/contact');
		}
		else
		{
			$this->session->set_flashdata('SESSION_MESSAGE', '등록 실패 하였습니다.');
			redirect('/front/customer/contact');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */