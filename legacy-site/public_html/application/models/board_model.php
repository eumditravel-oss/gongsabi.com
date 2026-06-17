<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Board_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	// 핸들 몰 게시판 리스트
	public function get_board_list($condition)
	{
		$query = "
			SELECT 
				@RNUM := @RNUM + 1 AS rownum,
				T.*
			FROM
			(
		";

		$query .= "
			SELECT
				*
			FROM
				".$this->config->item('dbprefix')."board_{$condition['board_db']}
			WHERE
				1 = 1
		";

		if ( isset($condition['board_status']) && $condition['board_status'] != '' )
		{
			$query .= "
				AND board_status = '".$condition['board_status']."'
			";
		}
		else
		{
			$query .= "
				AND board_status = '1'
			";			
		}

		if ( isset($condition['board_type']) && $condition['board_type'] != '' )
		{
			$query .= "
				AND board_type = '".$condition['board_type']."'
			";
		}

		if ( isset($condition['board_seq']) && $condition['board_seq'] != '' )
		{
			$query .= "
				AND board_seq = '".$condition['board_seq']."'
			";
		}

		if ( isset($condition['board_category']) && $condition['board_category'] != '' )
		{
			$query .= "
				AND board_category = '".$condition['board_category']."'
			";
		}

		if ( isset($condition['board_etc_9']) && $condition['board_etc_9'] != '' )
		{
			$query .= "
				AND board_etc_9 = '".$condition['board_etc_9']."'
			";
		}

		if ( isset($condition['board_etc_10']) && $condition['board_etc_10'] != '' )
		{
			$query .= "
				AND board_etc_10 = '".$condition['board_etc_10']."'
			";
		}

		if ( isset($condition['keyword']) && $condition['keyword'] != '' )
		{
			$query .= "
				AND (
					board_title LIKE '%".$condition['keyword']."%'
					OR board_name LIKE '%".$condition['keyword']."%'
					OR board_company LIKE '%".$condition['keyword']."%'
					OR board_content LIKE '%".$condition['keyword']."%'
				)
			";
		}

		if ( isset($condition['ins_user']) && $condition['ins_user'] != '' )
		{
			$query .= "
				AND ins_user = '".$condition['ins_user']."'
			";
		}

		$query .= " ORDER BY board_top_yn, ins_datetime ";

		$page = ( isset($condition['page']) && !empty($condition['page']) ) ? (int)$condition['page'] : 0;
		$limit = ( isset($condition['limit']) && !empty($condition['limit']) ) ? (int)$condition['limit'] : (int)$this->config->item('paging_limit');

		// MariaDB 이슈
		// $query .= " LIMIT 18446744073709551615 ";

		$query .= "
			) T,
			( SELECT @RNUM := 0 ) R
		";

		$query .= "
			ORDER BY rownum DESC
		";

		$query .= " LIMIT ".$page.", ".$limit." ";

		// echo $query;

      	return $this->db->query($query)->result();  
	}

	// 핸들 몰 게시판 리스트
	public function get_board_count($condition)
	{
		$query = "
			SELECT
				COUNT(*) AS cnt
			FROM
				".$this->config->item('dbprefix')."board_{$condition['board_db']}
			WHERE
				1 = 1
		";

		if ( isset($condition['board_status']) && $condition['board_status'] != '' )
		{
			$query .= "
				AND board_status = '".$condition['board_status']."'
			";
		}
		else
		{
			$query .= "
				AND board_status = '1'
			";			
		}

		if ( isset($condition['board_type']) && $condition['board_type'] != '' )
		{
			$query .= "
				AND board_type = '".$condition['board_type']."'
			";
		}

		if ( isset($condition['board_seq']) && $condition['board_seq'] != '' )
		{
			$query .= "
				AND board_seq = '".$condition['board_seq']."'
			";
		}

		if ( isset($condition['board_category']) && $condition['board_category'] != '' )
		{
			$query .= "
				AND board_category = '".$condition['board_category']."'
			";
		}

		if ( isset($condition['board_etc_9']) && $condition['board_etc_9'] != '' )
		{
			$query .= "
				AND board_etc_9 = '".$condition['board_etc_9']."'
			";
		}

		if ( isset($condition['board_etc_10']) && $condition['board_etc_10'] != '' )
		{
			$query .= "
				AND board_etc_10 = '".$condition['board_etc_10']."'
			";
		}

		if ( isset($condition['keyword']) && $condition['keyword'] != '' )
		{
			$query .= "
				AND (
					board_title LIKE '%".$condition['keyword']."%'
					OR board_name LIKE '%".$condition['keyword']."%'
					OR board_company LIKE '%".$condition['keyword']."%'
					OR board_content LIKE '%".$condition['keyword']."%'
				)
			";
		}

		if ( isset($condition['ins_user']) && $condition['ins_user'] != '' )
		{
			$query .= "
				AND ins_user = '".$condition['ins_user']."'
			";
		}

      	return $this->db->query($query)->result();  
	}

	// 핸들 몰 게시판 등록
	public function regist_board($values)
	{
		$board_db = $values['board_db'];

		unset($values['board_db']);

		$result = $this->db->insert($this->config->item('dbprefix').'board_'.$board_db, $values);

		if ($result) 
			return $this->db->insert_id();
		else
			return false;
	}

	public function modify_board($values)
	{
		$board_db = $values['board_db'];

		unset($values['board_db']);

		$data = array(
			'upd_datetime' 	=> $values['upd_datetime'],
			'upd_ip'		=> $values['upd_ip']
		);

		if ( isset($values['board_title']) )
			$data['board_title'] = $values['board_title'];
		if ( isset($values['board_content']) )
			$data['board_content'] = $values['board_content'];
		if ( isset($values['board_category']) )
			$data['board_category'] = $values['board_category'];
		if ( isset($values['board_top_yn']) )
			$data['board_top_yn'] = $values['board_top_yn'];
		if ( isset($values['board_company']) )
			$data['board_company'] = $values['board_company'];
		if ( isset($values['board_name']) )
			$data['board_name'] = $values['board_name'];
		if ( isset($values['board_email']) )
			$data['board_email'] = $values['board_email'];
		if ( isset($values['board_phone']) )
			$data['board_phone'] = $values['board_phone'];
		if ( isset($values['board_hp']) )
			$data['board_hp'] = $values['board_hp'];
		if ( isset($values['board_password']) )
			$data['board_password'] = $values['board_password'];
		if ( isset($values['board_secret_yn']) )
			$data['board_secret_yn'] = $values['board_secret_yn'];
		if ( isset($values['board_reply_yn']) )
			$data['board_reply_yn'] = $values['board_reply_yn'];
		if ( isset($values['board_reply_content']) )
			$data['board_reply_content'] = $values['board_reply_content'];
		if ( isset($values['board_link']) )
			$data['board_link'] = $values['board_link'];
		if ( isset($values['board_image']) )
			$data['board_image'] = $values['board_image'];
		if ( isset($values['board_etc_1']) )
			$data['board_etc_1'] = $values['board_etc_1'];
		if ( isset($values['board_etc_2']) )
			$data['board_etc_2'] = $values['board_etc_2'];
		if ( isset($values['board_etc_3']) )
			$data['board_etc_3'] = $values['board_etc_3'];
		if ( isset($values['board_etc_4']) )
			$data['board_etc_4'] = $values['board_etc_4'];
		if ( isset($values['board_etc_5']) )
			$data['board_etc_5'] = $values['board_etc_5'];
		if ( isset($values['board_etc_6']) )
			$data['board_etc_6'] = $values['board_etc_6'];
		if ( isset($values['board_etc_7']) )
			$data['board_etc_7'] = $values['board_etc_7'];
		if ( isset($values['board_etc_8']) )
			$data['board_etc_8'] = $values['board_etc_8'];
		if ( isset($values['board_etc_9']) )
			$data['board_etc_9'] = $values['board_etc_9'];
		if ( isset($values['board_etc_10']) )
			$data['board_etc_10'] = $values['board_etc_10'];
		if ( isset($values['board_attach_1']) )
			$data['board_attach_1'] = $values['board_attach_1'];
		if ( isset($values['board_attach_2']) )
			$data['board_attach_2'] = $values['board_attach_2'];
		if ( isset($values['board_attach_3']) )
			$data['board_attach_3'] = $values['board_attach_3'];
		if ( isset($values['reply_datetime']) )
			$data['reply_datetime'] = $values['reply_datetime'];

		if ( isset($values['board_seq']) )
			$this->db->where('board_seq', $values['board_seq']);
		if ( isset($values['board_type']) )
			$this->db->where('board_type', $values['board_type']);

		$result = $this->db->update($this->config->item('dbprefix').'board_'.$board_db, $data);

		return $result;
	}

	public function delete_board($values)
	{
		$board_db = $values['board_db'];

		unset($values['board_db']);

		$data = array(
			'board_status' 		=> '9', // 삭제
			'del_datetime' 		=> $values['del_datetime'],
			'del_ip'			=> $values['del_ip']
		);

		$this->db->where('board_seq', $values['board_seq']);
		$this->db->where('board_type', $values['board_type']);

		$result = $this->db->update($this->config->item('dbprefix').'board_'.$board_db, $data);

		return $result;
	}
}