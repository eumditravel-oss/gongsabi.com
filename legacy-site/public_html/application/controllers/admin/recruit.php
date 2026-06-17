<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recruit extends CI_Controller {

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
            'keyword' => $this->input->get('keyword')
        );

        $data['condition'] = $condition;
        $data['board'] = 'recruit';
        $data['board_title'] = '구인/구직';
        $data['top_yn'] = false;
        $data['reply_yn'] = false;

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'recruit', 'recruit', $condition);
        $data['board_data'] = $board_data;

        $data['pagination'] = '';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/recruit/list', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function regist()
    {
        $data = array();

        $data['board'] = $board_type;
        $data['top_yn'] = false;
        $data['reply_yn'] = false;
        $data['board_title'] = '구인/구직';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/recruit/regist', $data);
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
            redirect('/admin/recruit/'.$board_type);
        }
        else
            redirect('/admin/recruit/'.$board_type);
    }

    public function modify($board_type, $board_seq)
    {
        $data = array();

        $data['board'] = $board_type;
        $data['top_yn'] = false;
        $data['reply_yn'] = false;
        $data['board_title'] = '구인/구직';

        $condition = array(
            'board_type'    => $board_type,
            'board_seq'     => $board_seq
        );

        $data['condition'] = $condition;

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), $board_type, $board_type, $condition);
        $data['board_data'] = $board_data;

        $this->load->view('admin/_common/header');
        $this->load->view('admin/recruit/modify', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function modify_proc()
    {
        $board_category = $this->input->post('board_category');
        $board_seq      = $this->input->post('board_seq');
        $board_type     = $this->input->post('board_type');
        $board_top_yn   = $this->input->post('board_top_yn');
        $board_name     = $this->input->post('board_name');
        $board_company  = $this->input->post('board_company');
        $board_email    = $this->input->post('board_email');
        $board_hp       = $this->input->post('board_hp');
        $board_password = $this->input->post('board_password');
        $board_title    = $this->input->post('board_title');
        $board_content  = $this->input->post('board_content');
        $board_reply_yn = $this->input->post('board_reply_yn');
        $board_reply_content  = $this->input->post('board_reply_content');

        $values = array(
            'board_seq'         => $board_seq,
            'board_type'        => $board_type,
            'board_title'       => $board_title,
            'board_content'     => $board_content
        );

        if ( isset($board_top_yn) && $board_top_yn )
            $values['board_top_yn'] = $board_top_yn;
        if ( isset($board_category) && $board_category )
            $values['board_category'] = $board_category;
        if ( isset($board_name) && $board_name )
            $values['board_name'] = $board_name;
        if ( isset($board_company) && $board_company )
            $values['board_company'] = $board_company;
        if ( isset($board_email) && $board_email )
            $values['board_email'] = $board_email;
        if ( isset($board_hp) && $board_hp )
            $values['board_hp'] = $board_hp;
        if ( isset($board_password) && $board_password )
            $values['board_password'] = $board_password;
        if ( isset($board_reply_yn) && $board_reply_yn )
            $values['board_reply_yn'] = $board_reply_yn;
        if ( isset($board_reply_content) && $board_reply_content )
            $values['board_reply_content'] = $board_reply_content;

        if ( !$board_type )
            redirect('/');

        $result = HP_GET_BOARD_MODIFY($this->config->item('site_id'), $board_type, $board_type, $values);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '수정 되었습니다.');
            redirect('/admin/recruit/modify/'.$board_type.'/'.$board_seq);
        }
        else
            redirect('/admin/recruit/modify/'.$board_type.'/'.$board_seq);
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
            redirect('/admin/recruit');
        }
        else
            redirect('/admin/recruit');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */