<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partners extends CI_Controller {

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
        $data['board'] = 'partners';
        $data['board_title'] = 'Partners';
        $data['top_yn'] = false;
        $data['reply_yn'] = false;

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'partners', 'partners', $condition);
        $data['board_data'] = $board_data;

        $data['pagination'] = '';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/partners/list', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function regist()
    {
        $data = array();

        $data['board'] = 'partners';
        $data['top_yn'] = false;
        $data['reply_yn'] = false;
        $data['board_title'] = 'Partners';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/partners/regist', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function regist_proc()
    {
        $ins_datetime   = $this->input->post('ins_datetime');
        $board_category = $this->input->post('board_category');
        $board_type     = $this->input->post('board_type');
        $board_title    = $this->input->post('board_title');
        $board_link     = $this->input->post('board_link');

        $values = array(
            'board_category'    => $board_category,
            'board_type'        => $board_type,
            'board_title'       => $board_title,
            'board_link'        => $board_link
        );

        if ( isset($ins_datetime) && $ins_datetime )
            $values['ins_datetime'] = $ins_datetime.' 00:00:00';
        
        // 파일 업로드 디렉토리
        $upload_dir = $this->config->item('gongsabi_data_partners_path');

        if ( !is_dir($upload_dir) ) {
            @mkdir($upload_dir, 0777, TRUE);
        }

        $config['upload_path'] = $upload_dir;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '0';
        $config['max_width']  = '0';
        $config['max_height']  = '0';
        
        $this->load->library('upload', $config);
    
        if ( $this->upload->do_upload('board_image'))
        {
            $upload_image = $this->upload->data();

            $upload_image_name = $upload_image['file_name'];
            $upload_image_path = $upload_image['full_path'];

            $values['board_image'] = $upload_image_name;
        }

        if ( !$board_type )
            redirect('/');

        $result = HP_GET_BOARD_REGIST($this->config->item('site_id'), $board_type, $board_type, $values);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '등록 되었습니다.');
            redirect('/admin/partners');
        }
        else
            redirect('/admin/partners');
    }

    public function modify($board_seq)
    {
        $data = array();

        $board_type = 'partners';

        $data['board_type'] = $board_type;
        $data['top_yn'] = false;
        $data['reply_yn'] = false;
        $data['board_title'] = 'Partners';

        $condition = array(
            'board_type'    => $board_type,
            'board_seq'     => $board_seq
        );

        $data['condition'] = $condition;

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), $board_type, $board_type, $condition);
        $data['board_data'] = $board_data;

        $this->load->view('admin/_common/header');
        $this->load->view('admin/partners/modify', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function modify_proc()
    {
        $board_seq      = $this->input->post('board_seq');
        $upd_datetime   = $this->input->post('upd_datetime');
        $board_category = $this->input->post('board_category');
        $board_type     = $this->input->post('board_type');
        $board_title    = $this->input->post('board_title');
        $board_link     = $this->input->post('board_link');

        $values = array(
            'board_seq'         => $board_seq,
            'board_category'    => $board_category,
            'board_type'        => $board_type,
            'board_title'       => $board_title,
            'board_link'        => $board_link
        );

        if ( isset($upd_datetime) && $upd_datetime )
            $values['upd_datetime'] = $upd_datetime.' 00:00:00';
        
        // 파일 업로드 디렉토리
        $upload_dir = $this->config->item('gongsabi_data_partners_path');

        if ( !is_dir($upload_dir) ) {
            @mkdir($upload_dir, 0777, TRUE);
        }

        $config['upload_path'] = $upload_dir;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '0';
        $config['max_width']  = '0';
        $config['max_height']  = '0';
        
        $this->load->library('upload', $config);
    
        if ( $this->upload->do_upload('board_image'))
        {
            $upload_image = $this->upload->data();

            $upload_image_name = $upload_image['file_name'];
            $upload_image_path = $upload_image['full_path'];

            $values['board_image'] = $upload_image_name;
        }

        if ( !$board_type )
            redirect('/');

        $result = HP_GET_BOARD_MODIFY($this->config->item('site_id'), $board_type, $board_type, $values);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '수정 되었습니다.');

            redirect('/admin/partners/modify/'.$board_seq);
        }
        else
            redirect('/admin/partners/modify/'.$board_seq);
    }

    public function delete($board_seq)
    {
        $board_type = 'partners';

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
            redirect('/admin/partners');
        }
        else
            redirect('/admin/partners');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */