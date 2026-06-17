<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Community extends CI_Controller {

    function __construct()
    {       
        parent::__construct();  

        /*
        if ( !$this->session->userdata('MEMBER_SESSION') )
        {
			$this->session->set_flashdata('SESSION_MESSAGE', '로그인이 필요합니다.');
			redirect('/');
        }
        */
    }

    public function index()
    {
    	$data = array();

        $banner_list = $this->banner_model->get_banner_list(array(
            'area' => 'community'
        ));
        $data['banner_list'] = $banner_list;

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['child']['market'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/community/main_eng', $data);
        else
            $this->load->view('front/community/main', $data);
		$this->load->view('front/_common/new_footer');
    }

	public function market()
	{
        $data = array();

        $condition = array(
            'page' => ( $this->input->get('page') ) ? $this->input->get('page') : 0,
            'keyword' => ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '',
            'board_category' => ( $this->input->get('board_category') ) ? $this->input->get('board_category') : ''
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'market', 'market', $condition);

        $data['condition'] = $condition;

        unset($data['condition']['page']);

        $data['url_query'] = '/front/community/market?'.http_build_query($data['condition']);

        $config['base_url']                 = $data['url_query'];
        $config['total_rows']               = $board_data['count'];
        $config['per_page']                 = (int)$this->config->item('paging_limit');
        $config['page_query_string']        = true;
        $config['num_links']                = 5;
        $config['query_string_segment']     = 'page';

        $config['full_tag_open']    = '<ul class="pagination justify-content-center">';
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
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['child']['market'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/community/market_eng', $data);
        else
            $this->load->view('front/community/market', $data);
        $this->load->view('front/_common/new_footer');
	}

	public function market_regist()
	{
		$data = array();

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['child']['market'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/community/market_regist_eng', $data);
        else
            $this->load->view('front/community/market_regist', $data);
		$this->load->view('front/_common/new_footer');		
	}

    public function market_regist_proc()
    {       
        $board_type         = 'market';
        $board_category     = $this->input->post('board_category');
        $board_company      = $this->input->post('board_company');
        $board_name         = $this->input->post('board_name');
        $board_email        = $this->input->post('board_email');
        $board_hp           = $this->input->post('board_hp');
        $board_title        = $this->input->post('board_title');
        $board_content      = $this->input->post('board_content');
        $board_etc_1        = $this->input->post('board_etc_1');
        $board_etc_2        = $this->input->post('board_etc_2');
        $board_etc_3        = $this->input->post('board_etc_3');
        $board_etc_4        = $this->input->post('board_etc_4');
        $board_etc_5        = $this->input->post('board_etc_5');

        $values = array(
            'board_type'        => $board_type,
            'board_title'       => $board_title,
            'board_content'     => $board_content,
            'ins_user'          => $this->session->userdata('MEMBER')['member_id']
        );

        if ( isset($board_category) && $board_category )
            $values['board_category'] = $board_category;
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
        $upload_dir = $this->config->item('gongsabi_data_market_path');

        if ( !is_dir($upload_dir) ) {
            @mkdir($upload_dir, 0777, TRUE);
        }

        $config['upload_path']      = $upload_dir;
        $config['max_size']         = '10240';
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
        else {
            $this->session->set_flashdata('SESSION_MESSAGE', $this->upload->display_errors('', ''));
            redirect('/front/community/market_regist');
        }
    
        if ( $this->upload->do_upload('board_attach_2'))
        {
            $upload_board_attach_2 = $this->upload->data();

            $upload_board_attach_2_name = $upload_board_attach_2['file_name'];
            $upload_board_attach_2_orig = $upload_board_attach_2['orig_name'];
            $upload_board_attach_2_path = $upload_board_attach_2['full_path'];

            $values['board_attach_2'] = $upload_board_attach_2_name.'|'.$upload_board_attach_2_orig;
        }
        else {
            $this->session->set_flashdata('SESSION_MESSAGE', $this->upload->display_errors('', ''));
            redirect('/front/community/market_regist');
        }
    
        if ( $this->upload->do_upload('board_attach_3'))
        {
            $upload_board_attach_3 = $this->upload->data();

            $upload_board_attach_3_name = $upload_board_attach_3['file_name'];
            $upload_board_attach_3_orig = $upload_board_attach_3['orig_name'];
            $upload_board_attach_3_path = $upload_board_attach_3['full_path'];

            $values['board_attach_3'] = $upload_board_attach_3_name.'|'.$upload_board_attach_3_orig;
        }
        else {
            $this->session->set_flashdata('SESSION_MESSAGE', $this->upload->display_errors('', ''));
            redirect('/front/community/market_regist');
        }

        if ( !$board_type )
            redirect('/');

        $result = HP_GET_BOARD_REGIST($this->config->item('site_id'), $board_type, $board_type, $values);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '등록 되었습니다.');
            redirect('/front/community/market_view/'.$result);
        }
        else
            redirect('/front/community/market');
    }

    public function market_view($board_seq)
    {
        $data = array();

        $condition = array(
            'board_seq' => $board_seq
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'market', 'market', $condition);

        /*
        if ( $board_data['list'][0]->ins_user != $this->session->userdata('MEMBER')['member_id'] )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '자신이 등록한 글만 열람이 가능합니다.');
            redirect('/front/community/market');
        }
        else
        {
            $data['board_data'] = $board_data;

            $this->load->view('front/_common/new_header');
            $this->load->view('front/community/market_view', $data);
            $this->load->view('front/_common/new_footer');
        }
        */

        $data['board_data'] = $board_data;

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['child']['market'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/community/market_view_eng', $data);
        else
            $this->load->view('front/community/market_view', $data);
        $this->load->view('front/_common/new_footer');
    }

	public function recruit()
	{
		$data = array();

        $condition = array(
            'page' => ( $this->input->get('page') ) ? $this->input->get('page') : 0,
            'keyword' => ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '',
            'board_category' => ( $this->input->get('board_category') ) ? $this->input->get('board_category') : ''
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'recruit', 'recruit', $condition);

        $data['condition'] = $condition;

        unset($data['condition']['page']);

        $data['url_query'] = '/front/community/recruit?'.http_build_query($data['condition']);

        $config['base_url']                 = $data['url_query'];
        $config['total_rows']               = $board_data['count'];
        $config['per_page']                 = (int)$this->config->item('paging_limit');
        $config['page_query_string']        = true;
        $config['num_links']                = 5;
        $config['query_string_segment']     = 'page';

        $config['full_tag_open']    = '<ul class="pagination justify-content-center">';
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
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['child']['recruit'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/community/recruit_eng', $data);
        else
            $this->load->view('front/community/recruit', $data);
        $this->load->view('front/_common/new_footer');
	}

	public function recruit_regist()
	{
		$data = array();

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['child']['recruit'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/community/recruit_regist_eng', $data);
        else
            $this->load->view('front/community/recruit_regist', $data);
		$this->load->view('front/_common/new_footer');		
	}

    public function recruit_regist_proc()
    {       
        $board_type         = 'recruit';
        $board_category     = $this->input->post('board_category');
        $board_company      = $this->input->post('board_company');
        $board_name         = $this->input->post('board_name');
        $board_email        = $this->input->post('board_email');
        $board_hp           = $this->input->post('board_hp');
        $board_title        = $this->input->post('board_title');
        $board_content      = $this->input->post('board_content');
        $board_etc_1        = $this->input->post('board_etc_1');
        $board_etc_2        = $this->input->post('board_etc_2');
        $board_etc_3        = $this->input->post('board_etc_3');
        $board_etc_4        = $this->input->post('board_etc_4');
        $board_etc_5        = $this->input->post('board_etc_5');

        $values = array(
            'board_type'        => $board_type,
            'board_title'       => $board_title,
            'board_content'     => $board_content,
            'ins_user'          => $this->session->userdata('MEMBER')['member_id']
        );

        if ( isset($board_category) && $board_category )
            $values['board_category'] = $board_category;
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
        $upload_dir = $this->config->item('gongsabi_data_recruit_path');

        if ( !is_dir($upload_dir) ) {
            @mkdir($upload_dir, 0777, TRUE);
        }

        $config['upload_path']      = $upload_dir;
        $config['max_size']         = '10240';
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
        else {
            $this->session->set_flashdata('SESSION_MESSAGE', $this->upload->display_errors('', ''));
            redirect('/front/community/recruit_regist');
        }
    
        if ( $this->upload->do_upload('board_attach_2'))
        {
            $upload_board_attach_2 = $this->upload->data();

            $upload_board_attach_2_name = $upload_board_attach_2['file_name'];
            $upload_board_attach_2_orig = $upload_board_attach_2['orig_name'];
            $upload_board_attach_2_path = $upload_board_attach_2['full_path'];

            $values['board_attach_2'] = $upload_board_attach_2_name.'|'.$upload_board_attach_2_orig;
        }
        else {
            $this->session->set_flashdata('SESSION_MESSAGE', $this->upload->display_errors('', ''));
            redirect('/front/community/recruit_regist');
        }
    
        if ( $this->upload->do_upload('board_attach_3'))
        {
            $upload_board_attach_3 = $this->upload->data();

            $upload_board_attach_3_name = $upload_board_attach_3['file_name'];
            $upload_board_attach_3_orig = $upload_board_attach_3['orig_name'];
            $upload_board_attach_3_path = $upload_board_attach_3['full_path'];

            $values['board_attach_3'] = $upload_board_attach_3_name.'|'.$upload_board_attach_3_orig;
        }
        else {
            $this->session->set_flashdata('SESSION_MESSAGE', $this->upload->display_errors('', ''));
            redirect('/front/community/recruit_regist');
        }

        if ( !$board_type )
            redirect('/');

        $result = HP_GET_BOARD_REGIST($this->config->item('site_id'), $board_type, $board_type, $values);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '등록 되었습니다.');
            redirect('/front/community/recruit_view/'.$result);
        }
        else
            redirect('/front/community/recruit');
    }

    public function recruit_view($board_seq)
    {
        $data = array();

        $condition = array(
            'board_seq' => $board_seq
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'recruit', 'recruit', $condition);

        /*
        if ( $board_data['list'][0]->ins_user != $this->session->userdata('MEMBER')['member_id'] )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '자신이 등록한 글만 열람이 가능합니다.');
            redirect('/front/community/recruit');
        }
        else
        {
            $data['board_data'] = $board_data;

            $this->load->view('front/_common/new_header');
            $this->load->view('front/community/recruit_view', $data);
            $this->load->view('front/_common/new_footer');
        }
        */

        $data['board_data'] = $board_data;

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['child']['recruit'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/community/recruit_view_eng', $data);
        else
            $this->load->view('front/community/recruit_view', $data);
        $this->load->view('front/_common/new_footer');
    }

	public function gongsabi()
	{
		$data = array();

		$condition = array(
            'limit' => 5,
			'page' => ( $this->input->get('page') ) ? $this->input->get('page') : 0,
            'keyword' => ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '',
            'board_category' => ( $this->input->get('board_category') ) ? $this->input->get('board_category') : ''
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'gongsabi', 'gongsabi', $condition);

		$data['condition'] = $condition;

		unset($data['condition']['page']);

		$data['url_query'] = '/front/community/gongsabi?'.http_build_query($data['condition']);

		$config['base_url'] 				= $data['url_query'];
		$config['total_rows'] 				= $board_data['count'];
		$config['per_page']					= 5;
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

        $data['board_data'] = $board_data;
        
        $data['privacy'] = $this->load->view('template/term2', '', true);

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['child']['gongsabi'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/community/gongsabi_eng', $data);
        else
            $this->load->view('front/community/gongsabi', $data);
		$this->load->view('front/_common/new_footer');
	}

	public function gongsabi_regist()
	{
		$data = array();
        
        $data['privacy'] = $this->load->view('template/term2', '', true);

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['child']['gongsabi'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/community/gongsabi_regist_eng', $data);
        else
            $this->load->view('front/community/gongsabi_regist', $data);
		$this->load->view('front/_common/new_footer');		
	}

	public function gongsabi_regist_proc()
	{		
        $board_type     	= 'gongsabi';
        $board_category  	= $this->input->post('board_category');
        $board_company  	= $this->input->post('board_company');
        $board_name     	= $this->input->post('board_name');
        $board_email    	= $this->input->post('board_email');
        $board_hp    		= $this->input->post('board_hp');
        $board_content  	= $this->input->post('board_content');

        $values = array(
            'board_type'        => $board_type,
            'board_content'     => $board_content,
            'ins_user'			=> $this->session->userdata('MEMBER')['member_id']
        );

        if ( isset($board_category) && $board_category )
            $values['board_category'] = $board_category;
        if ( isset($board_company) && $board_company )
            $values['board_company'] = $board_company;
        if ( isset($board_name) && $board_name )
            $values['board_name'] = $board_name;
        if ( isset($board_email) && $board_email )
            $values['board_email'] = $board_email;
        if ( isset($board_hp) && $board_hp )
            $values['board_hp'] = $board_hp;

        // 파일 업로드 디렉토리
        $upload_dir = $this->config->item('gongsabi_data_gongsabi_path');

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

        $result = HP_GET_BOARD_REGIST($this->config->item('site_id'), $board_type, $board_type, $values);

        if ( $result )
        {
            // NOTI 발송
            // SEND_NOTI('gongsabi');

            $this->session->set_flashdata('SESSION_MESSAGE', '등록 되었습니다.');
            redirect('/front/community/gongsabi_view/'.$result);
        }
        else
            redirect('/front/community/gongsabi');
	}

	public function gongsabi_view($board_seq)
	{
		$data = array();

		$condition = array(
			'board_seq' => $board_seq
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'gongsabi', 'gongsabi', $condition);

        if ( $board_data['list'][0]->ins_user != $this->session->userdata('MEMBER')['member_id'] )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '자신이 등록한 글만 열람이 가능합니다.');
            redirect('/front/community/gongsabi');
        }
        else
        {
	        $data['board_data'] = $board_data;

            $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
            $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['name'];
            $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community'];
            $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['child']['gongsabi'];
            
            $this->load->view('front/_common/new_header');
            $this->load->view('front/_common/sub_header', $data);
            if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
                $this->load->view('front/community/gongsabi_view_eng', $data);
            else
                $this->load->view('front/community/gongsabi_view', $data);
			$this->load->view('front/_common/new_footer');
        }
	}

    public function partners()
    {
        $data = array();

        $condition = array(
            'page' => ( $this->input->get('page') ) ? $this->input->get('page') : 0,
            'keyword' => ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '',
            'board_category' => ( $this->input->get('board_category') ) ? $this->input->get('board_category') : ''
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'partners', 'partners', $condition);

        $data['condition'] = $condition;

        unset($data['condition']['page']);

        $data['url_query'] = '/front/community/partners?'.http_build_query($data['condition']);

        $config['base_url']                 = $data['url_query'];
        $config['total_rows']               = $board_data['count'];
        $config['per_page']                 = (int)$this->config->item('paging_limit');
        $config['page_query_string']        = true;
        $config['num_links']                = 5;
        $config['query_string_segment']     = 'page';

        $config['full_tag_open']    = '<ul class="pagination justify-content-center">';
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
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['community']['child']['partners'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/community/partners_eng', $data);
        else
            $this->load->view('front/community/partners', $data);
        $this->load->view('front/_common/new_footer');      
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */