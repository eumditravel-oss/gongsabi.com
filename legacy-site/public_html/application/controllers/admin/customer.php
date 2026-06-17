<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @brief 고객센터
 */
class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        if ( !$this->session->userdata('ADMIN_SESSION') )
			redirect('/admin/auth');
	}

	public function common_list($target)
	{
		$data['parent'] = 'customer';
		$data['target'] = $target;
		$data['depth1'] = '고객센터';

		switch ($target) {
			case 'notice':
				$data['depth2'] = '공지사항';
				break;
			case 'news':
				$data['depth2'] = '건설뉴스';
				break;
			case 'pds':
				$data['depth2'] = '자료실';
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

		$data['list']		= $this->customer_model->get_customers($condition);
		$_count 			= $this->customer_model->get_customers_count($condition);
		$data['count']		= $_count[0]->cnt;

		$config['base_url'] 			= '/admin/customer/list/'.$target.'?keyword='.$keyword;
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
		$this->load->view('admin/common/list');
		$this->load->view('admin/_common/footer');
	}

	public function common_regist($target)
	{
		$data['parent'] = 'customer';
		$data['target'] = $target;
		$data['depth1'] = '고객센터';

		switch ($target) {
			case 'notice':
				$data['depth2'] 	= '공지사항';
				$data['is_attach'] 	= false;
				break;
			case 'news':
				$data['depth2'] 	= '건설뉴스';
				$data['is_attach'] 	= false;
				break;
			case 'pds':
				$data['depth2'] 	= '자료실';
				$data['is_attach'] 	= true;
				break;
		}

		$this->load->view('admin/_common/header', $data);
		$this->load->view('admin/common/regist');
		$this->load->view('admin/_common/footer');
	}

	/**
	 * @brief 게시판 등록 처리
	 */
	public function customer_regist_proc()
	{
		$this->load->helper('form');

		$target		= trim($this->input->post('target'));
		$title		= trim($this->input->post('title'));
		$content	= trim($this->input->post('content'));

		$values = array(
			'target'		=> $target,
			'title'			=> $title,
			'content'		=> $content,
			'ins_datetime'	=> date('Y-m-d H:i:s', now())
		);

		$upload_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/customer';

		if ( !is_dir($upload_path) ) {
			@mkdir($upload_path, 0777, TRUE);
		}

		$upload_thumb_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/customer/thumb';

		if ( !is_dir($upload_thumb_path) ) {
			@mkdir($upload_thumb_path, 0777, TRUE);
		}

		$config['upload_path'] 		= $upload_path;
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|xls|xlsx|hwp|txt|ppt|pptx|doc|docx';
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
			$values['attach1_org'] = $data['orig_name'];
		}
	
		if ( $this->upload->do_upload('attach2') )
		{
			$data = $this->upload->data('attach2');
			$values['attach2'] = $data['file_name'];
			$values['attach2_org'] = $data['orig_name'];
		}
	
		if ( $this->upload->do_upload('attach3') )
		{
			$data = $this->upload->data('attach3');
			$values['attach3'] = $data['file_name'];
			$values['attach3_org'] = $data['orig_name'];
		}

		$result = $this->customer_model->regist_customer($values);

		if ($result)
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '등록 하였습니다.');
			redirect('/admin/customer/list/'.$target);
		}
		else
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '등록 실패 하였습니다.');
			redirect('/admin/customer/regist/'.$target);
		}
	}

	public function common_modify($target, $seq)
	{
		$data['parent'] = 'customer';
		$data['target'] = $target;
		$data['depth1'] = '고객센터';

		switch ($target) {
			case 'notice':
				$data['depth2'] 	= '공지사항';
				$data['is_attach'] 	= false;
				break;
			case 'news':
				$data['depth2'] 	= '건설뉴스';
				$data['is_attach'] 	= false;
				break;
			case 'pds':
				$data['depth2'] 	= '자료실';
				$data['is_attach'] 	= true;
				break;
		}

		$condition = array(
			'target' 	=> $target,
			'seq'		=> $seq
		);

		$_info = $this->customer_model->get_customer($condition);
		$data['info'] = $_info[0];

		$this->load->view('admin/_common/header', $data);
		$this->load->view('admin/common/modify');
		$this->load->view('admin/_common/footer');
	}

	/**
	 * @brief 게시판 수정 처리
	 */
	public function customer_modify_proc()
	{
		$seq		= trim($this->input->post('seq'));
		$target		= trim($this->input->post('target'));
		$title		= trim($this->input->post('title'));
		$content	= trim($this->input->post('content'));

		$attach1_delete	= trim($this->input->post('attach1_delete'));
		$attach2_delete	= trim($this->input->post('attach2_delete'));
		$attach3_delete	= trim($this->input->post('attach3_delete'));

		$values = array(
			'seq'			=> $seq,
			'target'		=> $target,
			'title'			=> $title,
			'content'		=> $content,
			'upd_datetime'	=> date('Y-m-d H:i:s', now())
		);

		$upload_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/customer';

		if ( !is_dir($upload_path) ) {
			@mkdir($upload_path, 0777, TRUE);
		}

		$upload_thumb_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/customer/thumb';

		if ( !is_dir($upload_thumb_path) ) {
			@mkdir($upload_thumb_path, 0777, TRUE);
		}

		$config['upload_path'] 		= $upload_path;
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|xls|xlsx|hwp|txt|ppt|pptx|doc|docx';
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

		if ($attach1_delete && isset($attach1_delete))
		{
			$values['attach1'] = '';
			$values['attach1_org'] = '';
		}
		else
		{
			if ( $this->upload->do_upload('attach1') )
			{
				$data = $this->upload->data('attach1');
				$values['attach1'] = $data['file_name'];
				$values['attach1_org'] = $data['orig_name'];
			}
		}

		if ($attach2_delete && isset($attach2_delete))
		{
			$values['attach2'] = '';
			$values['attach2_org'] = '';
		}
		else
		{
			if ( $this->upload->do_upload('attach2') )
			{
				$data = $this->upload->data('attach2');
				$values['attach2'] = $data['file_name'];
				$values['attach2_org'] = $data['orig_name'];
			}
		}

		if ($attach3_delete && isset($attach3_delete))
		{
			$values['attach3'] = '';
			$values['attach3_org'] = '';
		}
		else
		{
			if ( $this->upload->do_upload('attach3') )
			{
				$data = $this->upload->data('attach3');
				$values['attach3'] = $data['file_name'];
				$values['attach3_org'] = $data['orig_name'];
			}
		}

		$result = $this->customer_model->modify_customer($values);

		if ($result)
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '수정 하였습니다.');
			redirect('/admin/customer/modify/'.$target.'/'.$seq);
		}
		else
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '수정 실패 하였습니다.');
			redirect('/admin/customer/modify/'.$target.'/'.$seq);
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

		$result = $this->customer_model->modify_customer($values);

		if ($result)
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '삭제 하였습니다.');
			redirect('/admin/customer/list/'.$target.'/'.$seq);
		}
		else
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '삭제 실패 하였습니다.');
			redirect('/admin/customer/modify/'.$target.'/'.$seq);
		}
	}

	/**
	 * @brief 고객센터
	 */
	public function customer_image_proc()
	{
		$this->load->helper('form');

		$upload_path = dirname($_SERVER['SCRIPT_FILENAME']).'/upload/customer';

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
			$return['save_url'] = '/upload/customer/'.$data['file_name'];
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