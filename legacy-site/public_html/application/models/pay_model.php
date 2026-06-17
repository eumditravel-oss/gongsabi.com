<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pay_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function get_book_pay_list($condition)
	{
		$query = "
			SELECT
				pay.*,
				board.board_title,
				board.board_category,
				board.board_etc_1,
				board.board_etc_2,
				board.board_etc_3,
				board.board_etc_4,
				board.board_etc_5,
				board.board_etc_6,
				board.board_etc_7
			FROM
				".$this->config->item('dbprefix')."book_pay AS pay
				JOIN
				".$this->config->item('dbprefix')."board_book AS board
				ON
				pay.board_seq = board.board_seq
			WHERE
				1 = 1
		";

		if ( isset($condition['pay_seq']) && $condition['pay_seq'] != '' )
		{
			$query .= "
				AND pay.pay_seq = '".$condition['pay_seq']."'
			";
		}

		if ( isset($condition['board_seq']) && $condition['board_seq'] != '' )
		{
			$query .= "
				AND board.board_seq = '".$condition['board_seq']."'
			";
		}

		if ( isset($condition['uid']) && $condition['uid'] != '' )
		{
			$query .= "
				AND pay.merchant_uid = '".$condition['uid']."'
			";
		}

		if ( isset($condition['board_status']) && $condition['board_status'] != '' )
		{
			$query .= "
				AND board.board_status = '".$condition['board_status']."'
			";
		} else {
			$query .= "
				AND board.board_status = '1'
			";
		}

		if ( isset($condition['status']) && $condition['status'] != '' )
		{
			$query .= "
				AND pay.status = '".$condition['status']."'
			";
		}

		if ( isset($condition['status_in']) && $condition['status_in'] != '' )
		{
			$query .= "
				AND board.board_etc_3 IN (".$condition['status_in'].")
			";
		}

		if ( isset($condition['ins_user']) && $condition['ins_user'] != '' )
		{
			$query .= "
				AND pay.ins_user = '".$condition['ins_user']."'
			";
		}

		$query .= " ORDER BY pay.ins_datetime DESC ";

		$page = ( isset($condition['page']) && !empty($condition['page']) ) ? (int)$condition['page'] : 0;
		$limit = ( isset($condition['limit']) && !empty($condition['limit']) ) ? (int)$condition['limit'] : (int)$this->config->item('paging_limit');

		$query .= " LIMIT ".$page.", ".$limit." ";

      	return $this->db->query($query)->result();  
	}

	public function get_book_pay_count($condition)
	{
		$query = "
			SELECT
				COUNT(board.board_seq) AS cnt
			FROM
				".$this->config->item('dbprefix')."book_pay AS pay
				JOIN
				".$this->config->item('dbprefix')."board_book AS board
				ON
				pay.board_seq = board.board_seq
			WHERE
				1 = 1
		";

		if ( isset($condition['pay_seq']) && $condition['pay_seq'] != '' )
		{
			$query .= "
				AND pay.pay_seq = '".$condition['pay_seq']."'
			";
		}

		if ( isset($condition['board_seq']) && $condition['board_seq'] != '' )
		{
			$query .= "
				AND board.board_seq = '".$condition['board_seq']."'
			";
		}

		if ( isset($condition['uid']) && $condition['uid'] != '' )
		{
			$query .= "
				AND pay.merchant_uid = '".$condition['uid']."'
			";
		}

		if ( isset($condition['board_status']) && $condition['board_status'] != '' )
		{
			$query .= "
				AND board.board_status = '".$condition['board_status']."'
			";
		} else {
			$query .= "
				AND board.board_status = '1'
			";
		}

		if ( isset($condition['status']) && $condition['status'] != '' )
		{
			$query .= "
				AND pay.status = '".$condition['status']."'
			";
		}

		if ( isset($condition['status_in']) && $condition['status_in'] != '' )
		{
			$query .= "
				AND board.board_etc_3 IN (".$condition['status_in'].")
			";
		}

		if ( isset($condition['ins_user']) && $condition['ins_user'] != '' )
		{
			$query .= "
				AND pay.ins_user = '".$condition['ins_user']."'
			";
		}

      	return $this->db->query($query)->result();  
	}

	public function regist_book_pay($values)
	{
		$result = $this->db->insert('gongsabi_book_pay', $values);

		if ($result) 
			return $this->db->insert_id();
		else
			return false;
	}

	public function modify_book_pay($values)
	{
		if ( isset($values['pay_seq']) )
			$this->db->where('pay_seq', $values['pay_seq']);
		if ( isset($values['board_seq']) )
			$this->db->where('board_seq', $values['board_seq']);

		unset($values['pay_seq']);
		unset($values['board_seq']);

		$data = $values;

		$result = $this->db->update($this->config->item('dbprefix').'book_pay', $data);

		return $result;
	}

	public function get_member_pay_list($condition)
	{
		$query = "
			SELECT
				*
			FROM
				".$this->config->item('dbprefix')."member_pay
			WHERE
				1 = 1
		";

		if ( isset($condition['pay_seq']) && $condition['pay_seq'] != '' )
		{
			$query .= "
				AND pay_seq = '".$condition['pay_seq']."'
			";
		}

		if ( isset($condition['board_seq']) && $condition['board_seq'] != '' )
		{
			$query .= "
				AND board_seq = '".$condition['board_seq']."'
			";
		}

		if ( isset($condition['uid']) && $condition['uid'] != '' )
		{
			$query .= "
				AND merchant_uid = '".$condition['uid']."'
			";
		}

		if ( isset($condition['status']) && $condition['status'] != '' )
		{
			$query .= "
				AND status = '".$condition['status']."'
			";
		}

      	return $this->db->query($query)->result();  
	}

	public function regist_member_pay($values)
	{
		$result = $this->db->insert('gongsabi_member_pay', $values);

		if ($result) 
			return $this->db->insert_id();
		else
			return false;
	}

	public function modify_member_pay($values)
	{
		if ( isset($values['member_id']) )
			$this->db->where('member_id', $values['member_id']);
		if ( isset($values['board_seq']) )
			$this->db->where('board_seq', $values['board_seq']);

		unset($values['member_id']);
		unset($values['board_seq']);

		$data = $values;

		$result = $this->db->update($this->config->item('dbprefix').'member_pay', $data);

		return $result;
	}
}