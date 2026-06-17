<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @brief 회원관리
 */
class Member extends CI_Controller {

    function __construct()
    {       
        parent::__construct();  

        if ( !$this->session->userdata('ADMIN_SESSION') )
            redirect('/admin/auth');
    }

	public function index()
	{
		$data = array();

        $member_type    = ( $this->input->get('member_type') ) ? $this->input->get('member_type') : '';
        $member_use     = ( $this->input->get('member_use') ) ? $this->input->get('member_use') : '';
        $keyword        = trim($this->input->get('keyword'));
		$page 		    = trim($this->input->get('page'));

		$condition = array(
			'member_type'    => $member_type,
            'member_use'     => $member_use,
            'page'           => $page,
			'keyword'        => $keyword
		);

		$data['condition']  = $condition;

		$list		= $this->member_model->get_member_list($condition);
		$_count 	= $this->member_model->get_member_count($condition);
		$count		= $_count[0]->cnt;

        $data['board_data'] = array(
            'list' => $list,
            'count' => $count
        );

        unset($data['condition']['page']);

        $data['url_query'] = '/admin/member?'.http_build_query($data['condition']);

        $config['base_url']             = $data['url_query'];
		$config['total_rows'] 			= $count;
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

        $this->load->view('admin/_common/header');
        $this->load->view('admin/member/list', $data);
        $this->load->view('admin/_common/footer');  
	}

    // 회원정보수정
    public function modify($member_seq)
    {
        $data = array();

        $member_type    = $this->input->get('member_type');
        $member_use     = $this->input->get('member_use');
        $keyword        = $this->input->get('keyword');
        $page           = $this->input->get('page');

        $data['return_condition'] = array(
            'return_member_type' => $member_type,
            'return_member_use' => $member_use,
            'return_keyword' => $keyword,
            'return_page' => $page,
        );

        $condition = array(
            'member_seq' => $member_seq
        );

        // 사용자 정보 가져오기
        $member_list = $this->member_model->get_member_list($condition);

        // 사용자 정보가 있다면
        if ( count($member_list) > 0 )
        {
            $data['board_data']['list'] = $member_list;

            $this->load->view('admin/_common/header');
            $this->load->view('admin/member/modify', $data);
            $this->load->view('admin/_common/footer'); 
        }
        else
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '사용자 정보가 없습니다.');
            redirect('/admin/member');
        }
    }

    // 회원정보수정 처리
    public function modify_proc()
    {
        $return_member_type     = trim($this->input->post('return_member_type'));
        $return_member_use      = trim($this->input->post('return_member_use'));
        $return_keyword         = trim($this->input->post('return_keyword'));
        $return_page            = trim($this->input->post('return_page'));

        $return_condition = array(
            'member_type' => $return_member_type,
            'member_use' => $return_member_use,
            'keyword' => $return_keyword,
            'page' => $return_page,
        );

        // 사용자 SEQ
        $member_seq             = trim($this->input->post('member_seq'));
        // 사용자 유형
        $member_type            = trim($this->input->post('member_type'));
        // 유료회원 만료일
        $member_limit           = trim($this->input->post('member_limit'));
        // 사용자 이름
        $member_name            = trim($this->input->post('member_name'));
        // 사용자 비밀번호
        $member_password        = trim($this->input->post('member_password'));
        // 사용자 휴대폰번호
        $member_hp              = trim($this->input->post('member_hp'));
        // 사용자 회사
        $member_company         = trim($this->input->post('member_company'));
        // 사용자 직책
        $member_position        = trim($this->input->post('member_position'));

        if ( $member_seq == '' ) {
            $this->session->set_flashdata('SESSION_MESSAGE', '사용자 정보가 없습니다.');
            redirect('/admin/member');
        }
        else
        {
            $condition = array(
                'member_seq' => $member_seq
            );

            // 사용자 정보 가져오기
            $member_list = $this->member_model->get_member_list($condition);
            $member = $member_list[0];

            $modify = array(
                'member_seq'        => $member_seq,
                'member_type'       => $member_type,
                'member_name'       => $member_name,
                'member_hp'         => $member_hp,
                'member_phone'      => $member_phone,
                'member_company'    => $member_company,
                'member_position'   => $member_position,
                'upd_datetime'      => date('Y-m-d H:i:s', time()),
                'upd_ip'            => $_SERVER['REMOTE_ADDR']
            );

            // 신규 비밀번호 입력 있으면
            if ( $member_password )
            {
                $modify['member_password'] = password_hash($member_password, PASSWORD_BCRYPT);
                $modify['member_password_original'] = $member_password;
            }

            // 유료회원 만료일이 있으면
            if ( $member_limit )
            {
                $modify['member_limit'] = $member_limit;
            }

            $result = $this->member_model->modify_member($modify);

            if ( $result )
            {
                $this->session->set_flashdata('SESSION_MESSAGE', '회원정보 수정 했습니다.');
                redirect('/admin/member/modify/'.$member_seq.'?'.http_build_query($return_condition));
            }
            else
            {
                $this->session->set_flashdata('SESSION_MESSAGE', '회원정보 수정에 실패 하였습니다.');
                redirect('/admin/member/modify/'.$member_seq.'?'.http_build_query($return_condition));
            }
        }
    }

    // 회원 삭제
    public function delete($member_seq)
    {
        $member_type    = $this->input->get('member_type');
        $member_use     = $this->input->get('member_use');
        $keyword        = $this->input->get('keyword');
        $page           = $this->input->get('page');

        $return_condition = array(
            'member_type' => $member_type,
            'member_use' => $member_use,
            'keyword' => $keyword,
            'page' => $page,
        );

        $condition = array(
            'member_seq' => $member_seq
        );

        // 사용자 정보 가져오기
        $count = $this->member_model->get_member_count($condition);

        if ( $count[0]->cnt == 0 )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '해당하는 회원이 없습니다.');
            redirect('/admin/member?'.http_build_query($return_condition));
        }
        else
        {
            $result = $this->member_model->delete_member($condition);

            if ( $result )
            {
                $this->session->set_flashdata('SESSION_MESSAGE', '회원 삭제 완료');
                redirect('/admin/member?'.http_build_query($return_condition));
            }
            else
            {
                $this->session->set_flashdata('SESSION_MESSAGE', '회원 삭제 실패');
                redirect('/admin/member?'.http_build_query($return_condition));
            }
        }
    }

    // 다운로드
    public function download()
    {
        $member_type    = ( $this->input->post('member_type') ) ? $this->input->post('member_type') : '';
        $member_use     = ( $this->input->post('member_use') ) ? $this->input->post('member_use') : '';
        $keyword        = trim($this->input->post('keyword'));

        $condition = array(
            'member_type'    => $member_type,
            'member_use'     => $member_use,
            'keyword'        => $keyword,
            'limit'          => 100000
        );

        $list = $this->member_model->get_member_list($condition);

        $filename = 'download_member_'.date('Ymdhi').'.xls';

        header('Content-Type: application/vnd.ms-excel; charset=utf-8');
        header('Expires: 0');
        header('Cache-Control: must-revalidate,post-check=0,pre-check=0');
        header('Pragma: public');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        
        print('<meta http-equiv="Content-Type" content="application/vnd.ms-excel; charset=utf-8">');

        $text = '<table>';

        $text .= '<tr>';
        $text .= '<th>회원유형</th>';
        $text .= '<th>회원상태</th>';
        $text .= '<th>이름</th>';
        $text .= '<th>아이디</th>';
        $text .= '<th>휴대폰번호</th>';
        $text .= '<th>등록일</th>';
        $text .= '<th>최종수정일</th>';
        $text .= '</tr>';

        if ( count($list) > 0 )
        {
            foreach ($list as $key => $item) {
                $text .= '<tr>';
                $text .= '<td>'.$this->config->item('MEMBER_TYPE')[$item->member_type]['name'].'</td>';
                $text .= '<td>'.$this->config->item('MEMBER_USE')[$item->member_use]['name'].'</td>';
                $text .= '<td>'.$item->member_name.'</td>';
                $text .= '<td>'.$item->member_id.'</td>';
                $text .= '<td>'.$item->member_hp.'</td>';
                $text .= '<td>'.$item->ins_datetime.'</td>';
                $text .= '<td>'.$item->upd_datetime.'</td>';
                $text .= '</tr>';
            }
        }

        echo $text;
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */