<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gongsabi extends CI_Controller {

    function __construct()
    {       
        parent::__construct();  

        if ( !$this->session->userdata('ADMIN_SESSION') )
            redirect('/admin/auth');
    }

    public function index()
    {
        $data = array();

        $condition = array(
            'page' => $this->input->get('page'),
            'keyword' => $this->input->get('keyword'),
        );

        $data['condition'] = $condition;
        $data['board'] = 'gongsabi';
        $data['board_title'] = '공사비 작성 의뢰';
        $data['top_yn'] = false;
        $data['reply_yn'] = false;

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'gongsabi', 'gongsabi', $condition);
        $data['board_data'] = $board_data;

        $data['pagination'] = '';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/gongsabi/list', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function regist()
    {
        $data = array();

        $data['board'] = $board_type;
        $data['top_yn'] = false;
        $data['reply_yn'] = false;
        $data['board_title'] = '공사비 작성 의뢰';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/gongsabi/regist', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function regist_proc()
    {
        $ins_datetime   = $this->input->post('ins_datetime');
        $board_type     = $this->input->post('board_type');
        $board_top_yn   = $this->input->post('board_top_yn');
        $board_name     = $this->input->post('board_name');
        $board_email    = $this->input->post('board_email');
        $board_phone    = $this->input->post('board_phone');
        $board_password = $this->input->post('board_password');
        $board_secret_yn = ( $board_password ) ? 'Y' : 'N';
        $board_title    = $this->input->post('board_title');
        $board_content  = $this->input->post('board_content');

        $values = array(
            'board_type'        => $board_type,
            'board_title'       => $board_title,
            'board_content'     => $board_content
        );

        if ( isset($ins_datetime) && $ins_datetime )
            $values['ins_datetime'] = $ins_datetime.' 00:00:00';
        if ( isset($board_top_yn) && $board_top_yn )
            $values['board_top_yn'] = $board_top_yn;
        if ( isset($board_name) && $board_name )
            $values['board_name'] = $board_name;
        if ( isset($board_email) && $board_email )
            $values['board_email'] = $board_email;
        if ( isset($board_phone) && $board_phone )
            $values['board_phone'] = $board_phone;
        if ( isset($board_password) && $board_password )
            $values['board_password'] = $board_password;
        if ( isset($board_secret_yn) && $board_secret_yn )
            $values['board_secret_yn'] = $board_secret_yn;

        if ( !$board_type )
            redirect('/');

        $result = HP_GET_BOARD_REGIST($this->config->item('site_id'), $board_type, $board_type, $values);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '등록 되었습니다.');
            redirect('/admin/gongsabi/'.$board_type);
        }
        else
            redirect('/admin/gongsabi/'.$board_type);
    }

    public function modify($board_type, $board_seq)
    {
        $data = array();

        $data['board'] = $board_type;
        $data['top_yn'] = false;
        $data['reply_yn'] = false;
        $data['board_title'] = '공사비 작성 의뢰';

        $condition = array(
            'board_type'    => $board_type,
            'board_seq'     => $board_seq
        );

        $data['condition'] = $condition;

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), $board_type, $board_type, $condition);
        $data['board_data'] = $board_data;

        $this->load->view('admin/_common/header');
        $this->load->view('admin/gongsabi/modify', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function modify_proc()
    {
        $board_seq      = $this->input->post('board_seq');
        $board_type     = $this->input->post('board_type');
        $board_name     = $this->input->post('board_name');
        $board_company  = $this->input->post('board_company');
        $board_hp       = $this->input->post('board_hp');
        $board_email    = $this->input->post('board_email');
        $board_content  = $this->input->post('board_content');
        $board_reply_content  = $this->input->post('board_reply_content');
        $board_sms_yn  = $this->input->post('board_sms_yn');

        $values = array(
            'board_seq'         => $board_seq,
            'board_type'        => $board_type,
            'board_content'     => $board_content
        );

        if ( isset($board_name) && $board_name )
            $values['board_name'] = $board_name;
        if ( isset($board_company) && $board_company )
            $values['board_company'] = $board_company;
        if ( isset($board_hp) && $board_hp )
            $values['board_hp'] = $board_hp;
        if ( isset($board_email) && $board_email )
            $values['board_email'] = $board_email;
        if ( isset($board_reply_content) && $board_reply_content )
            $values['board_reply_content'] = $board_reply_content;

        if ( !$board_type )
            redirect('/');

        $result = HP_GET_BOARD_MODIFY($this->config->item('site_id'), $board_type, $board_type, $values);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '수정 되었습니다.');

            if ( $board_sms_yn == 'T' && $board_hp )
            {
                $msg = array(
                    'msg_type' => 'SMS',
                    'receiver' => $board_hp,
                    'msg' => "{$board_name}님 공사비작성의뢰에 대한 답변이 등록되었습니다. [마이페이지]에서 확인해 주십시오."
                );

                $sms_result = sendMessage($msg);
            }

            redirect('/admin/gongsabi/modify/'.$board_type.'/'.$board_seq);
        }
        else
            redirect('/admin/gongsabi/modify/'.$board_type.'/'.$board_seq);
    }

    public function delete($board_type, $board_seq)
    {
        $values = array(
            'board_seq'         => $board_seq,
            'board_type'        => $board_type
        );

        if ( !$board_type )
            redirect('/');

        $result = HP_GET_BOARD_DELETE($this->config->item('site_id'), $board_type, $board_type, $values);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '삭제 되었습니다.');
            redirect('/admin/gongsabi');
        }
        else
            redirect('/admin/gongsabi');
    }

    // 다운로드
    public function download()
    {
        $keyword        = trim($this->input->post('keyword'));

        $condition = array(
            'keyword'        => $keyword,
            'limit'          => 100000
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'gongsabi', 'gongsabi', $condition);

        $list = $board_data['list'];

        $filename = 'download_gongsabi_'.date('Ymdhi').'.xls';

        header('Content-Type: application/vnd.ms-excel; charset=utf-8');
        header('Expires: 0');
        header('Cache-Control: must-revalidate,post-check=0,pre-check=0');
        header('Pragma: public');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        
        print('<meta http-equiv="Content-Type" content="application/vnd.ms-excel; charset=utf-8">');

        $text = '<table>';

        $text .= '<tr>';
        $text .= '<th>작업 범위</th>';
        $text .= '<th>회사</th>';
        $text .= '<th>이름</th>';
        $text .= '<th>등록일</th>';
        $text .= '<th>최종수정일</th>';
        $text .= '</tr>';

        if ( count($list) > 0 )
        {
            foreach ($list as $key => $item) {
                $text .= '<tr>';
                $text .= '<td>'.HP_GET_GONGSABI_REQUEST_TEXT($item->board_category).'</td>';
                $text .= '<td>'.$item->board_company.'</td>';
                $text .= '<td>'.$item->board_name.'</td>';
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