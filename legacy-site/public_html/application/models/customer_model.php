<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	// 게시판 리스트
	public function get_customers($condition)
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
				customer
			WHERE
				1 = 1
		";

		if ( isset($condition['use_yn']) && !empty($condition['use_yn']) )
		{
			$query .= " AND use_yn = '".$condition['use_yn']."' ";
		}

		if ( isset($condition['target']) && !empty($condition['target']) )
		{
			$query .= " AND target = '".$condition['target']."' ";
		}

		if ( isset($condition['keyword']) && !empty($condition['keyword']) )
		{
			$query .= " AND title LIKE '%".$condition['keyword']."%' ";
		}

		$query .= " ORDER BY ins_datetime ";

		$query .= "
			) T,
			( SELECT @RNUM := 0 ) R

			ORDER BY rownum DESC
		";

		$page = ( isset($condition['page']) && !empty($condition['page']) ) ? (int)$condition['page'] : 0;
		$limit = ( isset($condition['limit']) && !empty($condition['limit']) ) ? (int)$condition['limit'] : 10;

		$query .= " LIMIT ".$page.", ".$limit." ";

		return $this->db->query($query)->result();
	}

	// 게시판 갯수
	public function get_customers_count($condition)
	{
		$query = "
			SELECT
				COUNT(*) AS cnt
			FROM
				customer
			WHERE
				1 = 1
		";

		if ( isset($condition['use_yn']) && !empty($condition['use_yn']) )
		{
			$query .= " AND use_yn = '".$condition['use_yn']."' ";
		}

		if ( isset($condition['target']) && !empty($condition['target']) )
		{
			$query .= " AND target = '".$condition['target']."' ";
		}

		if ( isset($condition['keyword']) && !empty($condition['keyword']) )
		{
			$query .= " AND title LIKE '%".$condition['keyword']."%' ";
		}

		return $this->db->query($query)->result();
	}

	// 게시판 상세
	public function get_customer($condition)
	{
		$query = "
			SELECT
				*
			FROM
				customer
			WHERE
				1 = 1
		";

		if ( isset($condition['target']) && !empty($condition['target']) )
		{
			$query .= " AND target = '".$condition['target']."' ";
		}

		if ( isset($condition['seq']) && !empty($condition['seq']) )
		{
			$query .= " AND seq = '".$condition['seq']."' ";
		}

		return $this->db->query($query)->result();
	}

	// 이전 게시판
	public function get_prev_customer($condition)
	{
		$query = "
			SELECT
				*
			FROM
				customer
			WHERE
				1 = 1
		";

		if ( isset($condition['use_yn']) && !empty($condition['use_yn']) )
		{
			$query .= " AND use_yn = '".$condition['use_yn']."' ";
		}

		if ( isset($condition['target']) && !empty($condition['target']) )
		{
			$query .= " AND target = '".$condition['target']."' ";
		}

		if ( isset($condition['keyword']) && !empty($condition['keyword']) )
		{
			$query .= " AND title LIKE '%".$condition['keyword']."%' ";
		}

		if ( isset($condition['seq']) && !empty($condition['seq']) )
		{
			$query .= " AND seq < '".$condition['seq']."' ";
		}

		$query .= " ORDER BY ins_datetime DESC ";

		$query .= " LIMIT 0, 1 ";

		return $this->db->query($query)->result();
	}

	// 다음 게시판
	public function get_next_customer($condition)
	{
		$query = "
			SELECT
				*
			FROM
				customer
			WHERE
				1 = 1
		";

		if ( isset($condition['use_yn']) && !empty($condition['use_yn']) )
		{
			$query .= " AND use_yn = '".$condition['use_yn']."' ";
		}

		if ( isset($condition['target']) && !empty($condition['target']) )
		{
			$query .= " AND target = '".$condition['target']."' ";
		}

		if ( isset($condition['keyword']) && !empty($condition['keyword']) )
		{
			$query .= " AND title LIKE '%".$condition['keyword']."%' ";
		}

		if ( isset($condition['seq']) && !empty($condition['seq']) )
		{
			$query .= " AND seq > '".$condition['seq']."' ";
		}

		$query .= " ORDER BY ins_datetime ";

		$query .= " LIMIT 0, 1 ";

		return $this->db->query($query)->result();
	}

	// 게시판 등록
	public function regist_customer($values)
	{
		$result = $this->db->insert('customer', $values);

		if ($result) 
			return $this->db->insert_id();
		else
			return false;
	}

	// 게시판 수정
	public function modify_customer($values)
	{
		$result = $this->db->where('target', $values['target']);
		$result = $this->db->where('seq', $values['seq']);
		$result = $this->db->update('customer', $values);

		return $result;
	}

}