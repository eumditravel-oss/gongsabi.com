<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Board extends CI_Controller {

    function __construct()
    {       
        parent::__construct();  

        if ( !$this->session->userdata('ADMIN_SESSION') )
        	redirect('/admin/auth');
    }

    public function notice()
    {
		$data = array();

        $keyword    = ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '';
        $page       = $this->input->get('page');

        $condition = array(
            'keyword' => $keyword,
            'page' => $page
        );

        $data['condition'] = $condition;
        $data['board'] = 'notice';
        $data['board_title'] = '공지사항';
        $data['top_yn'] = false;
        $data['reply_yn'] = false;

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'notice', 'notice', $condition);
        $data['board_data'] = $board_data;

        $data['pagination'] = '';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/board/list', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function pds()
    {
        $data = array();

        $keyword    = ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '';
        $page       = $this->input->get('page');

        $condition = array(
            'keyword' => $keyword,
            'page' => $page
        );

        $data['condition'] = $condition;
        $data['board'] = 'pds';
        $data['board_title'] = '자료실';
        $data['top_yn'] = false;
        $data['reply_yn'] = false;

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'pds', 'pds', $condition);
        $data['board_data'] = $board_data;

        $data['pagination'] = '';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/board/list', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function faq()
    {
        $data = array();

        $keyword    = ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '';
        $page       = $this->input->get('page');

        $condition = array(
            'keyword' => $keyword,
            'page' => $page
        );

        $data['condition'] = $condition;
        $data['board'] = 'faq';
        $data['board_title'] = 'FAQ';
        $data['top_yn'] = false;
        $data['reply_yn'] = false;

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'faq', 'faq', $condition);
        $data['board_data'] = $board_data;

        $data['pagination'] = '';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/board/list', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function qna()
    {
		$data = array();

        $keyword    = ( $this->input->get('keyword') ) ? $this->input->get('keyword') : '';
        $page       = $this->input->get('page');

        $condition = array(
            'keyword' => $keyword,
            'page' => $page
        );

        $data['condition'] = $condition;
        $data['board'] = 'qna';
        $data['board_title'] = 'QNA';
        $data['top_yn'] = false;
        $data['reply_yn'] = true;

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'qna', 'qna', $condition);
        $data['board_data'] = $board_data;

        $data['pagination'] = '';

        $this->load->view('admin/_common/header');
		$this->load->view('admin/board/list', $data);
		$this->load->view('admin/_common/footer');	
    }

    public function regist($board_type)
    {
        $data = array();

        $data['board'] = $board_type;
        switch ($board_type) {
            case 'notice':
                $board_title = '공지사항';
                $data['top_yn'] = false;
                $data['reply_yn'] = false;
                $data['image_yn'] = true;
                $data['file_yn'] = true;
                break;
            case 'pds':
                $board_title = '자료실';
                $data['top_yn'] = false;
                $data['reply_yn'] = false;
                $data['image_yn'] = false;
                $data['file_yn'] = true;
                break;
            case 'qna':
                $board_title = 'QNA';
                $data['top_yn'] = false;
                $data['reply_yn'] = true;
                $data['image_yn'] = false;
                $data['file_yn'] = false;
                break;
            case 'faq':
                $board_title = 'FAQ';
                $data['top_yn'] = false;
                $data['reply_yn'] = true;
                $data['image_yn'] = false;
                $data['file_yn'] = false;
                break;
        }
        $data['board_title'] = $board_title;

        $this->load->view('admin/_common/header');
        $this->load->view('admin/board/regist', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function regist_proc()
    {
        $ins_datetime   = $this->input->post('ins_datetime');
        $board_type     = $this->input->post('board_type');
        $board_category = $this->input->post('board_category');
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
        if ( isset($board_category) && $board_category )
            $values['board_category'] = $board_category;
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

        // 파일 업로드 디렉토리
        $upload_dir = $this->config->item('gongsabi_data_board_path');

        if ( !is_dir($upload_dir) ) {
            @mkdir($upload_dir, 0777, TRUE);
        }

        $config['upload_path']      = $upload_dir;
        $config['allowed_types']    = 'gif|jpg|jpeg|png|xls|xlsx|doc|docx|ppt|pptx|pdf|hwp|txt';
        $config['encrypt_name']     = TRUE;
        
        $this->load->library('upload', $config);
    
        if ( $this->upload->do_upload('board_image'))
        {
            $upload_board_image = $this->upload->data();

            $upload_board_image_name = $upload_board_image['file_name'];
            $upload_board_image_orig = $upload_board_image['orig_name'];
            $upload_board_image_path = $upload_board_image['full_path'];

            $values['board_image'] = $upload_board_image_name.'|'.$upload_board_image_orig;
        }
    
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

        $result = HP_GET_BOARD_REGIST($this->config->item('site_id'), $board_type, $board_type, $values);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '등록 되었습니다.');
            redirect('/admin/board/'.$board_type);
        }
        else
            redirect('/admin/board/'.$board_type);
    }

    public function modify($board_type, $board_seq)
    {
        $data = array();

        $data['board'] = $board_type;
        switch ($board_type) {
            case 'notice':
                $board_title = '공지사항';
                $data['top_yn'] = false;
                $data['reply_yn'] = false;
                $data['image_yn'] = true;
                $data['file_yn'] = true;
                break;
            case 'pds':
                $board_title = '자료실';
                $data['top_yn'] = false;
                $data['reply_yn'] = false;
                $data['image_yn'] = false;
                $data['file_yn'] = true;
                break;
            case 'qna':
                $board_title = 'QNA';
                $data['top_yn'] = false;
                $data['reply_yn'] = true;
                $data['image_yn'] = false;
                $data['file_yn'] = false;
                break;
            case 'faq':
                $board_title = 'FAQ';
                $data['top_yn'] = false;
                $data['reply_yn'] = true;
                $data['image_yn'] = false;
                $data['file_yn'] = false;
                break;
            case 'recruit':
                $board_title = '구인/구직';
                $data['top_yn'] = false;
                $data['reply_yn'] = false;
                $data['image_yn'] = false;
                $data['file_yn'] = true;
                break;
            default:
                $board_title = '';
                $data['top_yn'] = false;
                $data['reply_yn'] = false;
                $data['image_yn'] = false;
                $data['file_yn'] = true;
                break;
        }
        $data['board_title'] = $board_title;

        $condition = array(
            'board_type'    => $board_type,
            'board_seq'     => $board_seq
        );

        $data['condition'] = $condition;

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), $board_type, $board_type, $condition);
        $data['board_data'] = $board_data;

        $this->load->view('admin/_common/header');
        $this->load->view('admin/board/modify', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function modify_proc()
    {
        $board_seq      = $this->input->post('board_seq');
        $board_type     = $this->input->post('board_type');
        $board_category = $this->input->post('board_category');
        $board_top_yn   = $this->input->post('board_top_yn');
        $board_name     = $this->input->post('board_name');
        $board_company  = $this->input->post('board_company');
        $board_hp       = $this->input->post('board_hp');
        $board_email    = $this->input->post('board_email');
        $board_phone    = $this->input->post('board_phone');
        $board_password = $this->input->post('board_password');
        $board_title    = $this->input->post('board_title');
        $board_content  = $this->input->post('board_content');
        $board_reply_yn  = $this->input->post('board_reply_yn');
        $board_reply_content  = $this->input->post('board_reply_content');

        $values = array(
            'board_seq'         => $board_seq,
            'board_type'        => $board_type,
            'board_title'       => $board_title,
            'board_content'     => $board_content
        );

        if ( isset($board_category) && $board_category )
            $values['board_category'] = $board_category;
        if ( isset($board_top_yn) && $board_top_yn )
            $values['board_top_yn'] = $board_top_yn;
        if ( isset($board_company) && $board_company )
            $values['board_company'] = $board_company;
        if ( isset($board_hp) && $board_hp )
            $values['board_hp'] = $board_hp;
        if ( isset($board_name) && $board_name )
            $values['board_name'] = $board_name;
        if ( isset($board_email) && $board_email )
            $values['board_email'] = $board_email;
        if ( isset($board_phone) && $board_phone )
            $values['board_phone'] = $board_phone;
        if ( isset($board_password) && $board_password )
            $values['board_password'] = $board_password;
        if ( isset($board_reply_yn) && $board_reply_yn )
            $values['board_reply_yn'] = $board_reply_yn;
        if ( isset($board_reply_content) && $board_reply_content )
            $values['board_reply_content'] = $board_reply_content;    

        // 파일 업로드 디렉토리
        $upload_dir = $this->config->item('gongsabi_data_board_path');

        if ( !is_dir($upload_dir) ) {
            @mkdir($upload_dir, 0777, TRUE);
        }

        $config['upload_path']      = $upload_dir;
        $config['allowed_types']    = 'gif|jpg|jpeg|png|xls|xlsx|doc|docx|ppt|pptx|pdf|hwp|txt';
        $config['encrypt_name']     = TRUE;
        
        $this->load->library('upload', $config);
    
        if ( $this->upload->do_upload('board_image'))
        {
            $upload_board_image = $this->upload->data();

            $upload_board_image_name = $upload_board_image['file_name'];
            $upload_board_image_orig = $upload_board_image['orig_name'];
            $upload_board_image_path = $upload_board_image['full_path'];

            $size = 500;

            list($w, $h) = getimagesize($upload_board_image_path);

            if ( $w > $size )
            {
                $config = array(
                    'image_library' => 'gd2',
                    'quality'       => '100%',
                    'source_image'  => $upload_board_image_path,
                    'new_image'     => $upload_board_image_path,
                    'maintain_ratio'=> TRUE,   
                    'master_dim'    => 'width',
                    'width'         => $size,
                    'height'        => $size
                );

                $this->image_lib->clear();
                $this->image_lib->initialize($config);

                if ( !$this->image_lib->resize() ) {
                    $this->session->set_flashdata('SESSION_MESSAGE', $this->image_lib->display_errors());
                    redirect('/admin/board/'.$board_type);
                    exit;
                }      
            }

            $values['board_image'] = $upload_board_image_name.'|'.$upload_board_image_orig;
        }
    
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
            redirect('/admin/board/modify/'.$board_type.'/'.$board_seq);
        }
        else
            redirect('/admin/board/modify/'.$board_type.'/'.$board_seq);
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
            redirect('/admin/board/'.$board_type);
        }
        else
            redirect('/admin/board/'.$board_type);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */