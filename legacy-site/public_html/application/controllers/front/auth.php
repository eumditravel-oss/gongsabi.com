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
        if ( !$this->session->userdata('MEMBER_SESSION') )
        	$this->login();
        else
        	redirect('/');
	}

	// 회원 아이디 중복 체크
	public function ajax_check_member_id()
	{
		$member_id = $this->input->post('member_id');

		$check = array(
			'member_id' => $member_id
		);

		$count = $this->member_model->get_member_count($check);
		$count = $count[0]->cnt;

		if ( 
			$member_id == 'admin' ||
			$member_id == 'admin@gongsabi.com' || 
			$member_id == 'webmaster' || 
			$member_id == 'webmaster@gongsabi.com' || 
			$count > 0
		) { 
			$result = false;
			$resultMessage = '사용 불가능한 아이디 입니다.';
		} else {
			$result = true;
			$resultMessage = '';
		}

		return_json(array(
			'result' => $result,
			'resultMessage' => $resultMessage
		));
	}

	// 로그인
	public function login()
	{
        if ( !$this->session->userdata('MEMBER_SESSION') ) {
			$data = array();

	        $data['name'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['login']['name'];
	        $data['id'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['login']['id'];

			$this->load->view('front/_common/new_header', $data);
        	$this->load->view('front/_common/sub_header_single', $data);
			$this->load->view('front/auth/login', $data);
			$this->load->view('front/_common/new_footer', $data);
        }
        else {
        	redirect('/');
        }
	}

	// 로그인 처리
	public function login_proc($target = false)
	{
		// 사용자 이메일주소(아이디)
		$member_id		= trim($this->input->post('member_id'));
		// 사용자 비밀번호
		$member_password 	= trim($this->input->post('member_password'));

		// 사용자 이메일주소(아이디) 없음
		if ( $member_id == '' ) {
			$this->session->set_flashdata('SESSION_MESSAGE', '사용자 이메일주소(아이디)를 입력해 주십시오.');
			redirect('/front/auth/login');
		}

		// 비밀번호 입력 없음
		if ( $member_password == '' ) {
			$this->session->set_flashdata('SESSION_MESSAGE', '비밀번호를 입력해 주십시오.');
			redirect('/front/auth/login');
		}

		$condition = array(
			'member_id' 	=> $member_id
		);

		// 사용자 정보 가져오기
		$member_list = $this->member_model->get_member_list($condition);

		// 사용자 정보가 있다면
		if ( count($member_list) > 0 )
		{
			$member = $member_list[0];

			if ( $member->member_use == '9' )
			{
				$this->session->set_flashdata('SESSION_MESSAGE', '탈퇴한 회원 입니다.');
				redirect('/');
			}
			else if ( password_verify($member_password, $member->member_password) )
			{
				$_member = array(
					'member_id'		=> $member->member_id,
					'member_type'	=> $member->member_type,
					'member_name'	=> $member->member_name,
					'member_company'=> $member->member_company,
					'member_phone'	=> $member->member_phone,
					'member_hp'		=> $member->member_hp,
					'member_email'	=> $member->member_email
				);

				$this->session->set_userdata('MEMBER_SESSION', TRUE);
				$this->session->set_userdata('MEMBER', $_member);

				// $this->session->set_flashdata('SESSION_MESSAGE', $member->member_name.'님 로그인 되었습니다.');
				// 유료회원 전환하기 링크로 로그인 시
				if ( $target == 'exchange' )
					redirect('/front/mypage/info/info2');
				else
					redirect('/');
			}
			else
			{
				$this->session->set_flashdata('SESSION_MESSAGE', '비밀번호가 잘못되었습니다.');
				redirect('/front/auth/login');
			}
		}
		// 사용자 정보가 없다면
		else
		{
			$this->session->set_flashdata('SESSION_MESSAGE', '해당 정보의 사용자가 없습니다.');
			redirect('/front/auth/login');
		}
	}

	// 회원가입
	public function regist()
	{
        if ( !$this->session->userdata('MEMBER_SESSION') ) {
			$data = array();

	        $data['name'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['regist']['name'];
	        $data['id'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['regist']['id'];

			$this->load->view('front/_common/new_header');
        	$this->load->view('front/_common/sub_header_single', $data);
			$this->load->view('front/auth/regist', $data);
			$this->load->view('front/_common/new_footer');
        }
        else {
        	redirect('/');
        }
	}

	// 회원가입 - 약관동의
	public function regist_agree($member_type)
	{
        if ( !$this->session->userdata('MEMBER_SESSION') ) {
			$data = array(
				'member_type' => $member_type
			);

	        $data['name'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['regist']['name'];
	        $data['id'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['regist']['id'];

			$this->load->view('front/_common/new_header');
        	$this->load->view('front/_common/sub_header_single', $data);
			$this->load->view('front/auth/regist_agree', $data);
			$this->load->view('front/_common/new_footer');
        }
        else {
        	redirect('/');
        }		
	}

	// 회원가입
	public function regist_form()
	{
        if ( !$this->session->userdata('MEMBER_SESSION') ) {
			$data = array();

	        $data['name'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['regist']['name'];
	        $data['id'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['regist']['id'];

			$member_type = $this->input->post('member_type');
			$agree1 = $this->input->post('agree1');
			$agree2 = $this->input->post('agree2');
			$agree3 = $this->input->post('agree3');
			$agree4 = $this->input->post('agree4');
			$agree5 = $this->input->post('agree5');

			if ( $member_type == '' )
			{
				$this->session->set_flashdata('SESSION_MESSAGE', '회원 유형을 선택해 주십시오.');
				redirect('/front/auth/regist');				
			}
			else if ( $agree1 != 'Y' || $agree2 != 'Y' )
			{
				$this->session->set_flashdata('SESSION_MESSAGE', '필수 약관에 동의해 주십시오.');
				redirect('/front/auth/regist_agree/'.$member_type);
			}
			else
			{
				$data['member_type'] = $member_type;
				$data['agree1'] = $agree1;
				$data['agree2'] = $agree2;
				$data['agree3'] = $agree3;
				$data['agree4'] = $agree4;
				$data['agree5'] = $agree5;

				$this->load->view('front/_common/new_header');
        		$this->load->view('front/_common/sub_header_single', $data);
				$this->load->view('front/auth/regist_form', $data);
				$this->load->view('front/_common/new_footer');
			}
        }
        else {
        	redirect('/');
        }
	}

	// 회원가입 처리
	public function regist_proc()
	{
		// 사용자 타입
		$member_type 		= trim($this->input->post('member_type'));
		// 사용자 이름
		$member_name 		= trim($this->input->post('member_name'));
		// 사용자 이메일주소(아이디)
		$member_id			= trim($this->input->post('member_id'));
		// 사용자 비밀번호
		$member_password 	= trim($this->input->post('member_password'));
		// 사용자 비밀번호 확인
		$member_password_re = trim($this->input->post('member_password_re'));
		// 사용자 휴대폰번호
		$member_hp 			= trim($this->input->post('member_hp'));
		// 사용자 전화번호
		$member_phone 		= trim($this->input->post('member_phone'));
		// 사용자 회사
		$member_company 	= trim($this->input->post('member_company'));
		// 사용자 직책
		$member_position 	= trim($this->input->post('member_position'));

		$agree1 	= trim($this->input->post('agree1'));
		$agree2 	= trim($this->input->post('agree2'));
		$agree3 	= trim($this->input->post('agree3'));
		$agree4 	= trim($this->input->post('agree4'));
		$agree5 	= trim($this->input->post('agree5'));

		// 사용자 이메일주소(아이디) 없음
		if ( $member_id == '' ) {
			$this->session->set_flashdata('SESSION_MESSAGE', '사용자 이메일주소(아이디)를 입력해 주십시오.');
			redirect('/front/auth/login');
		}

		// 비밀번호 입력 없음
		if ( $member_password == '' ) {
			$this->session->set_flashdata('SESSION_MESSAGE', '비밀번호를 입력해 주십시오.');
			redirect('/front/auth/login');
		}

		// 비밀번호 입력 없음
		if ( $member_password != $member_password_re ) {
			$this->session->set_flashdata('SESSION_MESSAGE', '비밀번호를 확인해 주십시오.');
			redirect('/front/auth/login');
		}

		// 휴대폰번호 입력 없음
		if ( $member_hp == '' ) {
			$this->session->set_flashdata('SESSION_MESSAGE', '휴대폰번호를 입력해 주십시오.');
			redirect('/front/auth/login');
		}

		$check = array(
			'member_id' => $member_id
		);

		$count = $this->member_model->get_member_count($check);
		$count = $count[0]->cnt;

		if ( $count > 0 )
		{
			$this->session->set_flashdata('SESSION_MESSAGE', '이미 등록된 사용자 입니다.');
			redirect('/front/auth/login');
		}
		else
		{
			$regist = array(
				'member_id' => $member_id,
				'member_type' => $member_type,
				'member_name' => $member_name,
				'member_password' => password_hash($member_password, PASSWORD_BCRYPT),
				'member_password_original' => $member_password,
				'member_email' => $member_id,
				'member_hp' => $member_hp,
				'member_phone' => $member_phone,
				'member_company' => $member_company,
				'member_position' => $member_position,
				'member_agree1_yn' => $agree1,
				'member_agree2_yn' => $agree2,
				'member_agree3_yn' => $agree3,
				'member_agree4_yn' => $agree4,
				'member_agree5_yn' => $agree5,
			);

			$result = $this->member_model->regist_member($regist);

			if ( $result )
			{
				$_member = array(
					'member_id'			=> $member_id,
					'member_type'		=> $member_type,
					'member_name'		=> $member_name,
					'member_email' 		=> $member_id,
					'member_hp' 		=> $member_hp,
					'member_phone' 		=> $member_phone,
					'member_company' 	=> $member_company,
					'member_position' 	=> $member_position
				);

				$this->session->set_userdata('MEMBER_JOIN_SESSION', $_member);

				// 무료회원
				if ( $member_type == '1' )
				{
					$this->session->set_flashdata('SESSION_MESSAGE', '회원가입이 완료 되었습니다.');
					redirect('/front/auth/regist_complete');
				}
				// 유료회원은 가입 후 (유료회원 미승인 상태로) 결제 페이지로 이동
				else if ( $member_type == '2' )
				{
					$data['member_info'] = $_member;

					$this->load->view('front/_common/new_header');
					$this->load->view('front/auth/regist_pay', $data);
					$this->load->view('front/_common/new_footer');
				}
			}
			else
			{
				$this->session->set_flashdata('SESSION_MESSAGE', '회원가입에 실패 하였습니다.');
				redirect('/front/auth/login');
			}
		}
	}

	private function _pay()
	{
		$data = array();

		$this->load->view('front/_common/new_header');
		$this->load->view('front/auth/regist_pay', $data);
		$this->load->view('front/_common/new_footer');		
	}

	// 회원가입 - 유료회원 결제 완료
	public function regist_pay_proc()
	{
		$member_type 	= $this->input->post('member_type');
		$member_id 		= $this->input->post('member_id');

        $imp_uid        = $this->input->post('imp_uid');
        $merchant_uid   = $this->input->post('merchant_uid');
        $pay_method     = $this->input->post('pay_method');
        $paid_amount    = $this->input->post('paid_amount');
        $status         = $this->input->post('status');
        $apply_num      = $this->input->post('apply_num');
        $vbank_num      = $this->input->post('vbank_num');
        $vbank_name     = $this->input->post('vbank_name');
        $vbank_holder   = $this->input->post('vbank_holder');
        $vbank_date     = $this->input->post('vbank_date');

        $bank_list     			= $this->input->post('bank_list');
        $bank_account     		= $this->input->post('bank_account');
        $bank_account_name     	= $this->input->post('bank_account_name');
        $bank_date     			= $this->input->post('bank_date');
        $refund_list     		= $this->input->post('refund_list');
        $refund_account     	= $this->input->post('refund_account');
        $refund_account_name	= $this->input->post('refund_account_name');

        $pay_values = array(
            'member_id'     		=> $member_id,
            'imp_uid'       		=> $imp_uid,
            'merchant_uid'  		=> $merchant_uid,
            'pay_method'    		=> $pay_method,
            'paid_amount'   		=> $paid_amount,
            'status'        		=> $status,
            'apply_num'     		=> $apply_num,
            'vbank_num'     		=> $vbank_num,
            'vbank_name'    		=> $vbank_name,
            'vbank_holder'  		=> $vbank_holder,
            'vbank_date'    		=> $vbank_date,
            'bank_list'    			=> $bank_list,
            'bank_account'    		=> $bank_account,
            'bank_account_name'    	=> $bank_account_name,
            'bank_date'    			=> $bank_date,
            'refund_list'    		=> $refund_list,
            'refund_account'    	=> $refund_account,
            'refund_account_name'	=> $refund_account_name,
            'ins_user'      		=> $this->session->userdata('MEMBER')['member_id'],
            'ins_datetime'  		=> date('Y-m-d H:i:s')
        );

        $pay_result = $this->pay_model->regist_member_pay($pay_values);

        if ( $pay_result )
        {
        	if ( $status == 'paid' )
        	{
	    		$modify = array(
					'member_id' 		=> $member_id,
	    			'member_type' 		=> '2',
	    			'member_start'		=> date('Y-m-d H:i:s', time()),
	    			'member_limit'		=> date('Y-m-d 23:23:59', strtotime('+12 month', time())),
					'upd_datetime' 		=> date('Y-m-d H:i:s', time()),
	    			'upd_ip'        	=> $_SERVER['REMOTE_ADDR']
	    		);

				$result = $this->member_model->modify_member($modify);

				$this->session->set_userdata('MEMBER_PAY_SESSION', true);
			}
			else
			{
				$this->session->set_userdata('MEMBER_PAY_SESSION', false);
			}

        	redirect('/front/auth/regist_complete');
        }
        else
        {
			$this->session->set_userdata('MEMBER_PAY_SESSION', false);
			$this->session->set_flashdata('SESSION_MESSAGE', '결제가 실패 하였습니다. 로그인 후 재결제 부탁 드립니다.');
        	redirect('/front/auth/regist_complete');
        }

	}

	// 회원가입 완료
	public function regist_complete()
	{
        if ( $this->session->userdata('MEMBER_JOIN_SESSION') ) {
			$data = array();

	        $data['name'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['regist']['name'];
	        $data['id'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['regist']['id'];

			$this->load->view('front/_common/new_header');
        	$this->load->view('front/_common/sub_header_single', $data);
			$this->load->view('front/auth/regist_complete', $data);
			$this->load->view('front/_common/new_footer');
        }
        else {
        	redirect('/');
        }
	}

	// 로그아웃
	public function logout()
	{
		$this->session->sess_destroy();

		redirect('/');
	}

	public function reset($seq = false)
	{
		$values = array();

		$password = '1234';

		// 변경 비밀번호 암호화
		$member_password						= password_hash($password, PASSWORD_BCRYPT);
		$member_password_original				= $password;

		$values['member_seq'] 				= $seq;
		$values['member_password'] 			= $member_password;
		$values['member_password_original'] 	= $member_password_original;
		$values['upd_datetime'] 					= date('Y-m-d H:i:s', now());
		$values['upd_ip'] 							= $_SERVER['REMOTE_ADDR'];

		$result = $this->member_model->modify_handle_member($values);
	}

	public function find()
	{
		$data = array();

        $data['name'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['find']['name'];
        $data['id'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['find']['id'];

		$this->load->view('front/_common/new_header', $data);
        $this->load->view('front/_common/sub_header_single', $data);
		$this->load->view('front/auth/find', $data);
		$this->load->view('front/_common/new_footer', $data);
	}

	public function find_proc()
	{
		// 사용자 타입
		$find_type 	= trim($this->input->post('find_type'));
		// 사용자 휴대폰번호
		$member_hp 	= trim($this->input->post('member_hp'));

		if ( $member_hp == '' )
		{
			$this->session->set_flashdata('SESSION_MESSAGE', '휴대폰번호를 입력해 주십시오.');
			redirect('/front/auth/find');				
			exit;
		}

		$check = array(
			'member_hp' => $member_hp
		);

		$count = $this->member_model->get_member_count($check);
		$count = $count[0]->cnt;

		if ( $count == 0 )
		{
			$this->session->set_flashdata('SESSION_MESSAGE', '입력하신 휴대폰번호로 가입된 회원이 없습니다.');
			redirect('/front/auth/find');
			exit;
		}
		else
		{
			$condition = array(
				'member_hp' 	=> $member_hp
			);

			// 사용자 정보 가져오기
			$member_list = $this->member_model->get_member_list($condition);
			$member = $member_list[0];

			$member_id = HP_ENC_TEXT($member->member_id);

			if ( $find_type == 'I' )
			{
				$msg = array(
			        'receiver' => $member_hp,
			        'msg' => '['.$this->config->item('site_name').'] 가입하신 아이디는 '.$member_id.' 입니다.'
			    );

			    $result = sendMessage($msg);

			    // if ( $result )
			    // {			    	
					$this->session->set_flashdata('SESSION_MESSAGE', '입력하신 휴대폰번호로 아이디를 전송하였습니다.');
					redirect('/front/auth/find');
					exit;
			    // }
			}
			else if ( $find_type == 'P' )
			{
				// 사용자 이메일주소(아이디)
				$member_id	= trim($this->input->post('member_id'));

				if ( $member_id == $member->member_id )
				{
					$password = GET_RANDOM_PASSWORD();

					// 변경 비밀번호 암호화
					$member_password						= password_hash($password, PASSWORD_BCRYPT);
					$member_password_original				= $password;

					$values['member_id'] 					= $member->member_id;
					$values['member_password'] 				= $member_password;
					$values['member_password_original'] 	= $member_password_original;

					$result = $this->member_model->modify_member($values);

					if ( $result )
					{
						$msg = array(
					        'receiver' => $member_hp,
					        'msg' => '['.$this->config->item('site_name').'] '.$password.' 로 비밀번호가 초기화 되었습니다.'
					    );

					    $result2 = sendMessage($msg);

					    // if ( $result2 )
					    // {			    	
							$this->session->set_flashdata('SESSION_MESSAGE', '입력하신 휴대폰번호로 초기화된 비밀번호를 전송하였습니다.');
							redirect('/front/auth/find');
							exit;
					    // }
					}
					else
					{    	
						$this->session->set_flashdata('SESSION_MESSAGE', '비밀번호 초기화에 실패 하였습니다.\n고객센터에 문의 바랍니다.');
						redirect('/front/auth/find');
						exit;
					}
				}
				else
				{		    	
					$this->session->set_flashdata('SESSION_MESSAGE', '입력하신 아이디로 가입된 회원이 없습니다.');
					redirect('/front/auth/find');
					exit;
				}
			}

		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */