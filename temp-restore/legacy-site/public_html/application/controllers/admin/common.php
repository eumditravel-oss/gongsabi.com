<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Controller {

	public function deposit_process()
	{
		$board_seq = $this->input->post('board_seq');

        $modify = array(
            'board_seq'     => $board_seq,
            'board_etc_3'   => '2',
        );

        $modify_result = HP_GET_BOARD_MODIFY($this->config->item('site_id'), 'book', 'book', $modify);

        $modify = array(
            'board_seq'     => $board_seq,
            'status'   		=> 'paid',
        );

        $pay_modify_result = $this->pay_model->modify_book_pay($modify);

        if ( $modify_result && $pay_modify_result )
        {
			return_json(array(
				'result' => true
			));
        }
        else
        {
			return_json(array(
				'result' => false
			));
        }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */