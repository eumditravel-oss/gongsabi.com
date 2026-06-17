<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @brief 사업분야
 */
class Business extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        if ( !$this->session->userdata('ADMIN_SESSION') )
			redirect('/admin/auth');
	}

	public function common_list($target)
	{
		$data['parent'] = 'business';
		$data['target'] = $target;
		$data['depth1'] = '사업분야';

		switch ($target) {
			case 'license':
				$data['depth2'] = '보유면허';
				$url 			= 'list';
				break;
			case 'engineer':
				$data['depth2'] = '기술자보유현황';
				$url 			= 'list_engineer';
				break;
			case 'building':
				$data['depth2'] = '건축분야';
				$url 			= 'list';
				break;
			case 'house':
				$data['depth2'] = '주택분야';
				$url 			= 'list';
				break;
		}

		$page 				= trim($this->input->get('page'));
		$keyword 			= trim($this->input->get('keyword'));

		$condition = array(
			'target' 	=> $target,
			'use_yn'	=> '1',
			'page'	 	=> $page,
			'limit'		=> 10,
			'keyword'	=> $keyword
		);

		$data['condition']  = $condition;

		$data['list']		= $this->business_model->get_businesss($condition);
		$_count 			= $this->business_model->get_businesss_count($condition);
		$data['count']		= $_count[0]->cnt;

		$config['base_url'] 			= '/admin/business/list/'.$target.'?keyword='.$keyword;
		$config['total_rows'] 			= $data['count'];
		$config['per_page'] 			= 10; 
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

		$this->load->view('admin/_common/header', $data);
		$this->load->view('admin/common/'.$url);
		$this->load->view('admin/_common/footer');
	}

	public function common_regist($target)
	{
		$data['parent'] = 'business';
		$data['target'] = $target;
		$data['depth1'] = '사업분야';

		switch ($target) {
			case 'license':
				$data['depth2'] = '보유면허';
				$data['is_attach'] 	= false;
				$url = 'regist';
				break;
			case 'engineer':
				$data['depth2'] = '기술자보유현황';
				$data['is_attach'] 	= false;
				$url = 'regist_engineer';
				break;
			case 'building':
				$data['depth2'] = '건축분야';
				$data['is_attach'] 	= false;
				$url = 'regist';
				break;
			case 'house':
				$data['depth2'] = '주택분야';
				$data['is_attach'] 	= false;
				$url = 'regist';
				break;
		}

		$this->load->view('admin/_common/header', $data);
		$this->load->view('admin/common/'.$url);
		$this->load->view('admin/_common/footer');
	}

	/**
	 * @brief 게시판 등록 처리
	 */
	public function business_regist_proc()
	{
		$this->load->helper('form');

		$target		= trim($this->input->post('target'));
		$title		= trim($this->input->post('title'));
		$content	= trim($this->input->post('content'));
		$name		= trim($this->input->post('name'));
		$in_day		= trim($this->input->post('in_day'));
		$license	= trim($this->input->post('license'));
		$memo		= trim($this->input->post('memo'));

		switch ($target) {
			case 'license':
				$url = 'regist';
				break;
			case 'engineer':
				$url = 'regist_engineer';
				break;
			case 'building':
				$url = 'regist';
				break;
			case 'house':
				$url = 'regist';
				break;
		}

		$values = array(
			'target'		=> $target,
			'title'			=> $title,
			'content'		=> $content,
			'name'			=> $name,
			'in_day'		=> $in_day,
			'license'		=> $license,
			'memo'			=> $memo,
			'ins_datetime'	=> date('Y-m-d H:i:s', now())
		);

		$upload_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/business';

		if ( !is_dir($upload_path) ) {
			@mkdir($upload_path, 0777, TRUE);
		}

		$upload_thumb_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/business/thumb';

		if ( !is_dir($upload_thumb_path) ) {
			@mkdir($upload_thumb_path, 0777, TRUE);
		}

		$config['upload_path'] 		= $upload_path;
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|xls|xlsx|hwp|txt|ppt|pptx';
		$config['max_size']			= '0';
		$config['max_width']  		= '0';
		$config['max_height']  		= '0';
		$config['encrypt_name']  	= true;

		$return = array();

		$this->load->library('upload', $config);
	
		if ( $this->upload->do_upload('image') )
		{
			$data = $this->upload->data('image');
			$values['thumb'] = $data['file_name'];
			$values['image'] = $data['file_name'];

			make_cropimage($upload_path.'/'.$data['file_name'], $upload_thumb_path.'/'.$data['file_name']);
		}
	
		if ( $this->upload->do_upload('attach1') )
		{
			$data = $this->upload->data('attach1');
			$values['attach1'] = $data['file_name'];
		}
	
		if ( $this->upload->do_upload('attach2') )
		{
			$data = $this->upload->data('attach2');
			$values['attach2'] = $data['file_name'];
		}
	
		if ( $this->upload->do_upload('attach3') )
		{
			$data = $this->upload->data('attach3');
			$values['attach3'] = $data['file_name'];
		}

		$result = $this->business_model->regist_business($values);

		if ($result)
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '등록 하였습니다.');
			redirect('/admin/business/list/'.$target);
		}
		else
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '등록 실패 하였습니다.');
			redirect('/admin/business/'.$url.'/'.$target);
		}
	}

	/**
	 * @brief 보유 면허 등록 처리
	 */
	public function license_regist_proc()
	{
		$this->load->helper('form');

		$upload_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/business';

		if ( !is_dir($upload_path) ) {
			@mkdir($upload_path, 0777, TRUE);
		}

		$upload_thumb_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/business/thumb';

		if ( !is_dir($upload_thumb_path) ) {
			@mkdir($upload_thumb_path, 0777, TRUE);
		}

		$config['upload_path'] 		= $upload_path;
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '0';
		$config['max_width']  		= '0';
		$config['max_height']  		= '0';
		$config['encrypt_name']  	= true;

		$return = array();

		// 요청변수
		$title 		= $this->input->post('title');
		$content 	= $this->input->post('content');

		$values = array(
			'target'		=> 'license',
			'title'			=> $title,
			'content' 		=> $content,
			'ins_datetime'	=> date('Y-m-d H:i:s', now())
		);

		$this->load->library('upload', $config);
	
		if ( $this->upload->do_upload('image') )
		{
			$data = $this->upload->data();
			$values['thumb'] = $data['file_name'];
			$values['image'] = $data['file_name'];

			make_cropimage($upload_path.'/'.$data['file_name'], $upload_thumb_path.'/'.$data['file_name']);
		}

		$result = $this->business_model->regist_business($values);

		if ($result)
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '등록 하였습니다.');
			redirect('/admin/business/list/'.$target);
		}
		else
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '등록 실패 하였습니다.');
			redirect('/admin/business/regist/'.$target);
		}
	}

	/**
	 * @brief 기술자보유현황 등록 처리
	 */
	public function engineer_regist_proc()
	{
		$this->load->helper('form');

		$upload_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/business';

		if ( !is_dir($upload_path) ) {
			@mkdir($upload_path, 0777, TRUE);
		}

		$upload_thumb_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/business/thumb';

		if ( !is_dir($upload_thumb_path) ) {
			@mkdir($upload_thumb_path, 0777, TRUE);
		}

		$config['upload_path'] 		= $upload_path;
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '0';
		$config['max_width']  		= '0';
		$config['max_height']  		= '0';
		$config['encrypt_name']  	= true;

		$return = array();

		// 요청변수
		$title 		= $this->input->post('title');
		$content 	= $this->input->post('content');

		$values = array(
			'target'		=> 'engineer',
			'title'			=> $title,
			'content' 		=> $content,
			'ins_datetime'	=> date('Y-m-d H:i:s', now())
		);

		$this->load->library('upload', $config);
	
		if ( $this->upload->do_upload('image') )
		{
			$data = $this->upload->data();
			$values['thumb'] = $data['file_name'];
			$values['image'] = $data['file_name'];

			make_cropimage($upload_path.'/'.$data['file_name'], $upload_thumb_path.'/'.$data['file_name']);
		}

		$result = $this->business_model->regist_business($values);

		if ($result)
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '등록 하였습니다.');
			redirect('/admin/business/list/'.$target);
		}
		else
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '등록 실패 하였습니다.');
			redirect('/admin/business/regist/'.$target);
		}
	}

	/**
	 * @brief 건축분야 등록 처리
	 */
	public function building_regist_proc()
	{
		$this->load->helper('form');

		$upload_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/business';

		if ( !is_dir($upload_path) ) {
			@mkdir($upload_path, 0777, TRUE);
		}

		$upload_thumb_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/business/thumb';

		if ( !is_dir($upload_thumb_path) ) {
			@mkdir($upload_thumb_path, 0777, TRUE);
		}

		$config['upload_path'] 		= $upload_path;
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '0';
		$config['max_width']  		= '0';
		$config['max_height']  		= '0';
		$config['encrypt_name']  	= true;

		$return = array();

		// 요청변수
		$title 		= $this->input->post('title');
		$content 	= $this->input->post('content');

		$values = array(
			'target'		=> 'building',
			'title'			=> $title,
			'content' 		=> $content,
			'ins_datetime'	=> date('Y-m-d H:i:s', now())
		);

		$this->load->library('upload', $config);
	
		if ( $this->upload->do_upload('image') )
		{
			$data = $this->upload->data();
			$values['thumb'] = $data['file_name'];
			$values['image'] = $data['file_name'];

			make_cropimage($upload_path.'/'.$data['file_name'], $upload_thumb_path.'/'.$data['file_name']);
		}

		$result = $this->business_model->regist_business($values);

		if ($result)
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '등록 하였습니다.');
			redirect('/admin/business/list/'.$target);
		}
		else
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '등록 실패 하였습니다.');
			redirect('/admin/business/regist/'.$target);
		}
	}

	/**
	 * @brief 주택분야 등록 처리
	 */
	public function house_regist_proc()
	{
		$this->load->helper('form');

		$upload_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/business';

		if ( !is_dir($upload_path) ) {
			@mkdir($upload_path, 0777, TRUE);
		}

		$upload_thumb_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/business/thumb';

		if ( !is_dir($upload_thumb_path) ) {
			@mkdir($upload_thumb_path, 0777, TRUE);
		}

		$config['upload_path'] 		= $upload_path;
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '0';
		$config['max_width']  		= '0';
		$config['max_height']  		= '0';
		$config['encrypt_name']  	= true;

		$return = array();

		// 요청변수
		$title 		= $this->input->post('title');
		$content 	= $this->input->post('content');

		$values = array(
			'target'		=> 'house',
			'title'			=> $title,
			'content' 		=> $content,
			'ins_datetime'	=> date('Y-m-d H:i:s', now())
		);

		$this->load->library('upload', $config);
	
		if ( $this->upload->do_upload('image') )
		{
			$data = $this->upload->data();
			$values['thumb'] = $data['file_name'];
			$values['image'] = $data['file_name'];

			make_cropimage($upload_path.'/'.$data['file_name'], $upload_thumb_path.'/'.$data['file_name']);
		}

		$result = $this->business_model->regist_business($values);

		if ($result)
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '등록 하였습니다.');
			redirect('/admin/business/list/'.$target);
		}
		else
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '등록 실패 하였습니다.');
			redirect('/admin/business/regist/'.$target);
		}
	}

	public function common_modify($target, $seq)
	{
		$data['parent'] = 'business';
		$data['target'] = $target;
		$data['depth1'] = '사업분야';

		switch ($target) {
			case 'license':
				$data['depth2'] = '보유면허';
				$data['is_attach'] 	= false;
				$url = 'modify';
				break;
			case 'engineer':
				$data['depth2'] = '기술자보유현황';
				$data['is_attach'] 	= false;
				$url = 'modify_engineer';
				break;
			case 'building':
				$data['depth2'] = '건축분야';
				$data['is_attach'] 	= false;
				$url = 'modify';
				break;
			case 'house':
				$data['depth2'] = '주택분야';
				$data['is_attach'] 	= false;
				$url = 'modify';
				break;
		}

		$condition = array(
			'target' 	=> $target,
			'seq'		=> $seq
		);

		$_info = $this->business_model->get_business($condition);
		$data['info'] = $_info[0];

		$this->load->view('admin/_common/header', $data);
		$this->load->view('admin/common/'.$url);
		$this->load->view('admin/_common/footer');
	}

	/**
	 * @brief 게시판 수정 처리
	 */
	public function business_modify_proc()
	{
		$seq		= trim($this->input->post('seq'));
		$target		= trim($this->input->post('target'));
		$title		= trim($this->input->post('title'));
		$content	= trim($this->input->post('content'));
		$name		= trim($this->input->post('name'));
		$in_day		= trim($this->input->post('in_day'));
		$license	= trim($this->input->post('license'));
		$memo		= trim($this->input->post('memo'));

		switch ($target) {
			case 'license':
				$url = 'modify';
				break;
			case 'engineer':
				$url = 'modify_engineer';
				break;
			case 'building':
				$url = 'modify';
				break;
			case 'house':
				$url = 'modify';
				break;
		}

		$values = array(
			'seq'			=> $seq,
			'target'		=> $target,
			'title'			=> $title,
			'content'		=> $content,
			'name'			=> $name,
			'in_day'		=> $in_day,
			'license'		=> $license,
			'memo'			=> $memo,
			'upd_datetime'	=> date('Y-m-d H:i:s', now())
		);

		$upload_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/business';

		if ( !is_dir($upload_path) ) {
			@mkdir($upload_path, 0777, TRUE);
		}

		$upload_thumb_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/business/thumb';

		if ( !is_dir($upload_thumb_path) ) {
			@mkdir($upload_thumb_path, 0777, TRUE);
		}

		$config['upload_path'] 		= $upload_path;
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|xls|xlsx|hwp|txt|ppt|pptx';
		$config['max_size']			= '0';
		$config['max_width']  		= '0';
		$config['max_height']  		= '0';
		$config['encrypt_name']  	= true;

		$return = array();

		$this->load->library('upload', $config);
	
		if ( $this->upload->do_upload('image') )
		{
			$data = $this->upload->data('image');
			$values['thumb'] = $data['file_name'];
			$values['image'] = $data['file_name'];

			make_cropimage($upload_path.'/'.$data['file_name'], $upload_thumb_path.'/'.$data['file_name']);
		}
	
		if ( $this->upload->do_upload('attach1') )
		{
			$data = $this->upload->data('attach1');
			$values['attach1'] = $data['file_name'];
		}
	
		if ( $this->upload->do_upload('attach2') )
		{
			$data = $this->upload->data('attach2');
			$values['attach2'] = $data['file_name'];
		}
	
		if ( $this->upload->do_upload('attach3') )
		{
			$data = $this->upload->data('attach3');
			$values['attach3'] = $data['file_name'];
		}

		$result = $this->business_model->modify_business($values);

		if ($result)
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '수정 하였습니다.');
			redirect('/admin/business/'.$url.'/'.$target.'/'.$seq);
		}
		else
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '수정 실패 하였습니다.');
			redirect('/admin/business/'.$url.'/'.$target.'/'.$seq);
		}
	}

	/**
	 * @brief 게시판 수정 처리
	 */
	public function common_delete_proc($target, $seq)
	{
		$values = array(
			'seq'			=> $seq,
			'target'		=> $target,
			'use_yn'		=> '0',
			'upd_datetime'	=> date('Y-m-d H:i:s', now())
		);

		$result = $this->business_model->modify_business($values);

		if ($result)
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '삭제 하였습니다.');
			redirect('/admin/business/list/'.$target.'/'.$seq);
		}
		else
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '삭제 실패 하였습니다.');
			redirect('/admin/business/modify/'.$target.'/'.$seq);
		}
	}

	/**
	 * @brief 고객센터
	 */
	public function business_image_proc()
	{
		$this->load->helper('form');

		$upload_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/business';

		if ( !is_dir($upload_path) ) {
			@mkdir($upload_path, 0777, TRUE);
		}

		$config['upload_path'] 		= $upload_path;
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '0';
		$config['max_width']  		= '0';
		$config['max_height']  		= '0';
		$config['encrypt_name']  	= true;

		$return = array();

		$this->load->library('upload', $config);
	
		if ( $this->upload->do_upload('image') )
		{
			$data = $this->upload->data();
			$return['success'] 	= true;
			$return['save_url'] = '/upload/business/'.$data['file_name'];
		}
		else
		{
			$return['success'] 	= false;
		}

		echo json_encode($return);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */