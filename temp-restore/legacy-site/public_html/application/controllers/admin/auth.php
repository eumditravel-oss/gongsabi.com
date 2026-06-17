<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @brief 관리자 로그인
 */
class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
	}

	// 브랜드 리스트
	public function index()
	{
        if ( !$this->session->userdata('ADMIN_SESSION') )
        	$this->login();
        else
        	redirect('/admin/dashboard');
	}

	// 로그인
	public function login()
	{
        if ( !$this->session->userdata('ADMIN_SESSION') ) {
			$data = array();

			$this->load->view('admin/auth/login', $data);
        }
        else {
        	redirect('/admin/dashboard');
        }
	}

	// 로그인 처리
	public function login_proc()
	{
		// 사용자 이메일주소(아이디)
		$admin_member_id		= trim($this->input->post('admin_member_id'));
		// 사용자 비밀번호
		$admin_member_password 	= trim($this->input->post('admin_member_password'));

		// 사용자 이메일주소(아이디) 없음
		if ( $admin_member_id == '' ) {
			$this->session->set_flashdata('ERROR_MESSAGE', '사용자 이메일주소(아이디)를 입력해 주십시오.');
			redirect('/admin/auth/login');
		}

		// 비밀번호 입력 없음
		if ( $admin_member_password == '' ) {
			$this->session->set_flashdata('ERROR_MESSAGE', '비밀번호를 입력해 주십시오.');
			redirect('/admin/auth/login');
		}

		$condition = array(
			'admin_member_id' 	=> $admin_member_id
		);

		// 사용자 정보 가져오기
		$member_list = $this->admin_member_model->get_admin_member_list($condition);

		// 사용자 정보가 있다면
		if ( count($member_list) > 0 )
		{
			$member = $member_list[0];

			// 사용자 레벨이 9보다 낮다면 (9 : 일반관리자, 10 : 최고관리자)
			if ( $member->admin_member_level < 9 )
			{
				$this->session->set_flashdata('ERROR_MESSAGE', '관리자가 아닙니다.');
				redirect('/admin/auth/login');
			}
			else
			{
				if ( password_verify($admin_member_password, $member->admin_member_password) )
				{
					$_member = array(
						'admin_member_id'		=> $member->admin_member_id,
						'admin_member_level'	=> $member->admin_member_level,
						'admin_member_name'		=> $member->admin_member_name
					);

					$this->session->set_userdata('ADMIN_SESSION', TRUE);
					$this->session->set_userdata('ADMIN_MEMBER', $_member);

					$this->session->set_flashdata('ERROR_MESSAGE', $member->admin_member_name.'님 로그인 되었습니다.');
					redirect('/admin/dashboard');
				}
				else
				{
					$this->session->set_flashdata('ERROR_MESSAGE', '비밀번호가 잘못되었습니다.');
					redirect('/admin/auth/login');
				}
			}
		}
		// 사용자 정보가 없다면
		else
		{
			$this->session->set_flashdata('ERROR_MESSAGE', '해당 정보의 사용자가 없습니다.');
			redirect('/admin/auth/login');
		}
	}

	// 로그아웃
	public function logout()
	{
		$this->session->sess_destroy();

		redirect('/admin');
	}

	public function reset($seq = false)
	{
		$values = array();

		$password = '1234';

		// 변경 비밀번호 암호화
		$admin_member_password						= password_hash($password, PASSWORD_BCRYPT);
		$admin_member_password_original				= $password;

		$values['admin_member_seq'] 				= $seq;
		$values['admin_member_password'] 			= $admin_member_password;
		$values['admin_member_password_original'] 	= $admin_member_password_original;
		$values['upd_datetime'] 					= date('Y-m-d H:i:s', now());
		$values['upd_ip'] 							= $_SERVER['REMOTE_ADDR'];

		$result = $this->admin_member_model->modify_handle_admin_member($values);
	}

	public function lost()
	{

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */