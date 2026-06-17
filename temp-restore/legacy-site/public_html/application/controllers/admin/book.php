<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Controller {

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
        $data['board'] = 'book';
        $data['board_title'] = '교재 구매요청';
        $data['top_yn'] = false;
        $data['reply_yn'] = false;

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'book', 'book', $condition);
        $data['board_data'] = $board_data;

        $data['pagination'] = '';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/book/list', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function regist()
    {
        $data = array();

        $data['board'] = $board_type;
        $data['top_yn'] = false;
        $data['reply_yn'] = false;
        $data['board_title'] = '교재 구매요청';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/book/regist', $data);
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
            redirect('/admin/book/'.$board_type);
        }
        else
            redirect('/admin/book/'.$board_type);
    }

    public function modify($board_type, $board_seq)
    {
        $data = array();

        $data['board'] = $board_type;
        $data['top_yn'] = false;
        $data['reply_yn'] = false;
        $data['board_title'] = '교재 구매요청';

        $condition = array(
            'board_type'    => $board_type,
            'board_seq'     => $board_seq
        );

        $data['condition'] = $condition;

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), $board_type, $board_type, $condition);
        $data['board_data'] = $board_data;

        $pay_info = $this->pay_model->get_book_pay_list($condition);
        $data['pay_info'] = $pay_info[0];

        $this->load->view('admin/_common/header');
        $this->load->view('admin/book/modify', $data);
        $this->load->view('admin/_common/footer');  
    }

    public function modify_proc()
    {
        $board_seq          = $this->input->post('board_seq');
        $board_type         = $this->input->post('board_type');
        $board_category     = $this->input->post('board_category');
        $board_etc_3        = $this->input->post('board_etc_3');
        $board_etc_2        = $this->input->post('board_etc_2');
        $board_name         = $this->input->post('board_name');
        $board_company      = $this->input->post('board_company');
        $board_hp           = $this->input->post('board_hp');
        $board_email        = $this->input->post('board_email');
        $board_etc_1        = $this->input->post('board_etc_1');
        $board_etc_4        = $this->input->post('board_etc_4');
        $board_content      = $this->input->post('board_content');
        $board_etc_6        = $this->input->post('board_etc_6');
        $board_etc_7        = $this->input->post('board_etc_7');

        $values = array(
            'board_seq'         => $board_seq,
            'board_type'        => $board_type,
            'board_etc_3'       => $board_etc_3,
        );

        if ( isset($board_category) && $board_category )
            $values['board_category'] = $board_category;
        if ( isset($board_etc_2) && $board_etc_2 )
            $values['board_etc_2'] = $board_etc_2;
        if ( isset($board_name) && $board_name )
            $values['board_name'] = $board_name;
        if ( isset($board_company) && $board_company )
            $values['board_company'] = $board_company;
        if ( isset($board_hp) && $board_hp )
            $values['board_hp'] = $board_hp;
        if ( isset($board_email) && $board_email )
            $values['board_email'] = $board_email;
        if ( isset($board_etc_1) && $board_etc_1 )
            $values['board_etc_1'] = $board_etc_1;
        if ( isset($board_etc_4) && $board_etc_4 )
            $values['board_etc_4'] = $board_etc_4;
        if ( isset($board_content) && $board_content )
            $values['board_content'] = $board_content;
        if ( isset($board_etc_6) && $board_etc_6 )
            $values['board_etc_6'] = $board_etc_6;
        if ( isset($board_etc_7) && $board_etc_7 )
            $values['board_etc_7'] = $board_etc_7;

        if ( !$board_type )
            redirect('/');

        $result = HP_GET_BOARD_MODIFY($this->config->item('site_id'), $board_type, $board_type, $values);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '수정 되었습니다.');
            redirect('/admin/book/modify/'.$board_type.'/'.$board_seq);
        }
        else
            redirect('/admin/book/modify/'.$board_type.'/'.$board_seq);
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
            redirect('/admin/book/'.$board_type);
        }
        else
            redirect('/admin/book/'.$board_type);
    }

    // 교재 리뷰 관리
    public function review()
    {
        $data = array();

        $condition = array(
            'page' => $this->input->get('page'),
            'keyword' => $this->input->get('keyword'),
            'book_num' => $this->input->get('book_num')
        );

        $data['condition'] = $condition;
        $data['board'] = 'book';
        $data['board_title'] = '교재 리뷰';
        $data['top_yn'] = false;
        $data['reply_yn'] = false;

        $list = $this->review_model->get_book_review_list($condition);
        $count = $this->review_model->get_book_review_count($condition);
        $board_data = array(
            'list' => $list,
            'count' => $count[0]->cnt
        );
        $data['board_data'] = $board_data;

        $data['pagination'] = '';

        $this->load->view('admin/_common/header');
        $this->load->view('admin/book/review_list', $data);
        $this->load->view('admin/_common/footer');  
    }

    // 교재 리뷰 관리 - 삭제
    public function review_delete($review_seq)
    {
        
        $data = array();

        $condition = array(
            'review_seq' => $review_seq
        );

        $count = $this->review_model->get_book_review_count($condition);

        if ( $count[0]->cnt == 0 )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '해당 리뷰가 없습니다.');
            redirect('/admin/book/review');
        }
        else
        {
            $result = $this->review_model->delete_book_review($condition);

            if ( $result )
            {
                $this->session->set_flashdata('SESSION_MESSAGE', '삭제 하였습니다.');
                redirect('/admin/book/review');
            }
            else
            {
                $this->session->set_flashdata('SESSION_MESSAGE', '삭제 실패');
                redirect('/admin/book/review');
            }
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

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'book', 'book', $condition);

        $list = $board_data['list'];

        $filename = 'download_book_'.date('Ymdhi').'.xls';

        header('Content-Type: application/vnd.ms-excel; charset=utf-8');
        header('Expires: 0');
        header('Cache-Control: must-revalidate,post-check=0,pre-check=0');
        header('Pragma: public');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        
        print('<meta http-equiv="Content-Type" content="application/vnd.ms-excel; charset=utf-8">');

        $text = '<table>';

        $text .= '<tr>';
        $text .= '<th>주문상태</th>';
        $text .= '<th>책</th>';
        $text .= '<th>수량</th>';
        $text .= '<th>이름</th>';
        $text .= '<th>휴대폰번호</th>';
        $text .= '<th>등록일</th>';
        $text .= '<th>최종수정일</th>';
        $text .= '</tr>';

        if ( count($list) > 0 )
        {
            foreach ($list as $key => $item) {
                $text .= '<tr>';
                $text .= '<td>'.$this->config->item('ORDER_STATUS')[$item->board_etc_3]['name'].'</td>';
                $text .= '<td>'.$this->config->item('BOOK_LIST')[$item->board_category]['name'].'</td>';
                $text .= '<td>'.$item->board_etc_2.'</td>';
                $text .= '<td>'.$item->board_name.'</td>';
                $text .= '<td>'.$item->board_hp.'</td>';
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