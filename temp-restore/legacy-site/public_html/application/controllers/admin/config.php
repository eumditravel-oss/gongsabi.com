<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config extends CI_Controller {

    function __construct()
    {       
        parent::__construct();  

        if ( !$this->session->userdata('ADMIN_SESSION') )
            redirect('/admin/auth');
    }

    public function noti()
    {
        $data = array();

        $this->load->view('admin/_common/header');
        $this->load->view('admin/config/noti', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function noti_modify_proc()
    {
        $noti_contact_phone1    = $this->input->post('noti_contact_phone1');
        $noti_qna_phone1        = $this->input->post('noti_qna_phone1');
        $noti_qna_phone2        = $this->input->post('noti_qna_phone2');
        $noti_gongsabi_phone1   = $this->input->post('noti_gongsabi_phone1');
        $noti_gongsabi_phone2   = $this->input->post('noti_gongsabi_phone2');
        $noti_book_phone1       = $this->input->post('noti_book_phone1');
        $noti_book_phone2       = $this->input->post('noti_book_phone2');
        $noti_lecture_phone1    = $this->input->post('noti_lecture_phone1');
        $noti_lecture_phone2    = $this->input->post('noti_lecture_phone2');

        $values = array(
            'seq' => '1'
        );

        if ( isset($noti_contact_phone1) && $noti_contact_phone1 )
            $values['noti_contact_phone1'] = $noti_contact_phone1;
        if ( isset($noti_qna_phone1) && $noti_qna_phone1 )
            $values['noti_qna_phone1'] = $noti_qna_phone1;
        if ( isset($noti_qna_phone2) && $noti_qna_phone2 )
            $values['noti_qna_phone2'] = $noti_qna_phone2;
        if ( isset($noti_gongsabi_phone1) && $noti_gongsabi_phone1 )
            $values['noti_gongsabi_phone1'] = $noti_gongsabi_phone1;
        if ( isset($noti_gongsabi_phone2) && $noti_gongsabi_phone2 )
            $values['noti_gongsabi_phone2'] = $noti_gongsabi_phone2;
        if ( isset($noti_book_phone1) && $noti_book_phone1 )
            $values['noti_book_phone1'] = $noti_book_phone1;
        if ( isset($noti_book_phone2) && $noti_book_phone2 )
            $values['noti_book_phone2'] = $noti_book_phone2;
        if ( isset($noti_lecture_phone1) && $noti_lecture_phone1 )
            $values['noti_lecture_phone1'] = $noti_lecture_phone1;
        if ( isset($noti_lecture_phone2) && $noti_lecture_phone2 )
            $values['noti_lecture_phone2'] = $noti_lecture_phone2;
        
        $result = $this->config_model->modify_config($values);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '수정 되었습니다.');
            redirect('/admin/config/noti');
        }
        else
            redirect('/admin/config/noti');
    }

    // 강의
    public function lecture()
    {
        $data = array();

        $area = ( $this->input->get('area') ) ? $this->input->get('area') : '';

        $condition = array(
            'area' => $area,
            'keyword' => $this->input->get('keyword')
        );
        
        // 강의 리스트
        $lecture_list    = $this->lecture_model->get_lecture_list($condition);
        $lecture_count   = $this->lecture_model->get_lecture_count($condition);

        $board_data = array(
            'list' => $lecture_list,
            'count' => $lecture_count[0]->cnt
        );

        $data['condition'] = $condition;
        $data['board_title'] = '강의';
        $data['board_data'] = $board_data;
        $data['pagination'] = '';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/config/lecture/list', $data);
        $this->load->view('admin/_common/footer');
    }

    // 강의 등록
    public function lecture_regist()
    {
        $data = array();

        $data['board_title'] = '강의';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/config/lecture/regist', $data);
        $this->load->view('admin/_common/footer');      
    }

    // 강의 등록
    public function lecture_regist_proc()
    {
        $lecture_title          = trim($this->input->post('lecture_title'));
        $lecture_time           = trim($this->input->post('lecture_time'));
        $lecture_content        = trim($this->input->post('lecture_content'));
        $lecture_title_eng      = trim($this->input->post('lecture_title_eng'));
        $lecture_time_eng       = trim($this->input->post('lecture_time_eng'));
        $lecture_content_eng    = trim($this->input->post('lecture_content_eng'));

        $values = array(
            'lecture_title'         => $lecture_title,
            'lecture_time'          => $lecture_time,
            'lecture_content'       => $lecture_content,
            'lecture_title_eng'     => $lecture_title_eng,
            'lecture_time_eng'      => $lecture_time_eng,
            'lecture_content_eng'   => $lecture_content_eng,
            'lecture_ins_datetime'  => date('Y-m-d H:i:s', now()),
            'lecture_ins_user'      => $this->session->userdata('ADMIN_MEMBER')['admin_member_id']
        );

        $result = $this->lecture_model->regist_lecture($values);

        if ($result)
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '강의를 등록 하였습니다.');
            redirect('admin/config/lecture');
        }
        else
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '강의 등록이 실패 하였습니다.');
            redirect('admin/config/lecture/lecture_regist');
        }       
    }

    // 강의 수정
    public function lecture_modify($lecture_seq)
    {
        $data = array();

        $condition = array(
            'lecture_seq' => $lecture_seq,
        );
        
        // 강의 리스트
        $lecture_list    = $this->lecture_model->get_lecture_list($condition);
        $lecture_count   = $this->lecture_model->get_lecture_count($condition);

        $board_data = array(
            'list' => $lecture_list,
            'count' => $lecture_count[0]->cnt
        );

        if ($lecture_list)
        {
            $data['board_title'] = '강의';
            $data['board_data'] = $board_data;
        }
        else {
            go_page('등록된 강의가 없습니다.', '/admin/config/lecture');
        }

        $this->load->view('admin/_common/header');
        $this->load->view('admin/config/lecture/modify', $data);
        $this->load->view('admin/_common/footer');          
    }

    // 강의 수정 처리
    public function lecture_modify_proc()
    {
        $lecture_seq            = trim($this->input->post('lecture_seq'));
        $lecture_title          = trim($this->input->post('lecture_title'));
        $lecture_time           = trim($this->input->post('lecture_time'));
        $lecture_content        = trim($this->input->post('lecture_content'));
        $lecture_title_eng      = trim($this->input->post('lecture_title_eng'));
        $lecture_time_eng       = trim($this->input->post('lecture_time_eng'));
        $lecture_content_eng    = trim($this->input->post('lecture_content_eng'));

        $values = array(
            'lecture_seq'           => $lecture_seq,
            'lecture_title'         => $lecture_title,
            'lecture_time'          => $lecture_time,
            'lecture_content'       => $lecture_content,
            'lecture_title_eng'     => $lecture_title_eng,
            'lecture_time_eng'      => $lecture_time_eng,
            'lecture_content_eng'   => $lecture_content_eng,
            'lecture_upd_datetime'  => date('Y-m-d H:i:s', now()),
            'lecture_upd_user'      => $this->session->userdata('ADMIN_MEMBER')['admin_member_id']
        );

        $result = $this->lecture_model->modify_lecture($values);

        if ($result)
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '강의를 수정 하였습니다.');
            redirect('admin/config/lecture_modify/'.$lecture_seq);
        }
        else
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '강의 수정이 실패 하였습니다.');
            redirect('admin/config/lecture_modify/'.$lecture_seq);
        }           
    }

    public function lecture_order()
    {
        $list = $this->input->post('lecture_seq');

        if ( count($list) )
        {
            foreach ($list as $key => $seq) {
                $values = array(
                    'lecture_seq'           => $seq,
                    'lecture_order'         => $this->input->post('lecture_order')[$key],
                    'lecture_upd_datetime'  => date('Y-m-d H:i:s', now()),
                    'lecture_upd_user'      => $this->session->userdata('ADMIN_MEMBER')['admin_member_id']
                );

                $result = $this->lecture_model->modify_lecture($values);
            }
        }

        $this->session->set_flashdata('SESSION_MESSAGE', '정렬 순서를 저장했습니다.');
        redirect('admin/config/lecture');
    }

    public function lecture_delete($lecture_seq)
    {
        $condition = array(
            'lecture_seq' => $lecture_seq,
        );

        $values = array(
            'lecture_seq'           => $lecture_seq,
            'lecture_upd_datetime'  => date('Y-m-d H:i:s', now()),
            'lecture_upd_user'      => $this->session->userdata('ADMIN_MEMBER')['admin_member_id']
        );

        $result = $this->lecture_model->delete_lecture($values);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '삭제 되었습니다.');
            redirect('/admin/config/lecture');
        }
        else
            redirect('/admin/config/lecture');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */