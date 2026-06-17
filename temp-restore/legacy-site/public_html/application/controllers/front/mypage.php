<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @brief 마이페이지
 */
class Mypage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	

        if ( !$this->session->userdata('MEMBER_SESSION') )
        	redirect('/front/auth');
	}

	public function index()
	{
		redirect('/front/mypage/info');

		$data = array();

        $banner_list = $this->banner_model->get_banner_list(array(
            'use_random' => true,
            'limit' => 1,
            'area' => 'mypage'
        ));
        $data['banner_list'] = $banner_list;

		$this->load->view('front/_common/new_header', $data);
		$this->load->view('front/mypage/main', $data);
		$this->load->view('front/_common/new_footer', $data);
	}

	// 회원정보수정
	public function info($child = 'info1')
	{
		$data = array();

		$condition = array(
			'member_id' => $this->session->userdata('MEMBER')['member_id']
		);

		// 사용자 정보 가져오기
		$member_list = $this->member_model->get_member_list($condition);

		// 사용자 정보가 있다면
		if ( count($member_list) > 0 )
		{
			$member = $member_list[0];

			$data['member'] = $member;

	    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
	    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage']['name'];
	    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage'];
	    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage']['child']['info'];

	    	if ( $child == '3' )
	    	{
	    		$data['term1'] = $this->load->view('template/term1', false, true);
	    		$data['term2'] = $this->load->view('template/term2', false, true);
	    	}

			$this->load->view('front/_common/new_header', $data);
			$this->load->view('front/_common/sub_header', $data);
			$this->load->view('front/mypage/info_'.$child, $data);
			$this->load->view('front/_common/new_footer', $data);
		}
		else
		{
			$this->session->set_flashdata('SESSION_MESSAGE', '사용자 정보가 없습니다.');
			$this->index();
		}
	}

	// 회원정보수정 처리
	public function info_modify_proc()
	{
		// 사용자 이름
		$member_name 			= trim($this->input->post('member_name'));
		// 사용자 비밀번호
		$member_password 		= trim($this->input->post('member_password'));
		// 신규 사용자 비밀번호
		$member_new_password 	= trim($this->input->post('member_new_password'));
		// 신규 사용자 비밀번호 확인
		$member_new_password_re = trim($this->input->post('member_new_password_re'));
		// 사용자 휴대폰번호
		$member_hp 				= trim($this->input->post('member_hp'));
		// 사용자 전화번호
		$member_phone 			= trim($this->input->post('member_phone'));
		// 사용자 회사
		$member_company 		= trim($this->input->post('member_company'));
		// 사용자 직책
		$member_position 		= trim($this->input->post('member_position'));

		if ( $this->session->userdata('MEMBER')['member_id'] == '' ) {
			$this->session->set_flashdata('SESSION_MESSAGE', '사용자 정보가 없습니다.');
			redirect('/front/mypage/info');
		}
		else
		{
			$condition = array(
				'member_id' => $this->session->userdata('MEMBER')['member_id']
			);

			// 사용자 정보 가져오기
			$member_list = $this->member_model->get_member_list($condition);
			$member = $member_list[0];

			$modify = array(
				'member_id' 		=> $this->session->userdata('MEMBER')['member_id'],
				'member_name' 		=> $member_name,
				'member_hp' 		=> $member_hp,
				'member_phone' 		=> $member_phone,
				'member_company' 	=> $member_company,
				'member_position' 	=> $member_position,
				'upd_datetime' 		=> date('Y-m-d H:i:s', time()),
    			'upd_ip'        	=> $_SERVER['REMOTE_ADDR']
			);

			// 신규 비밀번호 입력 있으면
			if ( $member_password && $member_new_password && $member_new_password_re )
			{
				if ( password_verify($member_password, $member->member_password) )
				{
					if ( $member_new_password == $member_new_password_re )
					{
						$modify['member_password'] = password_hash($member_new_password, PASSWORD_BCRYPT);
						$modify['member_password_original'] = $member_new_password;
					}
					else
					{
						$this->session->set_flashdata('SESSION_MESSAGE', '입력한 새 비밀번호가 서로 다릅니다.');
						redirect('/front/mypage/info');
					}
				}
				else
				{
					$this->session->set_flashdata('SESSION_MESSAGE', '비밀번호를 확인해 주십시오.');
					redirect('/front/mypage/info');				
				}
			}

			$result = $this->member_model->modify_member($modify);

			if ( $result )
			{
				$_member = array(
					'member_id'		=> $member->member_id,
					'member_type'	=> $member->member_type,
					'member_name'	=> $member->member_name,
					'member_company'=> $member->member_company,
					'member_phone'	=> $member->member_phone,
					'member_hp'		=> $member->member_hp
				);

				$this->session->set_userdata('MEMBER_SESSION', TRUE);
				$this->session->set_userdata('MEMBER', $_member);

				$this->session->set_flashdata('SESSION_MESSAGE', '회원정보 수정 했습니다.');
				redirect('/front/mypage/info');
			}
			else
			{
				$this->session->set_flashdata('SESSION_MESSAGE', '회원정보 수정에 실패 하였습니다.');
				redirect('/front/mypage/info');
			}
		}
	}

	// 마이페이지 - 회원 등급 관리 - 유료회원 전환 신청
	public function membership_join_proc()
	{
		$member_type 	= $this->session->userdata('MEMBER')['member_type'];
		$member_id 		= $this->session->userdata('MEMBER')['member_id'];

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
        	if ( $status == 'paid') {
        		$modify = array(
					'member_id' 		=> $this->session->userdata('MEMBER')['member_id'],
        			'member_type' 		=> '2',
        			'member_start'		=> date('Y-m-d H:i:s', time()),
        			'member_limit'		=> date('Y-m-d 23:23:59', strtotime('+12 month', time())),
					'upd_datetime' 		=> date('Y-m-d H:i:s', time()),
	    			'upd_ip'        	=> $_SERVER['REMOTE_ADDR']
        		);

				$result = $this->member_model->modify_member($modify);

				if ( $result )
					$msg = '유료회원으로 전환 되었습니다.';
				else
					$msg = '유료회원으로 전환 되었습니다.\n[ERROR:정보수정실패]';
        	}
			else if ( $status == 'ready' ) {
				$msg = '입금 확인 후 유료회원으로 전환 됩니다.';
			}
			else if ( $status == 'failed' ) {
				$msg = '결제 실패 하였습니다. 재결제 부탁 드립니다.';
			}
			else if ( $status == 'cancelled' ) {
				$msg = '결제 도중 취소 되었습니다. 재결제 부탁 드립니다.';
			}

			$this->session->set_flashdata('SESSION_MESSAGE', $msg);
        	redirect('/front/mypage/info/info2');
        }
        else
        {
			$this->session->set_flashdata('SESSION_MESSAGE', '결제가 실패 하였습니다. 로그인 후 재결제 부탁 드립니다.');
        	redirect('/front/mypage/info/info2');
        }		
	}

	// 마이페이지 - 회원 정보 관리 - 뉴스레터 수신 설정 처리
	public function info3_proc()
	{
		$member_agree1_yn = trim($this->input->post('member_agree1_yn'));
		$member_agree2_yn = trim($this->input->post('member_agree2_yn'));

		if ( $this->session->userdata('MEMBER')['member_id'] == '' ) {
			$this->session->set_flashdata('SESSION_MESSAGE', '사용자 정보가 없습니다.');
			redirect('/front/mypage/info/info1');
		}
		else
		{
			$condition = array(
				'member_id' => $this->session->userdata('MEMBER')['member_id']
			);

			// 사용자 정보 가져오기
			$member_list = $this->member_model->get_member_list($condition);
			$member = $member_list[0];

			$modify = array(
				'member_id' 		=> $this->session->userdata('MEMBER')['member_id'],
				'member_agree1_yn' 	=> $member_agree1_yn,
				'member_agree2_yn' 	=> $member_agree2_yn,
				'agree_datetime' 	=> date('Y-m-d H:i:s', time()),
			);

			$result = $this->member_model->modify_member($modify);

			if ( $result )
			{
				$_member = array(
					'member_id'		=> $member->member_id,
					'member_type'	=> $member->member_type,
					'member_name'	=> $member->member_name,
					'member_company'=> $member->member_company,
					'member_phone'	=> $member->member_phone,
					'member_hp'		=> $member->member_hp
				);

				$this->session->set_userdata('MEMBER_SESSION', TRUE);
				$this->session->set_userdata('MEMBER', $_member);

				$this->session->set_flashdata('SESSION_MESSAGE', $modify['agree_datetime'].' 뉴스레터 수신 설정 수정 했습니다.');
				redirect('/front/mypage/info/info3');
			}
			else
			{
				$this->session->set_flashdata('SESSION_MESSAGE', '뉴스레터 수신 설정 수정에 실패 하였습니다.');
				redirect('/front/mypage/info/info3');
			}
		}
	}

	// 회원탈퇴
	public function leave()
	{
		$data = array();

		$condition = array(
			'member_id' => $this->session->userdata('MEMBER')['member_id']
		);

		// 사용자 정보 가져오기
		$member_list = $this->member_model->get_member_list($condition);

		// 사용자 정보가 있다면
		if ( count($member_list) > 0 )
		{
			$member = $member_list[0];

			$data['member'] = $member;

	        $data['name'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['leave']['name'];
	        $data['id'] = $this->config->item('sub_menu')[$this->config->item('SITE_LANGUAGE')]['leave']['id'];

			$this->load->view('front/_common/new_header', $data);
        	$this->load->view('front/_common/sub_header_single', $data);
			$this->load->view('front/mypage/leave', $data);
			$this->load->view('front/_common/new_footer', $data);
		}
		else
		{
			$this->session->set_flashdata('SESSION_MESSAGE', '사용자 정보가 없습니다.');
			$this->index();
		}
	}

	// 회원탈퇴 처리
	public function leave_proc()
	{
		// 사용자 비밀번호
		$member_password 	= trim($this->input->post('member_password'));
		// 탈퇴 사유
		$leave_reason 		= trim($this->input->post('leave_reason'));

		if ( $this->session->userdata('MEMBER')['member_id'] == '' ) {
			$this->session->set_flashdata('SESSION_MESSAGE', '사용자 정보가 없습니다.');
			redirect('/front/mypage/leave');
		}
		else
		{
			$condition = array(
				'member_id' => $this->session->userdata('MEMBER')['member_id']
			);

			// 사용자 정보 가져오기
			$member_list = $this->member_model->get_member_list($condition);
			$member = $member_list[0];

			if ( password_verify($member_password, $member->member_password) )
			{
				$leave = array(
					'member_id' 		=> $this->session->userdata('MEMBER')['member_id'],
					'member_use' 		=> '8',
					'leave_reason' 		=> $leave_reason,
					'leave_datetime' 	=> date('Y-m-d H:i:s', time())
				);

				$result = $this->member_model->modify_member($leave);

				if ( $result )
				{
					$this->session->sess_destroy();

					$this->session->set_flashdata('SESSION_MESSAGE', '회원탈퇴 되었습니다.');
					redirect('/');
				}
				else
				{
					$this->session->set_flashdata('SESSION_MESSAGE', '회원탈퇴 처리에 실패 하였습니다.');
					redirect('/front/mypage/leave');
				}
			}
			else
			{
				$this->session->set_flashdata('SESSION_MESSAGE', '비밀번호를 확인해 주십시오.');
				redirect('/front/mypage/leave');				
			}
		}
	}

    public function modify($board_type, $board_seq)
    {
        $data = array();

        $condition = array(
            'board_seq' => $board_seq
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), $board_type, $board_type, $condition);

        $data['board_data'] = $board_data;

    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage'];

    	if ( $board_type == 'qna' )
    		$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage']['child']['customer'];
    	else if ( $board_type == 'market' || $board_type == 'recruit' || $board_type == 'gongsabi' )
    		$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage']['child']['community'];
    	else if ( $board_type == 'book' || $board_type == 'lecture' )
    		$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage']['child']['education'];

        $this->load->view('front/_common/new_header');
		$this->load->view('front/_common/sub_header', $data);
        $this->load->view('front/mypage/'.$board_type.'_modify', $data);
        $this->load->view('front/_common/new_footer');
    }

    public function modify_proc($board_type)
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
			'board_db'		=> $board_type,
			'board_type'	=> $board_type,
			'board_seq'		=> $board_seq,
			'upd_user'		=> $this->session->userdata('MEMBER')['member_id'],
			'upd_datetime'	=> date('Y-m-d H:i:s', now())
		);

        // 파일 업로드 디렉토리
        switch ( $board_type ) {
	        case 'gongsabi':
	            $upload_dir = $this->config->item('gongsabi_data_gongsabi_path');
	            break;
	        case 'market':
	            $upload_dir = $this->config->item('gongsabi_data_market_path');
	            break;
	        case 'recruit':
	            $upload_dir = $this->config->item('gongsabi_data_recruit_path');
	            break;
	        case 'pds':
	            $upload_dir = $this->config->item('gongsabi_data_board_path');
	            break;
	        case 'board':
	            $upload_dir = $this->config->item('gongsabi_data_board_path');
	            break;
	    }

        if ( !is_dir($upload_dir) ) {
            @mkdir($upload_dir, 0777, TRUE);
        }

        $config['upload_path']      = $upload_dir;
        $config['max_size']         = '10240';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|xls|xlsx|doc|docx|ppt|pptx|pdf|hwp|txt';
        $config['encrypt_name']     = TRUE;
        
        $this->load->library('upload', $config);

		if ( $board_type == 'book' )
		{
		}
		else if  ( $board_type == 'lecture' )
		{
			$values['board_etc_1'] 		= $board_etc_1;
			$values['board_etc_2'] 		= $board_etc_2;
			$values['board_category'] 	= $board_category;
			$values['board_name'] 		= $board_name;
			$values['board_company'] 	= $board_company;
			$values['board_hp'] 		= $board_hp;
			$values['board_email'] 		= $board_email;
			$values['board_content'] 	= $board_content;
		}
		else if  ( $board_type == 'market' || $board_type == 'recruit' )
		{
			$values['board_category'] 	= $board_category;
			$values['board_name'] 		= $board_name;
			$values['board_company'] 	= $board_company;
			$values['board_hp'] 		= $board_hp;
			$values['board_email'] 		= $board_email;
			$values['board_title'] 		= $board_title;
			$values['board_content'] 	= $board_content;
    
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
	            redirect('/front/mypage/modify/'.$board_type.'/'.$board_seq);
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
	            redirect('/front/mypage/modify/'.$board_type.'/'.$board_seq);
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
	            redirect('/front/mypage/modify/'.$board_type.'/'.$board_seq);
	        }
		}
		else if  ( $board_type == 'gongsabi' )
		{
			$values['board_category'] 	= $board_category;
			$values['board_name'] 		= $board_name;
			$values['board_company'] 	= $board_company;
			$values['board_hp'] 		= $board_hp;
			$values['board_email'] 		= $board_email;
			$values['board_content'] 	= $board_content;
		}
		else if  ( $board_type == 'qna' )
		{
			$values['board_name'] 		= $board_name;
			$values['board_company'] 	= $board_company;
			$values['board_email'] 		= $board_email;
			$values['board_phone'] 		= $board_phone;
			$values['board_title'] 		= $board_title;
			$values['board_content'] 	= $board_content;
		}

		$result = $this->board_model->modify_board($values);

		if ($result)
		{
			$this->session->set_flashdata('SESSION_MESSAGE', '수정 하였습니다.');
			redirect('/front/mypage/modify/'.$board_type.'/'.$board_seq);
		}
		else
		{
			$this->session->set_flashdata('SESSION_MESSAGE', '수정 실패 하였습니다.');
			redirect('/front/mypage/modify/'.$board_type.'/'.$board_seq);
		}
    }

	// 신청내역
	public function request()
	{
		$data = array();

		// 책 구매요청
		$condition1 = array(
			'ins_user' => $this->session->userdata('MEMBER')['member_id']
		);
        $board_data1 = HP_GET_BOARD_LIST($this->config->item('site_id'), 'book', 'book', $condition1);
        $data['board_data1'] = $board_data1;

		// 강의 요청
		$condition2 = array(
			'ins_user' => $this->session->userdata('MEMBER')['member_id']
		);
        $board_data2 = HP_GET_BOARD_LIST($this->config->item('site_id'), 'lecture', 'lecture', $condition2);
        $data['board_data2'] = $board_data2;

		// 현장 자재 사고팔기
		$condition3 = array(
			'ins_user' => $this->session->userdata('MEMBER')['member_id']
		);
        $board_data3 = HP_GET_BOARD_LIST($this->config->item('site_id'), 'market', 'market', $condition3);
        $data['board_data3'] = $board_data3;

		// 구인, 구직
		$condition4 = array(
			'ins_user' => $this->session->userdata('MEMBER')['member_id']
		);
        $board_data4 = HP_GET_BOARD_LIST($this->config->item('site_id'), 'recruit', 'recruit', $condition4);
        $data['board_data4'] = $board_data4;

		// 공사비 작성 의뢰
		$condition5 = array(
			'ins_user' => $this->session->userdata('MEMBER')['member_id']
		);
        $board_data5 = HP_GET_BOARD_LIST($this->config->item('site_id'), 'gongsabi', 'gongsabi', $condition5);
        $data['board_data5'] = $board_data5;

		// Q&A
		$condition6 = array(
			'ins_user' => $this->session->userdata('MEMBER')['member_id']
		);
        $board_data6 = HP_GET_BOARD_LIST($this->config->item('site_id'), 'qna', 'qna', $condition6);
        $data['board_data6'] = $board_data6;

		$this->load->view('front/_common/new_header', $data);
		$this->load->view('front/mypage/request', $data);
		$this->load->view('front/_common/new_footer', $data);
	}

	// 마이페이지 - 공사비 검색
	public function data($child = 'gongsabi')
	{
		$data = array();

		$condition = array(
		    'page' => $this->input->get('page'),
			'type' => $child,
			'member_id' => $this->session->userdata('MEMBER')['member_id']
		);
        $scrap_list = $this->scrap_model->get_scrap_list($condition);
        $scrap_count = $this->scrap_model->get_scrap_count($condition);

        $data['board_list'] = $scrap_list;
        $data['board_count'] = $scrap_count[0]->cnt;

        $url_query = '/front/mypage/data/'.$child.'/?'.http_build_query($condition);

        $config['base_url']                 = $url_query;
        $config['total_rows']               = $scrap_count[0]->cnt;
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

        $pagination = $this->pagination->create_links();

        $data['pagination'] = $pagination;
        $data['now'] = $child;

    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage']['child']['data'];

		$this->load->view('front/_common/new_header', $data);
		$this->load->view('front/_common/sub_header', $data);
		$this->load->view('front/mypage/data', $data);
		$this->load->view('front/_common/new_footer', $data);	
	}

	// 마이페이지 - 공사비 교육
	public function education($child = 'book')
	{
		$data = array();

		if ( $child == 'bookcs' )
			$_child = 'book';
		else
			$_child = $child;


        if ( $child == 'book' || $child == 'bookcs' )
        {
		    $board_condition = array(
		        'board_db'      => 'book',
		        'board_type'    => 'book',
		        'ins_user' 		=> $this->session->userdata('MEMBER')['member_id'],
		        'page'			=> $this->input->get('page')
		    );

		    // if ( $child == 'bookcs' )
		    	// $board_condition['status_in'] = '1,2,3,4,5,6,7,8';

		    $board_list = $this->pay_model->get_book_pay_list($board_condition);
		    $board_count = $this->pay_model->get_book_pay_count($board_condition);

		    if ( count($board_list) > 0 )
		    {
		        $count = $board_count[0]->cnt;
		        $list = $board_list;

		        unset($board_condition['board_db']);
		        unset($board_condition['board_type']);
		        unset($board_condition['ins_user']);
		        unset($board_condition['page']);

		        $url_query = '/front/mypage/education/'.$child.'/?'.http_build_query($board_condition);

		        $config['base_url']                 = $url_query;
		        $config['total_rows']               = $count;
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

		        $pagination = $this->pagination->create_links();

		        $board_data = array(
			        'count'         => $count,
			        'list'          => $list,
			        'pagination'    => $pagination
			    );
		    }
		    else
		    {
		        $board_data = array(
			        'count'         => 0,
			        'list'          => [],
			        'pagination'    => ''
			    );
		    }
        }
        else
        {
			$condition = array(
				'ins_user' => $this->session->userdata('MEMBER')['member_id']
			);
	        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), $_child, $_child, $condition);
        }

        $data['board_list'] = $board_data['list'];
        $data['board_count'] = $board_data['count'];
        $data['pagination'] = $board_data['pagination'];
        $data['now'] = $child;

    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage']['child']['education'];

		$this->load->view('front/_common/new_header', $data);
		$this->load->view('front/_common/sub_header', $data);
		$this->load->view('front/mypage/education_'.$child, $data);
		$this->load->view('front/_common/new_footer', $data);		
	}

	// 마이페이지 - 공사비교육 - 취소/교환/환불 신청 처리
	public function bookcs_proc()
	{
		$chk = $this->input->post('chk');
		$cancel_reason_text = $this->input->post('cancel_reason_text');

		foreach ($chk as $key => $board_seq) {

			$action = $this->input->post('_action')[$board_seq];

			$board_condition = array(
		        'board_db'      => 'book',
		        'board_type'    => 'book',
		        'board_seq' 	=> $board_seq
		    );

		    $board_list = $this->pay_model->get_book_pay_list($board_condition);
		    $board_count = $this->pay_model->get_book_pay_count($board_condition);

		    $info = $board_list[0];
			
			// 취소
			if ( $action == 'cancel' )
			{
				$cancel_condition = array(
					'board_seq' 	=> $board_seq,
					// 주문상태 (8 : 환불요청, 9 : 주문취소)
					'board_etc_3' 	=> ( $info->status == 'ready' ) ? '9' : '8',
					// 취소사유
					'board_etc_5' 	=> $cancel_reason_text,
					'upd_datetime' 	=> date('Y-m-d H:i:s'),
					'upd_user' 		=> $this->session->userdata('MEMBER')['member_id']
				);

				$result = HP_GET_BOARD_MODIFY($this->config->item('site_id'), 'book', 'book', $cancel_condition);
			}
			// 교환
			else if ( $action == 'exchange' )
			{
				$cancel_condition = array(
					'board_seq' 	=> $board_seq,
					// 주문상태 (7 : 교환요청)
					'board_etc_3' 	=> '7',
					// 취소사유
					'board_etc_5' 	=> $cancel_reason_text,
					'upd_datetime' 	=> date('Y-m-d H:i:s'),
					'upd_user' 		=> $this->session->userdata('MEMBER')['member_id']
				);

				$result = HP_GET_BOARD_MODIFY($this->config->item('site_id'), 'book', 'book', $cancel_condition);
			}
			// 환불
			else if ( $action == 'refund' )
			{
				$cancel_condition = array(
					'board_seq' 	=> $board_seq,
					// 주문상태 (8 : 환불요청)
					'board_etc_3' 	=> '8',
					// 취소사유
					'board_etc_5' 	=> $cancel_reason_text,
					'upd_datetime' 	=> date('Y-m-d H:i:s'),
					'upd_user' 		=> $this->session->userdata('MEMBER')['member_id']
				);

				$result = HP_GET_BOARD_MODIFY($this->config->item('site_id'), 'book', 'book', $cancel_condition);
			}
		}

		$this->session->set_flashdata('SESSION_MESSAGE', '요청을 처리 하였습니다.');
		redirect('/front/mypage/education/bookcs');
	}

	// 마이페이지 - 건설 장터
	public function community($child = 'market')
	{
		$data = array();

		$_child = $child;

		$condition = array(
			'ins_user' => $this->session->userdata('MEMBER')['member_id']
		);
        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), $_child, $_child, $condition);

        $data['board_list'] = $board_data['list'];
        $data['board_count'] = $board_data['count'];
        $data['pagination'] = $board_data['pagination'];
        $data['now'] = $child;

    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage']['child']['community'];

		$this->load->view('front/_common/new_header', $data);
		$this->load->view('front/_common/sub_header', $data);
		$this->load->view('front/mypage/community_'.$child, $data);
		$this->load->view('front/_common/new_footer', $data);		
	}

	// 마이페이지 - 고객센터
	public function customer($child = 'qna')
	{
		$data = array();

		$_child = $child;

		$condition = array(
			'ins_user' => $this->session->userdata('MEMBER')['member_id']
		);
        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), $_child, $_child, $condition);

        $data['board_list'] = $board_data['list'];
        $data['board_count'] = $board_data['count'];
        $data['pagination'] = $board_data['pagination'];
        $data['now'] = $child;

    	$data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
    	$data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage']['name'];
    	$data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage'];
    	$data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage']['child']['customer'];

		$this->load->view('front/_common/new_header', $data);
		$this->load->view('front/_common/sub_header', $data);
		$this->load->view('front/mypage/customer_'.$child, $data);
		$this->load->view('front/_common/new_footer', $data);		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */