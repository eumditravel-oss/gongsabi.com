<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// https://github.com/iamport/iamport-rest-client-php
include APPPATH . 'third_party/iamport.php';

class Education extends CI_Controller {

    public function index()
    {
    	$data = array();

        $banner_list = $this->banner_model->get_banner_list(array(
            'area' => 'education'
        ));
        $data['banner_list'] = $banner_list;

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['child']['youtube'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/education/main_eng', $data);
        else
            $this->load->view('front/education/main', $data);
		$this->load->view('front/_common/new_footer');
    }

	public function youtube()
	{
        $data = array();

        $condition = array(
            'page' => ( $this->input->get('page') ) ? $this->input->get('page') : 0,
            'keyword' => ( $this->input->get('keyword') ) ? $this->input->get('keyword') : ''
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'youtube', 'youtube', $condition);

        $data['condition'] = $condition;

        unset($data['condition']['page']);

        $data['url_query'] = '/front/education/youtube?'.http_build_query($data['condition']);

        $config['base_url']                 = $data['url_query'];
        $config['total_rows']               = $board_data['count'];
        $config['per_page']                 = (int)$this->config->item('paging_limit');
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

        $data['pagination'] = $this->pagination->create_links();

        $data['board_data'] = $board_data;

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['child']['youtube'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/education/youtube_eng', $data);
        else
            $this->load->view('front/education/youtube', $data);
		$this->load->view('front/_common/new_footer');
	}

	public function book()
	{
		$data = array();

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['child']['book'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/education/book_eng', $data);
        else
            $this->load->view('front/education/book', $data);
		$this->load->view('front/_common/new_footer');		
	}

    public function book_info()
    {
        $data = array();

        $tab = ( $this->input->get('tab') ) ? $this->input->get('tab') : 'buy';

        $selected_book = ( $this->input->get('num') ) ? $this->input->get('num') : '1';
        $data['selected_book'] = $selected_book;

        $order_by = ( $this->input->get('order_by') ) ? $this->input->get('order_by') : 'new';

        $condition = array(
            'book_num' => $selected_book,
            'order_by' => $order_by,
        );

        $review_list = $this->review_model->get_book_review_list($condition);
        $review_count = $this->review_model->get_book_review_count($condition);

        $data['review_list'] = $review_list;
        $data['review_count'] = $review_count[0]->cnt;

        $condition = array(
            'book_num' => $selected_book
        );

        $summary = $this->review_model->get_book_review_summary($condition);

        $count5 = 0;
        $count4 = 0;
        $count3 = 0;
        $count2 = 0;
        $count1 = 0;
        $total_count = 0;

        foreach ($summary as $score) {
            switch ( (int)$score->review_score ) {
                case 5:
                    $count5 = (int)$score->count;
                    break;
                case 4:
                    $count4 = (int)$score->count;
                    break;
                case 3:
                    $count3 = (int)$score->count;
                    break;
                case 2:
                    $count2 = (int)$score->count;
                    break;
                case 1:
                    $count1 = (int)$score->count;
                    break;
            }

            $total_count += (int)$score->count;
        }

        $data['review_summary_count'] = array(
            'score5' => ( $total_count > 0 ) ? round( ( $count5 / $total_count ) * 100 ) : 0,
            'score4' => ( $total_count > 0 ) ? round( ( $count4 / $total_count ) * 100 ) : 0,
            'score3' => ( $total_count > 0 ) ? round( ( $count3 / $total_count ) * 100 ) : 0,
            'score2' => ( $total_count > 0 ) ? round( ( $count2 / $total_count ) * 100 ) : 0,
            'score1' => ( $total_count > 0 ) ? round( ( $count1 / $total_count ) * 100 ) : 0,
        );

        $review_sum = ( ( $count5 * 10.0 ) + ( $count4 * 8.0 ) + ( $count3 * 6.0 ) + ( $count2 * 4.0 ) + ( $count1 * 2.0 ) );
        $review_avarage = ( $total_count > 0 ) ? $review_sum / $total_count : 0;

        $data['review_avarage'] = sprintf('%0.1f', $review_avarage);

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['child']['book'];

        $data['tab'] = $tab;
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/education/book_info_eng', $data);
        else
            $this->load->view('front/education/book_info', $data);
        $this->load->view('front/_common/new_footer');      
    }

    public function book_order()
    {
        $data = array();

        $selected_book = ( $this->input->get('num') ) ? $this->input->get('num') : '1';
        $data['selected_book'] = $selected_book;

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['child']['book'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
        $this->load->view('front/education/book_order', $data);
        $this->load->view('front/_common/new_footer');      
    }

    public function book_review_info()
    {
        $review_seq         = $this->input->post('review_seq');

        $condition = array(
            'review_seq' => $review_seq
        );

        $review_list = $this->review_model->get_book_review_list($condition);
        $review_count = $this->review_model->get_book_review_count($condition);

        if ( $review_count[0]->cnt == 0 )
        {
            $return = array(
                'result' => false,
                'resultMessage' => '해당 리뷰가 없습니다.'
            );
        }
        else
        {
            $return = array(
                'result' => true,
                'resultMessage' => '',
                'data' => $review_list[0]
            );
        }

        return_json($return);
    }

    // 공사비 교육 - 교재 구매 처리
    public function book_review_regist_proc()
    {   
        $book_num           = $this->input->post('book_num');
        $mode               = $this->input->post('mode');
        $review_score       = $this->input->post('review_score');
        $review_comment     = $this->input->post('review_comment');

        $condition = array(
            'board_db' => 'book',
            'board_category' => $book_num,
            'ins_user' => $this->session->userdata('MEMBER')['member_id'],
        );

        $count = $this->board_model->get_board_count($condition)[0]->cnt;

        if ( $count == 0 )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '해당 교재를 구매한 이력이 없습니다.');
            redirect('/front/education/book_info?tab=review&num='.$book_num);
        }
        else
        {
            $condition = array(
                'book_num' => $book_num,
                'ins_user' => $this->session->userdata('MEMBER')['member_id'],
            );

            $count = $this->review_model->get_book_review_count($condition)[0]->cnt;

            if ( $count == 0 )
            {
                $values = array(
                    'book_num'          => $book_num,
                    'review_score'      => $review_score,
                    'review_comment'    => $review_comment,
                    'ins_user'          => $this->session->userdata('MEMBER')['member_id'],
                    'ins_datetime'      => date('Y-m-d H:i:s'),
                );

                $result = $this->review_model->regist_book_review($values);

                if ( $result )
                {
                    $this->session->set_flashdata('SESSION_MESSAGE', '등록 되었습니다.');
                    redirect('/front/education/book_info?tab=review&num='.$book_num);
                }
                else
                {
                    $this->session->set_flashdata('SESSION_MESSAGE', '리뷰 등록 실패');
                    redirect('/front/education/book_info?tab=review&num='.$book_num);
                }
            }
            else
            {
                $this->session->set_flashdata('SESSION_MESSAGE', '이미 해당 교재에 리뷰를 등록 하였습니다.');
                redirect('/front/education/book_info?tab=review&num='.$book_num);
            }
        }
    }

    public function book_review_modify_proc()
    {   
        $review_seq         = $this->input->post('review_seq');
        $review_score       = $this->input->post('review_score');
        $review_comment     = $this->input->post('review_comment');

        $condition = array(
            'review_seq'        => $review_seq,
            'review_score'      => $review_score,
            'review_comment'    => $review_comment,
            'upd_user'          => $this->session->userdata('MEMBER')['member_id'],
            'upd_datetime'      => date('Y-m-d H:i:s'),
        );

        $result = $this->review_model->modify_book_review($condition);

        if ( $result )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '수정 되었습니다.');
            redirect('/front/education/book_info?num='.$book_num);
        }
        else
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '리뷰 수정 실패');
            redirect('/front/education/book_info?num='.$book_num);
        }
    }

    public function book_review_delete_proc()
    {   
        $review_seq = $this->input->post('review_seq');

        $condition = array(
            'review_seq' => $review_seq
        );

        $result = $this->review_model->delete_book_review($condition);

        if ( $result )
        {
            $return = array(
                'result' => true,
                'resultMessage' => '리뷰 삭제 성공',
            );
        }
        else
        {
            $return = array(
                'result' => false,
                'resultMessage' => '리뷰 삭제 실패',
            );
        }

        return_json($return);
    }

	public function book_order_proc()
	{		
        $board_type     	= 'book';
        $board_category  	= $this->input->post('board_category');
        $board_company  	= $this->input->post('board_company');
        $board_name     	= $this->input->post('board_name');
        $board_email    	= $this->input->post('board_email');
        $board_hp    		= $this->input->post('board_hp');
        // 배송메시지
        $board_content  	= $this->input->post('board_content');
        // 배송주소
        $board_etc_1  		= $this->input->post('board_etc_1');
        // 수량
        $board_etc_2  		= $this->input->post('board_etc_2');
        // 결제 결과
        $board_etc_3  		= $this->input->post('board_etc_3');
        // 배송주소 상세주소
        $board_etc_4  		= $this->input->post('board_etc_4');
        $board_etc_5  		= $this->input->post('board_etc_5');
        // 웹/모바일
        $is_mobile          = $this->input->post('is_mobile');

        $values = array(
            'board_type'        => $board_type,
            'board_content'     => $board_content,
            'ins_user'			=> $this->session->userdata('MEMBER')['member_id']
        );

        if ( isset($board_category) && $board_category )
            $values['board_category'] = explode('|', $board_category)[0];
        if ( isset($board_company) && $board_company )
            $values['board_company'] = $board_company;
        if ( isset($board_name) && $board_name )
            $values['board_name'] = $board_name;
        if ( isset($board_email) && $board_email )
            $values['board_email'] = $board_email;
        if ( isset($board_hp) && $board_hp )
            $values['board_hp'] = $board_hp;
        if ( isset($board_etc_1) && $board_etc_1 )
            $values['board_etc_1'] = $board_etc_1;
        if ( isset($board_etc_2) && $board_etc_2 )
            $values['board_etc_2'] = $board_etc_2;
        if ( isset($board_etc_3) && $board_etc_3 )
            $values['board_etc_3'] = $board_etc_3;
        if ( isset($board_etc_4) && $board_etc_4 )
            $values['board_etc_4'] = $board_etc_4;
        if ( isset($board_etc_5) && $board_etc_5 )
            $values['board_etc_5'] = $board_etc_5;
        if ( isset($is_mobile) && $is_mobile )
            $values['board_etc_8'] = $is_mobile;

        if ( !$board_type )
            redirect('/');

        $result = HP_GET_BOARD_REGIST($this->config->item('site_id'), $board_type, $board_type, $values);

        if ( $result )
        {
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

            $bank_list              = $this->input->post('bank_list');
            $bank_account           = $this->input->post('bank_account');
            $bank_account_name      = $this->input->post('bank_account_name');
            $bank_date              = $this->input->post('bank_date');
            $refund_list            = $this->input->post('refund_list');
            $refund_account         = $this->input->post('refund_account');
            $refund_account_name    = $this->input->post('refund_account_name');

            $pay_values = array(
                'board_seq'             => $result,
                'imp_uid'               => $imp_uid,
                'merchant_uid'          => $merchant_uid,
                'pay_method'            => $pay_method,
                'paid_amount'           => $paid_amount,
                'status'                => $status,
                'apply_num'             => $apply_num,
                'vbank_num'             => $vbank_num,
                'vbank_name'            => $vbank_name,
                'vbank_holder'          => $vbank_holder,
                'vbank_date'            => $vbank_date,
                'bank_list'             => $bank_list,
                'bank_account'          => $bank_account,
                'bank_account_name'     => $bank_account_name,
                'bank_date'             => $bank_date,
                'refund_list'           => $refund_list,
                'refund_account'        => $refund_account,
                'refund_account_name'   => $refund_account_name,
                'ins_user'              => $this->session->userdata('MEMBER')['member_id'],
                'ins_datetime'          => date('Y-m-d H:i:s')
            );

            $pay_result = $this->pay_model->regist_book_pay($pay_values);

            if ( $pay_result )
            {       
                // 결제완료 시         
                if ( $status == 'paid' )
                {
                    $modify = array(
                        'board_seq'     => $board_seq,
                        // 결제 결과
                        'board_etc_3'   => '2',
                    );

                    $modify_result = HP_GET_BOARD_MODIFY($this->config->item('site_id'), 'book', 'book', $modify);
                }

                // NOTI 발송
                if ( !$this->config->item('is_test_mode') )
                    SEND_NOTI('book');

                $this->session->set_flashdata('SESSION_MESSAGE', '등록 되었습니다.');
                redirect('/front/education/book_complete/'.$result);
            }
            else
            {
                $this->session->set_flashdata('SESSION_MESSAGE', '결제 정보 등록 실패');
                redirect('/front/education/book');
            }
        }
        else
            redirect('/front/education/book');
	}

    public function temp_book_order_proc()
    {       
        // 주문번호 생성
        $merchant_uid = time();

        $board_type         = 'book';
        $board_category     = $this->input->post('board_category');
        $board_company      = $this->input->post('board_company');
        $board_name         = $this->input->post('board_name');
        $board_email        = $this->input->post('board_email');
        $board_hp           = $this->input->post('board_hp');
        // 배송메시지
        $board_content      = $this->input->post('board_content');
        // 배송주소
        $board_etc_1        = $this->input->post('board_etc_1');
        // 수량
        $board_etc_2        = $this->input->post('board_etc_2');
        // 결제 결과
        $board_etc_3        = $this->input->post('board_etc_3');
        // 배송주소 상세주소
        $board_etc_4        = $this->input->post('board_etc_4');
        $board_etc_5        = $this->input->post('board_etc_5');
        // 웹/모바일
        $is_mobile          = $this->input->post('is_mobile');

        $values = array(
            'board_type'        => $board_type,
            'board_content'     => $board_content,
            'ins_user'          => $this->session->userdata('MEMBER')['member_id']
        );

        if ( isset($board_category) && $board_category )
            $values['board_category'] = explode('|', $board_category)[0];
        if ( isset($board_company) && $board_company )
            $values['board_company'] = $board_company;
        if ( isset($board_name) && $board_name )
            $values['board_name'] = $board_name;
        if ( isset($board_email) && $board_email )
            $values['board_email'] = $board_email;
        if ( isset($board_hp) && $board_hp )
            $values['board_hp'] = $board_hp;
        if ( isset($board_etc_1) && $board_etc_1 )
            $values['board_etc_1'] = $board_etc_1;
        if ( isset($board_etc_2) && $board_etc_2 )
            $values['board_etc_2'] = $board_etc_2;
        if ( isset($board_etc_3) && $board_etc_3 )
            $values['board_etc_3'] = $board_etc_3;
        if ( isset($board_etc_4) && $board_etc_4 )
            $values['board_etc_4'] = $board_etc_4;
        if ( isset($board_etc_5) && $board_etc_5 )
            $values['board_etc_5'] = $board_etc_5;
        if ( isset($is_mobile) && $is_mobile )
            $values['board_etc_8'] = $is_mobile;

        // 주문번호
        $values['board_etc_10'] = $merchant_uid;

        if ( !$board_type )
            redirect('/');

        $board_seq = HP_GET_BOARD_REGIST($this->config->item('site_id'), $board_type, $board_type, $values);

        if ( $board_seq )
        {            
            $imp_uid        = $this->input->post('imp_uid');
            $merchant_uid   = $merchant_uid;
            $pay_method     = $this->input->post('pay_method');
            $paid_amount    = $this->input->post('paid_amount');
            $status         = 'ready';
            $apply_num      = $this->input->post('apply_num');
            $vbank_num      = $this->input->post('vbank_num');
            $vbank_name     = $this->input->post('vbank_name');
            $vbank_holder   = $this->input->post('vbank_holder');
            $vbank_date     = $this->input->post('vbank_date');

            $bank_list              = $this->input->post('bank_list');
            $bank_account           = $this->input->post('bank_account');
            $bank_account_name      = $this->input->post('bank_account_name');
            $bank_date              = $this->input->post('bank_date');
            $refund_list            = $this->input->post('refund_list');
            $refund_account         = $this->input->post('refund_account');
            $refund_account_name    = $this->input->post('refund_account_name');

            $pay_values = array(
                'board_seq'             => $board_seq,
                'imp_uid'               => $imp_uid,
                'merchant_uid'          => $merchant_uid,
                'pay_method'            => $pay_method,
                'paid_amount'           => $paid_amount,
                'status'                => $status,
                'apply_num'             => $apply_num,
                'vbank_num'             => $vbank_num,
                'vbank_name'            => $vbank_name,
                'vbank_holder'          => $vbank_holder,
                'vbank_date'            => $vbank_date,
                'bank_list'             => $bank_list,
                'bank_account'          => $bank_account,
                'bank_account_name'     => $bank_account_name,
                'bank_date'             => $bank_date,
                'refund_list'           => $refund_list,
                'refund_account'        => $refund_account,
                'refund_account_name'   => $refund_account_name,
                'ins_user'              => $this->session->userdata('MEMBER')['member_id'],
                'ins_datetime'          => date('Y-m-d H:i:s')
            );

            $pay_result = $this->pay_model->regist_book_pay($pay_values);

            if ( $pay_result )
            {
                $result = true;
                $resultMessage = '';
            }
            else
            {
                $result = false;
                $resultMessage = '임시 주문 결제 정보 생성 실패';

                $delete_result = HP_GET_BOARD_DELETE($this->config->item('site_id'), $board_type, $board_type, array(
                    'board_seq' => $board_seq
                ));
            }
        }
        else
        {
            $result = false;
            $resultMessage = '임시 주문 생성 실패';
        }

        return_json(array(
            'result' => $result,
            'resultMessage' => $resultMessage,
            'board_seq' => $board_seq,
            'merchant_uid' => $merchant_uid,
        ));
    }

    public function book_order_complete()
    {
        $imp_uid = $this->input->get('imp_uid');   
        $merchant_uid = $this->input->get('merchant_uid');   
        $imp_success = $this->input->get('imp_success');   
        $error_code = $this->input->get('error_code');   
        $error_msg = $this->input->get('error_msg');

        $condition = array(
            'board_etc_10' => $merchant_uid
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'book', 'book', $condition);

        if ( $board_data['count'] == 0 )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '주문 정보가 잘못 되었습니다.\nERR:9998');
            redirect('/front/education/book');
        }
        else
        {
            // 아임포트에서 결제 정보 가져와야 함.
            $board_seq = $board_data['list'][0]->board_seq;

            if ( $board_seq )
            {
                $pay_info = $this->pay_model->get_book_pay_list(array(
                    'board_seq' => $board_seq
                ));
                $pay_info = $pay_info[0];

                if ( $imp_success == 'false' )
                {
                    $this->session->set_flashdata('SESSION_MESSAGE', $error_msg);
                    redirect('/front/education/book');
                }
                else
                {
                    $iamport = new Iamport($this->config->item('IMPORT')['imp_key'], $this->config->item('IMPORT')['imp_secret']);

                    $result = $iamport->findByMerchantUID($merchant_uid);

                    if ( $result->success )
                    {
                        $payment_data = $result->data;

                        $amount_should_be_paid = $pay_info->paid_amount;

                        if ( $payment_data->status === 'paid' )
                        // if ( $payment_data->status === 'paid' && $payment_data->amount === $amount_should_be_paid )
                        {                    
                            $modify = array(
                                'board_seq' => $board_seq,
                                // 결제 결과
                                'board_etc_3'   => '2',
                                'board_etc_9' => implode(',', $this->input->get())
                            );

                            $pay_modify = array(
                                'board_seq'             => $board_seq,
                                'imp_uid'               => $payment_data->imp_uid,
                                'merchant_uid'          => $payment_data->merchant_uid,
                                'pay_method'            => $payment_data->pay_method,
                                'paid_amount'           => $payment_data->amount,
                                'status'                => $payment_data->status,
                                'apply_num'             => $payment_date->apply_num
                            );

                            $pay_modify_result = $this->pay_model->modify_book_pay($pay_modify);
                        }
                        else
                        {           
                            $modify = array(
                                'board_seq' => $board_seq,
                                'board_etc_9' => implode(',', $this->input->get())
                            );                      
                        }

                        // NOTI 발송
                        if ( !$this->config->item('is_test_mode') )
                            SEND_NOTI('book');
                        
                        $modify_result = HP_GET_BOARD_MODIFY($this->config->item('site_id'), 'book', 'book', $modify);

                    } else {
                        $this->session->set_flashdata('SESSION_MESSAGE', '['.$result->error['code'].'] '.$result->error['message']);
                        redirect('/front/education/book');
                    }
                }
            }
            else
            {
                $this->session->set_flashdata('SESSION_MESSAGE', '주문 정보가 없습니다.\nERR:9999');
                redirect('/front/education/book');                
            }
        }
    }

    public function book_complete($board_seq)
    {
        $data = array();

        $condition = array(
            'board_seq' => $board_seq
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'book', 'book', $condition);
        $pay_data = $this->pay_model->get_book_pay_list($condition);

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['child']['book'];

        $data['board_data'] = $board_data;
        $data['pay_data'] = $pay_data;
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
        $this->load->view('front/education/book_complete', $data);
        $this->load->view('front/_common/new_footer');      
    }

	public function lecture()
	{
        /* 
         * 2020-08-08 엄기애 주임
         * 바로 등록으로 이동 변경 요청
         * 2020-09-11
         * 로그인 없이 가능하도록 변경 요청
         */
        /*
        if ( !$this->session->userdata('MEMBER_SESSION') ) {            
            $this->session->set_flashdata('SESSION_MESSAGE', '로그인이 필요 합니다.');
            redirect('/front/auth');
        }
        else
        */
            redirect('/front/education/lecture_regist');

		$data = array();

		$condition = array(
			'page' => ( $this->input->get('page') ) ? $this->input->get('page') : 0,
            'keyword' => ( $this->input->get('keyword') ) ? $this->input->get('keyword') : ''
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'lecture', 'lecture', $condition);

		$data['condition'] = $condition;

		unset($data['condition']['page']);

		$data['url_query'] = '/front/education/lecture?'.http_build_query($data['condition']);

		$config['base_url'] 				= $data['url_query'];
		$config['total_rows'] 				= $board_data['count'];
		$config['per_page']					= (int)$this->config->item('paging_limit');
		$config['page_query_string']		= true;
		$config['num_links']				= 5;
		$config['query_string_segment']		= 'page';

        $config['full_tag_open'] 	= '<ul class="pagination">';
        $config['full_tag_close'] 	= '</ul>';
        $config['first_link'] 		= '<i class="fa fa-angle-double-left"></i>';
        $config['first_tag_open'] 	= '<li class="page-item first">';
        $config['first_tag_close'] 	= '</li>';
        $config['prev_link'] 		= '<i class="fa fa-angle-left"></i>';
        $config['prev_tag_open'] 	= '<li class="page-item prev">';
        $config['prev_tag_close'] 	= '</li>';
        $config['next_link'] 		= '<i class="fa fa-angle-right"></i>';
        $config['next_tag_open'] 	= '<li>';
        $config['next_tag_close'] 	= '</li>';
        $config['last_link'] 		= '<i class="fa fa-angle-double-right"></i>';
        $config['last_tag_open'] 	= '<li class="page-item last">';
        $config['last_tag_close'] 	= '</li>';
        $config['cur_tag_open'] 	= '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] 	= '</a></li>';
        $config['num_tag_open'] 	= '<li>';
        $config['num_tag_close'] 	= '</li>';
        $config['anchor_class']		= 'class="page-link"';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();

        $data['board_data'] = $board_data;

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['child']['lecture'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
		$this->load->view('front/education/lecture', $data);
		$this->load->view('front/_common/new_footer');
	}

	public function lecture_regist()
	{
        /* 
         * 2020-08-08 엄기애 주임
         * 바로 등록으로 이동 변경 요청
         * 2020-09-11
         * 로그인 없이 가능하도록 변경 요청
         */
        /*
        if ( !$this->session->userdata('MEMBER_SESSION') ) {            
            $this->session->set_flashdata('SESSION_MESSAGE', '로그인이 필요 합니다.');
            redirect('/front/auth');
        }
        */

		$data = array();

        $teacher_list = $this->lecture_model->get_lecture_teacher_list(array());
        $data['teacher_list'] = $teacher_list;

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['child']['lecture'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
        if ( $this->config->item('SITE_LANGUAGE') == 'ENG' )
            $this->load->view('front/education/lecture_regist_eng', $data);
        else
            $this->load->view('front/education/lecture_regist', $data);
		$this->load->view('front/_common/new_footer');		
	}

	public function lecture_regist_proc()
	{		
        $board_type     	= 'lecture';
        $board_category  	= $this->input->post('board_category');
        $board_etc_1  		= $this->input->post('board_etc_1');
        $board_etc_2  		= $this->input->post('board_etc_2');
        $board_company  	= $this->input->post('board_company');
        $board_name     	= $this->input->post('board_name');
        $board_email    	= $this->input->post('board_email');
        $board_hp    		= $this->input->post('board_hp');
        $board_content  	= $this->input->post('board_content');

        $values = array(
            'board_type'        => $board_type,
            'board_content'     => $board_content,
            'ins_user'			=> $this->session->userdata('MEMBER')['member_id']
        );

        if ( isset($board_etc_1) && $board_etc_1 )
            $values['board_etc_1'] = $board_etc_1;
        if ( isset($board_etc_2) && $board_etc_2 )
            $values['board_etc_2'] = $board_etc_2;
        if ( isset($board_category) && $board_category )
            $values['board_category'] = $board_category;
        if ( isset($board_company) && $board_company )
            $values['board_company'] = $board_company;
        if ( isset($board_name) && $board_name )
            $values['board_name'] = $board_name;
        if ( isset($board_email) && $board_email )
            $values['board_email'] = $board_email;
        if ( isset($board_hp) && $board_hp )
            $values['board_hp'] = $board_hp;

        if ( !$board_type )
            redirect('/');

        $result = HP_GET_BOARD_REGIST($this->config->item('site_id'), $board_type, $board_type, $values);

        if ( $result )
        {
            // NOTI 발송
            SEND_NOTI('lecture');

            $this->session->set_flashdata('SESSION_MESSAGE', '등록 되었습니다.');
            redirect('/front/education/lecture');
        }
        else
            redirect('/front/education/lecture');
	}

	public function lecture_view($board_seq)
	{
		$data = array();

		$condition = array(
			'board_seq' => $board_seq
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'lecture', 'lecture', $condition);

        /*
        if ( $board_data['list'][0]->ins_user != $this->session->userdata('MEMBER')['member_id'] )
        {
            $this->session->set_flashdata('SESSION_MESSAGE', '자신이 등록한 글만 열람이 가능합니다.');
            redirect('/front/education/lecture');
        }
        else
        {
	        $data['board_data'] = $board_data;

			$this->load->view('front/_common/new_header');
			$this->load->view('front/education/lecture_view', $data);
			$this->load->view('front/_common/new_footer');
        }
        */

        $data['board_data'] = $board_data;

        $data['dep1'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')];
        $data['dep1_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['name'];
        $data['dep2'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education'];
        $data['dep2_name'] = $this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['education']['child']['lecture'];
        
        $this->load->view('front/_common/new_header');
        $this->load->view('front/_common/sub_header', $data);
		$this->load->view('front/education/lecture_view', $data);
		$this->load->view('front/_common/new_footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */