<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends CI_Controller {

    function __construct()
    {       
        parent::__construct();  

        if ( !$this->session->userdata('ADMIN_SESSION') )
            redirect('/admin/auth');
    }

	// 배너
	public function index()
	{
		$data = array();

		$area = ( $this->input->get('area') ) ? $this->input->get('area') : '';
        $page = $this->input->get('page');

		$condition = array(
			'area' => $area,
			'page' => $page,
			'use_limit' => true
		);
		
		// 배너 리스트
		$banner_list 	= $this->banner_model->get_banner_list($condition);
		$banner_count 	= $this->banner_model->get_banner_count($condition);

        unset($condition['page']);

        $data['url_query'] = '/admin/banner?'.http_build_query($condition);

        $config['base_url']                 = $data['url_query'];
        $config['total_rows']               = $banner_count[0]->cnt;
        // $config['per_page']                 = (int)$this->config->item('paging_limit');
        $config['per_page']                 = 10;
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

        $board_data = array(
        	'list' => $banner_list,
        	'count' => $banner_count[0]->cnt,
        	'pagination' => $this->pagination->create_links(),
        );

        $data['condition'] = $condition;
        $data['board'] = $area;
        $data['board_data'] = $board_data;

        $this->load->view('admin/_common/header');
		$this->load->view('admin/banner/list', $data);
		$this->load->view('admin/_common/footer');
	}

	// 메인 슬라이더 등록
	public function banner_regist()
	{
		$data = array();

        $this->load->view('admin/_common/header');
		$this->load->view('admin/banner/regist', $data);
		$this->load->view('admin/_common/footer');		
	}

	// 메인 슬라이더 등록
	public function banner_regist_proc()
	{
		$area		= trim($this->input->post('area'));
		$desc		= trim($this->input->post('desc'));
		$w_link		= trim($this->input->post('w_link'));
		$w_target	= trim($this->input->post('w_target'));
		$m_link		= trim($this->input->post('m_link'));
		$m_target	= trim($this->input->post('m_target'));
		
		// 파일 업로드 디렉토리
		$upload_dir = $this->config->item('gongsabi_data_banner_path').'/'.$area;

		if ( !is_dir($upload_dir) ) {
			@mkdir($upload_dir, 0777, TRUE);
		}

		$config['upload_path'] = $upload_dir;
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['encrypt_name'] = TRUE;
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		
		$this->load->library('upload', $config);

		$values = array(
			'area' 			=> $area,
			'desc' 			=> $desc,
			'w_link'		=> $w_link,
			'w_target'		=> $w_target,
			'm_link'		=> $m_link,
			'm_target'		=> $m_target,
			'ins_datetime'	=> date('Y-m-d H:i:s', now()),
			'ins_ip'		=> $_SERVER['REMOTE_ADDR']
		);
	
		if ( $this->upload->do_upload('w_image'))
		{
			$upload_image = $this->upload->data();

			$upload_image_name = $upload_image['file_name'];
			$upload_image_path = $upload_image['full_path'];

			$values['w_image'] = $upload_image_name;
		}
	
		if ( $this->upload->do_upload('m_image'))
		{
			$upload_m_image = $this->upload->data();

			$upload_m_image_name = $upload_m_image['file_name'];
			$upload_m_image_path = $upload_m_image['full_path'];

			$values['m_image'] = $upload_m_image_name;
		}

		$result = $this->banner_model->regist_banner($values);

		if ($result)
		{
			$this->session->set_flashdata('HANDLE_ERROR_MESSAGE', '배너를 등록 하였습니다.');
			redirect('admin/banner');
		}
		else
		{
			$this->session->set_flashdata('HANDLE_ERROR_MESSAGE', '배너 등록이 실패 하였습니다.');
			redirect('admin/banner/banner_regist');
		}		
	}

	// 메인 슬라이더 수정
	public function banner_modify($area, $seq)
	{
		$data = array();

		$condition = array(
			'area' => $area,
			'seq' => $seq
		);
		
		// 배너 리스트
		$banner_list 	= $this->banner_model->get_banner_list($condition);
		$banner_count 	= $this->banner_model->get_banner_count($condition);

        $board_data = array(
        	'list' => $banner_list,
        	'count' => $banner_count[0]->cnt
        );

		if ($banner_list)
		{
        	$data['board_data'] = $board_data;
		}
		else {
			go_page('등록된 배너가 없습니다.', '/admin/banner/'.$area);
		}

        $this->load->view('admin/_common/header');
		$this->load->view('admin/banner/modify', $data);
		$this->load->view('admin/_common/footer');			
	}

	// 메인 슬라이더 수정 처리
	public function banner_modify_proc()
	{
		$return_area	= trim($this->input->post('return_area'));
		$return_page	= trim($this->input->post('return_page'));

		$seq		= trim($this->input->post('seq'));
		$status		= trim($this->input->post('status'));
		$area		= trim($this->input->post('area'));
		$desc		= trim($this->input->post('desc'));
		$w_link		= trim($this->input->post('w_link'));
		$w_target	= trim($this->input->post('w_target'));
		$m_link		= trim($this->input->post('m_link'));
		$m_target	= trim($this->input->post('m_target'));

		$condition = array(
			'area' => $area,
			'seq' => $seq
		);
		
		// 배너 리스트
		$banner_list 	= $this->banner_model->get_banner_list($condition);

		if ($banner_list)
		{
			$banner = $banner_list[0];
		}
		
		// 파일 업로드 디렉토리
		$upload_dir = $this->config->item('gongsabi_data_banner_path').'/'.$area;

		if ( !is_dir($upload_dir) ) {
			@mkdir($upload_dir, 0777, TRUE);
		}

		$config['upload_path'] = $upload_dir;
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['encrypt_name'] = TRUE;
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		
		$this->load->library('upload', $config);

		$values = array(
			'seq' 			=> $seq,
			'status' 		=> $status,
			'area' 			=> $area,
			'desc' 			=> $desc,
			'w_link'		=> $w_link,
			'w_target'		=> $w_target,
			'm_link'		=> $m_link,
			'm_target'		=> $m_target,
			'upd_datetime'	=> date('Y-m-d H:i:s', now()),
			'upd_ip'		=> $_SERVER['REMOTE_ADDR']
		);
	
		if ( $this->upload->do_upload('w_image'))
		{
			$old_w_image = $upload_dir.'/'.$banner->w_image;

			if ( is_file($old_w_image) )
				unlink($old_w_image);

			$upload_image = $this->upload->data();

			$upload_image_name = $upload_image['file_name'];
			$upload_image_path = $upload_image['full_path'];

			$values['w_image'] = $upload_image_name;
		}
	
		if ( $this->upload->do_upload('m_image'))
		{
			$old_m_image = $upload_dir.'/'.$banner->m_image;

			if ( is_file($old_m_image) )
				unlink($old_m_image);

			$upload_m_image = $this->upload->data();

			$upload_m_image_name = $upload_m_image['file_name'];
			$upload_m_image_path = $upload_m_image['full_path'];

			$values['m_image'] = $upload_m_image_name;
		}

		$result = $this->banner_model->modify_banner($values);

		if ($result)
		{
			$this->session->set_flashdata('HANDLE_ERROR_MESSAGE', '배너를 수정 하였습니다.');
			redirect('admin/banner/banner_modify/'.$area.'/'.$seq.'?area='.$return_area.'&page='.$return_page);
		}
		else
		{
			$this->session->set_flashdata('HANDLE_ERROR_MESSAGE', '배너 수정이 실패 하였습니다.');
			redirect('admin/banner/banner_modify/'.$area.'/'.$seq.'?area='.$return_area.'&page='.$return_page);
		}			
	}

	public function banner_order()
	{
		$list = $this->input->post('seq');

		if ( count($list) )
		{
			foreach ($list as $key => $seq) {
				$values = array(
					'seq' 			=> $seq,
					'area' 			=> $this->input->post('area')[$key],
					'banner_order'	=> $this->input->post('banner_order')[$key],
					'upd_datetime'	=> date('Y-m-d H:i:s', now()),
					'upd_ip'		=> $_SERVER['REMOTE_ADDR']
				);

				$result = $this->banner_model->modify_banner($values);
			}
		}

		$this->session->set_flashdata('HANDLE_ERROR_MESSAGE', '정렬 순서를 저장했습니다.');
		redirect('admin/banner');
	}

    public function banner_delete($area, $seq)
    {
		$return_area	= trim($this->input->get('area'));
		$return_page	= trim($this->input->get('page'));

		$condition = array(
			'area' => $area,
			'seq' => $seq
		);
		
		// 배너 리스트
		$banner 	= $this->banner_model->get_banner_list($condition);

        $values = array(
            'area'        	=> $area,
            'seq'        	=> $seq,
			'del_datetime'	=> date('Y-m-d H:i:s', now()),
			'del_ip'		=> $_SERVER['REMOTE_ADDR']
        );

        $result = $this->banner_model->delete_handle_banner($values);

        if ( $result )
        {

			if ($banner)
			{
				$banner = $banner[0];
		
				// 파일 업로드 디렉토리
				$upload_dir = dirname($_SERVER['SCRIPT_FILENAME']).'/static/upload/'.$this->config->item('HANDLE_MALL_CONFIG')->mall_id.'/banner/'.$area;

				$w_image = $upload_dir.'/'.$banner->w_image;

				if ( is_file($w_image) )
					unlink($w_image);

				$m_image = $upload_dir.'/'.$banner->m_image;

				if ( is_file($m_image) )
					unlink($m_image);
			}

            $this->session->set_flashdata('SESSION_MESSAGE', '삭제 되었습니다.');
            redirect('/admin/banner?area='.$return_area.'&page='.$return_page);
        }
        else
            redirect('/admin/banner?area='.$return_area.'&page='.$return_page);
    }
}