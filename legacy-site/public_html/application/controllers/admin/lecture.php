<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lecture extends CI_Controller {

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
        $data['board'] = 'lecture';
        $data['board_title'] = '강의 요청';
        $data['top_yn'] = false;
        $data['reply_yn'] = false;

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'lecture', 'lecture', $condition);
        $data['board_data'] = $board_data;

        $data['pagination'] = '';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/lecture/list', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function regist()
    {
        $data = array();

        $data['board'] = $board_type;
        $data['top_yn'] = false;
        $data['reply_yn'] = false;
        $data['board_title'] = '강의 요청';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/lecture/regist', $data);
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
            redirect('/admin/lecture/'.$board_type);
        }
        else
            redirect('/admin/lecture/'.$board_type);
    }

    public function modify($board_type, $board_seq)
    {
        $data = array();

        $data['board'] = $board_type;
        $data['top_yn'] = false;
        $data['reply_yn'] = false;
        $data['board_title'] = '강의 요청';

        $condition = array(
            'board_type'    => $board_type,
            'board_seq'     => $board_seq
        );

        $data['condition'] = $condition;

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), $board_type, $board_type, $condition);
        $data['board_data'] = $board_data;

        $this->load->view('admin/_common/header');
        $this->load->view('admin/lecture/modify', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function modify_proc()
    {
        $board_seq      = $this->input->post('board_seq');
        $board_type     = $this->input->post('board_type');
        $board_top_yn   = $this->input->post('board_top_yn');
        $board_name     = $this->input->post('board_name');
        $board_email    = $this->input->post('board_email');
        $board_phone    = $this->input->post('board_phone');
        $board_password = $this->input->post('board_password');
        $board_title    = $this->input->post('board_title');
        $board_content  = $this->input->post('board_content');
        $board_reply_yn  = $this->input->post('board_reply_yn');
        $board_reply_content  = $this->input->post('board_reply_content');
        $board_etc_1  = $this->input->post('board_etc_1');
        $board_etc_2  = $this->input->post('board_etc_2');
        $board_etc_3  = $this->input->post('board_etc_3');

        $values = array(
            'board_seq'         => $board_seq,
            'board_type'        => $board_type,
            'board_title'       => $board_title,
            'board_content'     => $board_content
        );

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
        if ( isset($board_reply_yn) && $board_reply_yn )
            $values['board_reply_yn'] = $board_reply_yn;
        if ( isset($board_reply_content) && $board_reply_content )
            $values['board_reply_content'] = $board_reply_content;
        if ( isset($board_etc_1) && $board_etc_1 )
            $values['board_etc_1'] = $board_etc_1;
        if ( isset($board_etc_2) && $board_etc_2 )
            $values['board_etc_2'] = $board_etc_2;
        if ( isset($board_etc_3) && $board_etc_3 )
            $values['board_etc_3'] = $board_etc_3;

        if ( !$board_type )
            redirect('/');

        $result = HP_GET_BOARD_MODIFY($this->config->item('site_id'), $board_type, $board_type, $values);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '수정 되었습니다.');
            redirect('/admin/lecture/modify/'.$board_type.'/'.$board_seq);
        }
        else
            redirect('/admin/lecture/modify/'.$board_type.'/'.$board_seq);
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
            redirect('/admin/lecture/'.$board_type);
        }
        else
            redirect('/admin/lecture/'.$board_type);
    }

    public function teacher()
    {
        $data = array();

        $condition = array(
            'keyword' => $this->input->get('keyword'),
            'page' => $this->input->get('page')
        );

        $data['condition'] = $condition;

        $list = $this->lecture_model->get_lecture_teacher_list($condition);
        $count = $this->lecture_model->get_lecture_teacher_count($condition);

        $data['board_data'] = array(
            'list' => $list,
            'count' => $count[0]->cnt
        );

        unset($data['condition']['page']);

        $data['url_query'] = '/admin/lecture/teacher?'.http_build_query($data['condition']);

        $config['base_url']                 = $data['url_query'];
        $config['total_rows']               = $count[0]->cnt;
        $config['per_page']                 = 10;
        $config['page_query_string']        = true;
        $config['num_links']                = 5;
        $config['query_string_segment']     = 'page';

        $config['full_tag_open']    = '<ul class="pagination">';
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

        $data['board_data']['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/_common/header');
        $this->load->view('admin/lecture/teacher', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function teacher_regist()
    {
        $data = array();

        $this->load->view('admin/_common/header');
        $this->load->view('admin/lecture/teacher_regist', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function teacher_regist_proc()
    {
        $teacher_name       = $this->input->post('teacher_name');
        $teacher_desc       = $this->input->post('teacher_desc');
        $teacher_name_eng   = $this->input->post('teacher_name_eng');
        $teacher_desc_eng   = $this->input->post('teacher_desc_eng');

        $values = array(
            'teacher_name'      => $teacher_name,
            'teacher_desc'      => $teacher_desc,
            'teacher_name_eng'  => $teacher_name_eng,
            'teacher_desc_eng'  => $teacher_desc_eng,
            'ins_datetime'      => date('Y-m-d H:i:s'),
        );
        
        // 파일 업로드 디렉토리
        $upload_dir = $this->config->item('gongsabi_data_teacher_path');

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
    
        if ( $this->upload->do_upload('teacher_photo'))
        {
            $upload_image = $this->upload->data();

            $upload_image_name = $upload_image['file_name'];
            $upload_image_path = $upload_image['full_path'];

            $values['teacher_photo'] = $upload_image_name;
        }

        $result = $this->lecture_model->regist_lecture_teacher($values);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '등록 되었습니다.');
            redirect('/admin/lecture/teacher');
        }
        else
            redirect('/admin/lecture/teacher');
    }

    public function teacher_modify($teacher_seq)
    {
        $data = array();

        $condition = array(
            'teacher_seq' => $teacher_seq
        );

        $data['condition'] = $condition;

        $list = $this->lecture_model->get_lecture_teacher_list($condition);
        $count = $this->lecture_model->get_lecture_teacher_count($condition);

        $data['board_data'] = array(
            'list' => $list,
            'count' => $count[0]->cnt
        );

        $this->load->view('admin/_common/header');
        $this->load->view('admin/lecture/teacher_modify', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function teacher_modify_proc()
    {
        $teacher_seq        = $this->input->post('teacher_seq');
        $teacher_name       = $this->input->post('teacher_name');
        $teacher_desc       = $this->input->post('teacher_desc');
        $teacher_name_eng   = $this->input->post('teacher_name_eng');
        $teacher_desc_eng   = $this->input->post('teacher_desc_eng');

        $values = array(
            'teacher_seq'       => $teacher_seq,
            'teacher_name'      => $teacher_name,
            'teacher_desc'      => $teacher_desc,
            'teacher_name_eng'  => $teacher_name_eng,
            'teacher_desc_eng'  => $teacher_desc_eng,
            'upd_datetime'      => date('Y-m-d H:i:s'),
        );
        
        // 파일 업로드 디렉토리
        $upload_dir = $this->config->item('gongsabi_data_teacher_path');

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
    
        if ( $this->upload->do_upload('teacher_photo'))
        {
            $upload_image = $this->upload->data();

            $upload_image_name = $upload_image['file_name'];
            $upload_image_path = $upload_image['full_path'];

            $values['teacher_photo'] = $upload_image_name;
        }

        $result = $this->lecture_model->modify_lecture_teacher($values);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '수정 되었습니다.');

            redirect('/admin/lecture/teacher_modify/'.$teacher_seq);
        }
        else
            redirect('/admin/lecture/teacher_modify/'.$teacher_seq);
    }

    public function teacher_delete($teacher_seq)
    {
        $values = array(
            'teacher_seq'   => $teacher_seq,
            'upd_datetime'  => date('Y-m-d H:i:s'),
        );

        $result = $this->lecture_model->delete_lecture_teacher($values);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '삭제 되었습니다.');
            redirect('/admin/lecture/teacher');
        }
        else
            redirect('/admin/lecture/teacher');
    }

    public function lecture_table_modify()
    {
        $data = array();

        $this->load->view('admin/_common/header');
        $this->load->view('admin/lecture/lecture_table_modify', $data);
        $this->load->view('admin/_common/footer'); 
    }

    public function lecture_table_modify_proc()
    {        
        // 파일 업로드 디렉토리
        $upload_dir = $this->config->item('gongsabi_data_lecture_table_path');

        if ( !is_dir($upload_dir) ) {
            @mkdir($upload_dir, 0777, TRUE);
        }

        $upload_file_name = $_FILES['lecture_table']['name'];
        $_upload_file_ext = explode('.', $upload_file_name);
        $upload_file_ext = $_upload_file_ext[count($_upload_file_ext) - 1];

        $config['upload_path'] = $upload_dir;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['overwrite'] = true;
        // $config['file_name'] = 'lecture_table.'.$upload_file_ext;
        $config['file_name'] = 'lecture_table.jpg';
        
        $this->load->library('upload', $config);
    
        if ( $this->upload->do_upload('lecture_table'))
        {
            $upload_image = $this->upload->data();

            $this->session->set_flashdata('SESSION_MESSAGE', '수정 되었습니다.');
            redirect('/admin/lecture/lecture_table_modify');
        }
        else
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '수정 실패 : '.$this->upload->display_errors('', ''));
            redirect('/admin/lecture/lecture_table_modify');
        }
    }

    // 다운로드
    public function download()
    {
        $keyword        = trim($this->input->post('keyword'));

        $condition = array(
            'keyword'        => $keyword,
            'limit'          => 100000
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'lecture', 'lecture', $condition);

        $list = $board_data['list'];

        $filename = 'download_lecture_'.date('Ymdhi').'.xls';

        header('Content-Type: application/vnd.ms-excel; charset=utf-8');
        header('Expires: 0');
        header('Cache-Control: must-revalidate,post-check=0,pre-check=0');
        header('Pragma: public');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        
        print('<meta http-equiv="Content-Type" content="application/vnd.ms-excel; charset=utf-8">');

        $text = '<table>';

        $text .= '<tr>';
        $text .= '<th>상태</th>';
        $text .= '<th>교육과정</th>';
        $text .= '<th>참석날짜</th>';
        $text .= '<th>참석인원</th>';
        $text .= '<th>회사</th>';
        $text .= '<th>이름</th>';
        $text .= '<th>등록일</th>';
        $text .= '<th>최종수정일</th>';
        $text .= '</tr>';

        if ( count($list) > 0 )
        {
            foreach ($list as $key => $item) {
                $text .= '<tr>';
                $text .= '<td>'.$this->config->item('LECTURE_STATUS')[$item->board_etc_3]['name'].'</td>';
                $text .= '<td>'.HP_GET_LECTURE_TEXT($item->board_category).'</td>';
                $text .= '<td>'.$item->board_etc_1.'</td>';
                $text .= '<td>'.$item->board_etc_2.'</td>';
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