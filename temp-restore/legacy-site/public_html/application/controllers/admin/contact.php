<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

    function __construct()
    {       
        parent::__construct();  

        if ( !$this->session->userdata('ADMIN_SESSION') )
            redirect('/admin/auth');
    }

    public function index()
    {
        $data = array();

        $keyword    = ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '';
        $page       = $this->input->get('page');

        $condition = array(
            'keyword' => $keyword,
            'page' => $page
        );

        $data['condition'] = $condition;
        $data['board'] = 'contact';
        $data['board_title'] = '업무 제휴';
        $data['top_yn'] = false;
        $data['reply_yn'] = false;

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'contact', 'contact', $condition);
        $data['board_data'] = $board_data;

        $data['pagination'] = '';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/contact/list', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function regist()
    {
        $data = array();

        $data['board'] = $board_type;
        $data['top_yn'] = false;
        $data['reply_yn'] = false;
        $data['board_title'] = '업무 제휴';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/contact/regist', $data);
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
            redirect('/admin/contact/'.$board_type);
        }
        else
            redirect('/admin/contact/'.$board_type);
    }

    public function modify($board_type, $board_seq)
    {
        $data = array();

        $data['board'] = $board_type;
        $data['top_yn'] = false;
        $data['reply_yn'] = false;
        $data['board_title'] = '업무 제휴';

        $condition = array(
            'board_type'    => $board_type,
            'board_seq'     => $board_seq
        );

        $data['condition'] = $condition;

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), $board_type, $board_type, $condition);
        $data['board_data'] = $board_data;

        $this->load->view('admin/_common/header');
        $this->load->view('admin/contact/modify', $data);
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

        // 파일 업로드 디렉토리
        $upload_dir = $this->config->item('gongsabi_data_'.$board_type.'_path');

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

        $result = HP_GET_BOARD_MODIFY($this->config->item('site_id'), $board_type, $board_type, $values);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '수정 되었습니다.');
            redirect('/admin/contact/modify/'.$board_type.'/'.$board_seq);
        }
        else
            redirect('/admin/contact/modify/'.$board_type.'/'.$board_seq);
    }

    public function delete($board_type, $board_seq)
    {
        $page = $this->input->get('page');

        $values = array(
            'board_seq'         => $board_seq,
            'board_type'        => $board_type
        );

        $result = HP_GET_BOARD_DELETE($this->config->item('site_id'), $board_type, $board_type, $values);

        if ( $result )
        {
            $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'contact', 'contact', array());
            if ( (int)$board_data['count'] <= (int)$this->config->item('paging_limit') )
                $page = '';

            $this->session->set_flashdata('SESSION_MESSAGE', '삭제 되었습니다.');
            redirect('/admin/contact?page='.$page);
        }
        else
            redirect('/admin/contact?page='.$page);
    }

    // 다운로드
    public function download()
    {
        $keyword        = trim($this->input->post('keyword'));

        $condition = array(
            'keyword'        => $keyword,
            'limit'          => 100000
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'contact', 'contact', $condition);

        $list = $board_data['list'];

        $filename = 'download_contact_'.date('Ymdhi').'.xls';

        header('Content-Type: application/vnd.ms-excel; charset=utf-8');
        header('Expires: 0');
        header('Cache-Control: must-revalidate,post-check=0,pre-check=0');
        header('Pragma: public');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        
        print('<meta http-equiv="Content-Type" content="application/vnd.ms-excel; charset=utf-8">');

        $text = '<table>';

        $text .= '<tr>';
        $text .= '<th>회사</th>';
        $text .= '<th>이름</th>';
        $text .= '<th>연락처</th>';
        $text .= '<th>등록일</th>';
        $text .= '<th>최종수정일</th>';
        $text .= '</tr>';

        if ( count($list) > 0 )
        {
            foreach ($list as $key => $item) {
                $text .= '<tr>';
                $text .= '<td>'.$item->board_company.'</td>';
                $text .= '<td>'.$item->board_name.'</td>';
                $text .= '<td>'.$item->board_phone.'</td>';
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