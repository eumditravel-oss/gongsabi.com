<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// https://github.com/iamport/iamport-rest-client-php
include APPPATH . 'third_party/iamport.php';

class Api extends CI_Controller {

	public function pay_noti()
	{
		var_dump($this->input->post());

		// https://docs.iamport.kr/tech/webhook
		$imp_uid = $this->input->post('imp_uid');
		$merchant_uid = $this->input->post('merchant_uid');
		$status = $this->input->post('status');
	}

	public function get_token($merchant_uid)
	{
		$condition = array(
            'board_etc_10' => $merchant_uid
        );

        $board_data = HP_GET_BOARD_LIST($this->config->item('site_id'), 'book', 'book', $condition);

	    // 아임포트에서 결제 정보 가져와야 함.
	    $board_seq = $board_data['list'][0]->board_seq;

	    if ( $board_seq )
	    {
		    $pay_info = $this->pay_model->get_book_pay_list(array(
		        'board_seq' => $board_seq
		    ));
		    $pay_info = $pay_info[0];

		    // var_dump($pay_info);

	        $iamport = new Iamport($this->config->item('IMPORT')['imp_key'], $this->config->item('IMPORT')['imp_secret']);

	        $result = $iamport->findByMerchantUID($merchant_uid);

	        if ( $result->success )
	        {
	            $payment_data = $result->data;

	            return_json((Array)$payment_data);
	            exit;

	            $amount_should_be_paid = $pay_info->paid_amount;

	            if ( $payment_data->status === 'paid' )
	            // if ( $payment_data->status === 'paid' && $payment_data->amount === $amount_should_be_paid )
	            {                
	                $modify = array(
	                    'board_seq' => $board_seq,
	                    // 결제 결과
	                    'board_etc_3'   => '2',
	                    // 'board_etc_9' => implode(',', $this->input->get())
	                );

	                $pay_modify = array(
	                    'board_seq'             => $board_seq,
	                    'imp_uid'               => $payment_data->imp_uid,
	                    'merchant_uid'          => $payment_data->merchant_uid,
	                    'pay_method'            => $payment_data->pay_method,
	                    'paid_amount'           => $payment_data->amount,
	                    'status'                => $payment_data->status,
	                    'apply_num'             => $payment_data->apply_num
	                );

	                $pay_modify_result = $this->pay_model->modify_book_pay($pay_modify);

	                $modify_result = HP_GET_BOARD_MODIFY($this->config->item('site_id'), 'book', 'book', $modify);
	            }
	        }

	    }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */