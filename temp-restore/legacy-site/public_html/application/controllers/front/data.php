<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Controller {

    function __construct()
    {       
        parent::__construct();  
    }

    public function index()
    {
    	$data = array();

        $banner_list = $this->banner_model->get_banner_list(array(
            'area' => 'data'
        ));
        $data['banner_list'] = $banner_list;

    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['data']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['data'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['data']['child']['gongsabi'];
    	
		$this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/data/main_eng', $data);
        else
            $this->load->view('front/data/main', $data);
		$this->load->view('front/_common/new_footer');
    }

    public function ajax_delete_scrap()
    {
    	$data = array();

    	$seq = $this->input->post('seq');

    	if ( !$seq )
    	{
    		$return = array(
    			'result' => false,
    			'resultMessage' => '선택된 내역이 없습니다.'
    		);
    	}
    	else if ( !$this->session->userdata('MEMBER_SESSION') )
    	{
    		$return = array(
    			'result' => false,
    			'resultMessage' => '로그인이 필요 합니다.'
    		);    		
    	}
    	else if ( $this->session->userdata('MEMBER_SESSION') && $this->session->userdata('MEMBER')['member_type'] == '1' )
    	{
    		$return = array(
    			'result' => false,
    			'resultMessage' => '무료회원은 사용 불가능 합니다.'
    		);    		
    	}
    	else
    	{
    		$condition = array(
    			'seq' => $seq,
    			'member_id' => $this->session->userdata('MEMBER')['member_id']
    		);

			$scrap_list = $this->scrap_model->get_scrap_list($condition);
			$scrap_count = $this->scrap_model->get_scrap_count($condition);
			$scrap_count = $scrap_count[0]->cnt;

			if ( $scrap_count == 0 )
			{
	    		$return = array(
	    			'result' => false,
	    			'resultMessage' => '스크랩한 내용이 아닙니다.'
	    		);  
			}
			else
			{
				$scrap = array(
					'seq' => $seq
				);

				$result = $this->scrap_model->delete_scrap($scrap);

				if ( $result )
				{
		    		$return = array(
		    			'result' => true,
		    			'resultMessage' => '스크랩을 삭제 했습니다.'
		    		);
				}
				else
				{
		    		$return = array(
		    			'result' => false,
		    			'resultMessage' => '스크랩 삭제 실패'
		    		);					
				}
			}
    	}

    	return_json($return);
    }

    public function ajax_scrap_gongsabi()
    {
    	$data = array();

    	$seq = $this->input->post('seq');

    	if ( !$seq )
    	{
    		$return = array(
    			'result' => false,
    			'resultMessage' => '선택된 내역이 없습니다.'
    		);
    	}
    	else if ( !$this->session->userdata('MEMBER_SESSION') )
    	{
    		$return = array(
    			'result' => false,
    			'resultMessage' => '로그인이 필요 합니다.'
    		);    		
    	}
    	else if ( $this->session->userdata('MEMBER_SESSION') && $this->session->userdata('MEMBER')['member_type'] == '1' )
    	{
    		$return = array(
    			'result' => false,
    			'resultMessage' => '무료회원은 사용 불가능 합니다.'
    		);    		
    	}
    	else
    	{
    		$condition = array(
    			'type' => 'gongsabi',
    			'data_seq' => $seq,
    			'member_id' => $this->session->userdata('MEMBER')['member_id']
    		);

			$scrap_list = $this->scrap_model->get_scrap_list($condition);
			$scrap_count = $this->scrap_model->get_scrap_count($condition);
			$scrap_count = $scrap_count[0]->cnt;

			if ( $scrap_count > 0 )
			{
	    		$return = array(
	    			'result' => false,
	    			'resultMessage' => '이미 스크랩한 내용 입니다.'
	    		);  
			}
			else
			{
				$scrap = array(
					'type' => 'gongsabi',
					'data_seq' => $seq,
					'member_id' => $this->session->userdata('MEMBER')['member_id'],
					'ins_datetime' => date('Y-m-d H:i:s', time())
				);

				$result = $this->scrap_model->regist_scrap($scrap);

				if ( $result )
				{
		    		$return = array(
		    			'result' => true,
		    			'resultMessage' => '스크랩 했습니다.'
		    		);
				}
				else
				{
		    		$return = array(
		    			'result' => false,
		    			'resultMessage' => '스크랩 실패'
		    		);					
				}
			}
    	}

    	return_json($return);
    }

    public function ajax_get_gongsabi_info()
    {
    	$data = array();

    	$seq = $this->input->post('seq');

    	if ( !$seq )
    	{
    		$return = array(
    			'result' => false,
    			'resultMessage' => '선택된 내역이 없습니다.'
    		);
    	}
    	else
    	{
    		$condition = array(
    			'seq' => $seq
    		);

			$gongsabi_list = $this->data_model->get_gongsabi_info($condition);
			$gongsabi_info = $gongsabi_list[0];
			$data['gongsabi_info'] = $gongsabi_info;

			$template = $this->load->view('template/gongsabi_info', $data, true);

			$return = array(
				'result' => true,
				'resultMessage' => '',
				'data' => $template
			);
    	}

    	return_json($return);
    }

    public function ajax_get_gongjeong_info()
    {
    	$data = array();

    	$seq = $this->input->post('seq');
    	$gongjeong = $this->input->post('gongjeong');
    	$idx = $this->input->post('idx');

    	if ( !$seq )
    	{
    		$return = array(
    			'result' => false,
    			'resultMessage' => '선택된 내역이 없습니다.'
    		);
    	}
    	else
    	{
    		$condition = array(
    			'seq' => $seq
    		);

			$gongsabi_list = $this->data_model->get_gongsabi_info($condition);
			$gongsabi_info = $gongsabi_list[0];

			// 공통가설
			if ( $idx == 0 )
				$data['gongjeong_info'] = $gongsabi_info->d37;
			// 건축
			else if ( $idx == 1 )
				$data['gongjeong_info'] = $gongsabi_info->d40_59;
			// 토목
			else if ( $idx == 2 )
				$data['gongjeong_info'] = $gongsabi_info->d63_65;
			// 기계
			else if ( $idx == 3 )
				$data['gongjeong_info'] = $gongsabi_info->d69_94;
			// 전기
			else if ( $idx == 4 )
				$data['gongjeong_info'] = $gongsabi_info->d98_118;
			// 통신
			else if ( $idx == 5 )
				$data['gongjeong_info'] = $gongsabi_info->d122_132;
			// 소방
			else if ( $idx == 6 )
				$data['gongjeong_info'] = $gongsabi_info->d136_145;
			// 부대
			else if ( $idx == 7 )
				$data['gongjeong_info'] = $gongsabi_info->d149_153;
			// 조경
			else if ( $idx == 8 )
				$data['gongjeong_info'] = $gongsabi_info->d157_160;

			$data['gongjeong_name'] = $gongjeong;
            $data['gongjong_idx'] = $idx;

			$template = $this->load->view('template/gongjeong_info', $data, true);

			$return = array(
				'result' => true,
				'resultMessage' => '',
				'data' => $template
			);
    	}

    	return_json($return);
    }

	public function gongsabi()
	{
		$data = array();

        if ( $this->input->get('c4') || $this->input->get('c7') || $this->input->get('c9') || $this->input->get('c11') || $this->input->get('keyword') )
        {
            // 건물 종류
            $c4         = ( $this->input->get('c4') ) ? $this->input->get('c4') : '';
            // 면적(㎡)
            $c7         = ( $this->input->get('c7') ) ? $this->input->get('c7') : '';
            // 지역
            $c9         = ( $this->input->get('c9') ) ? $this->input->get('c9') : '';
            // 착공년도
            $c11        = ( $this->input->get('c11') ) ? $this->input->get('c11') : '';
            $keyword    = ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '';
            $page       = $this->input->get('page');

            $condition = array(
                'c4'        => $c4,
                'c7'        => $c7,
                'c9'        => $c9,
                'c11'       => $c11,
                'keyword'   => $keyword,
                'page'      => $page
            );

            if ( !$this->session->userdata('MEMBER_SESSION') )
                $condition['limit'] = 5;

            $data['condition'] = $condition;

            $gongsabi_list = $this->data_model->get_gongsabi_list($condition);
            $gongsabi_count = $this->data_model->get_gongsabi_count($condition);

            $data['gongsabi_list'] = $gongsabi_list;
            $data['gongsabi_count'] = $gongsabi_count[0]->cnt;

            if ( !$this->session->userdata('MEMBER_SESSION') )
                $data['gongsabi_count'] = 5;
        }
        else
        {
            $page = '';

            $condition = array(
                'c4'        => '',
                'c7'        => '',
                'c9'        => '',
                'c11'       => '',
                'keyword'   => '',
                'page'      => ''
            );

            $data['condition'] = $condition;

            $data['gongsabi_list'] = array();
            $data['gongsabi_count'] = 0;
        }

		unset($data['condition']['page']);

		$data['url_query'] = '/front/data/gongsabi?'.http_build_query($data['condition']);

		$config['base_url'] 				= $data['url_query'];
		$config['total_rows'] 				= $data['gongsabi_count'];
		$config['per_page']					= (int)$this->config->item('paging_limit2');
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

		$data['condition']['page'] = $page;

		$data['pagination'] = $this->pagination->create_links();

    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['data']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['data'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['data']['child']['gongsabi'];
    	
		$this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/data/gongsabi_eng', $data);
        else
            $this->load->view('front/data/gongsabi', $data);
		$this->load->view('front/_common/new_footer');
	}

	public function goljo()
	{

        if ( $this->input->get('c4') || $this->input->get('c9') || $this->input->get('d7') || $this->input->get('c11') || $this->input->get('keyword') )
        {
            $c4    = ( $this->input->get('c4') ) ? $this->input->get('c4') : '';
            $c9    = ( $this->input->get('c9') ) ? $this->input->get('c9') : '';
            $d7    = ( $this->input->get('d7') ) ? $this->input->get('d7') : '';
            $c11    = ( $this->input->get('c11') ) ? $this->input->get('c11') : '2020년';
            if ($c11 == '2010년 이전')
                $c11 = '2004년';
            $keyword            = ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '';
            $page               = $this->input->get('page');

            $condition = array(
                'c4'        => $c4,
                'c9'        => $c9,
                'd7'        => $d7,
                'c11'       => $c11,
                'keyword'   => $keyword,
                'page'      => $page
            );

            if ( !$this->session->userdata('MEMBER_SESSION') )
                $condition['limit'] = 5;

            $data['condition'] = $condition;

            $danga_list = $this->data_model->get_goljo_list($condition);
            $danga_count = $this->data_model->get_goljo_count($condition);

            $data['danga_list'] = $danga_list;
            $data['danga_count'] = $danga_count[0]->cnt;

            if ( !$this->session->userdata('MEMBER_SESSION') )
                $data['danga_count'] = 5;
        }
        else
        {
            $page = '';

            $condition = array(
                'c4'        => '',
                'c9'        => '',
                'd7'        => '',
                'c11'       => '',
                'keyword'   => '',
                'page'      => ''
            );

            $data['condition'] = $condition;

            $data['danga_list'] = array();
            $data['danga_count'] = 0;
        }

		unset($data['condition']['page']);

		$data['url_query'] = '/front/data/goljo?'.http_build_query($data['condition']);

		$config['base_url'] 				= $data['url_query'];
		$config['total_rows'] 				= $data['danga_count'];
		$config['per_page']					= (int)$this->config->item('paging_limit2');
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
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['data']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['data'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['data']['child']['goljo'];
    	
		$this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/data/goljo_eng', $data);
        else
            $this->load->view('front/data/goljo', $data);
		$this->load->view('front/_common/new_footer');
	}

	public function danga()
	{
		$data = array();

        if ( $this->input->get('danga_category1') || $this->input->get('danga_category2') || $this->input->get('keyword') )
        {
            $danga_category1    = ( $this->input->get('danga_category1') ) ? $this->input->get('danga_category1') : '';
            $danga_category2    = ( $this->input->get('danga_category2') ) ? $this->input->get('danga_category2') : '';
            $keyword            = ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '';
            $page               = $this->input->get('page');

            $condition = array(
                'danga_category1'   => $danga_category1,
                'danga_category2'   => $danga_category2,
                'keyword'           => $keyword,
                'page'              => $page
            );

            $data['condition'] = $condition;

            $danga_list = $this->data_model->get_danga_list($condition);
            $danga_count = $this->data_model->get_danga_count($condition);

            $data['danga_list'] = $danga_list;
            $data['danga_count'] = $danga_count[0]->cnt;

            if ( !$this->session->userdata('MEMBER_SESSION') )
                $data['gongsabi_count'] = 5;
        }
        else
        {
            $page = '';

            $condition = array(
                'danga_category1'   => '',
                'danga_category2'   => '',
                'keyword'           => '',
                'page'              => ''
            );

            $data['condition'] = $condition;

            $data['danga_list'] = array();
            $data['danga_count'] = 0;
        }

		unset($data['condition']['page']);

		$data['url_query'] = '/front/data/danga?'.http_build_query($data['condition']);

		$config['base_url'] 				= $data['url_query'];
		$config['total_rows'] 				= $data['danga_count'];
		$config['per_page']					= (int)$this->config->item('paging_limit2');
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
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['data']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['data'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['data']['child']['danga'];
    	
		$this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/data/danga_eng', $data);
        else
            $this->load->view('front/data/danga', $data);
		$this->load->view('front/_common/new_footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */