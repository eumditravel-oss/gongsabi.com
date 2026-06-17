<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	// 단가 리스트
	// public function get_gongsabi_list($condition)
	// {
	// 	$query = "
	// 		SELECT 
	// 			@RNUM := @RNUM + 1 AS rownum,
	// 			T.*
	// 		FROM
	// 		(
	// 	";

	// 	$query .= "
	// 		SELECT
	// 			seq,
	// 			c2,
	// 			c4,
	// 			c7,
	// 			c9,
	// 			c11,
	// 			c13,
	// 			c15,
	// 			d18_27
	// 		FROM
	// 			gongsabi_data_gongsabi
	// 		WHERE
	// 			1 = 1
	// 	";

	// 	if ( isset($condition['seq']) && $condition['seq'] != '' )
	// 	{
	// 		$query .= "
	// 			AND seq = '".$condition['seq']."'
	// 		";
	// 	}

	// 	if ( isset($condition['c4']) && $condition['c4'] != '' )
	// 	{
	// 		$query .= "
	// 			AND c4 = '".$condition['c4']."'
	// 		";
	// 	}

	// 	if ( isset($condition['c7']) && $condition['c7'] != '' )
	// 	{
	// 		$query .= "
	// 			AND c7 = '".$condition['c7']."'
	// 		";
	// 	}

	// 	if ( isset($condition['c9']) && $condition['c9'] != '' )
	// 	{
	// 		$query .= "
	// 			AND c9 = '".$condition['c9']."'
	// 		";
	// 	}

	// 	if ( isset($condition['c11']) && $condition['c11'] != '' )
	// 	{
	// 		$query .= "
	// 			AND c11 = '".$condition['c11']."'
	// 		";
	// 	}

	// 	if ( isset($condition['keyword']) && $condition['keyword'] != '' )
	// 	{
	// 		$query .= "
	// 			AND (
	// 		";

	// 		$keywords = explode(' ', $condition['keyword']);

	// 		$_search = array();

	// 		foreach ( $keywords as $keyword ) {
	// 			$_search[] = " (
	// 				c2 LIKE '%".$keyword."%'
	// 			) ";
	// 		}

	// 		$_search = implode(' AND ', $_search);

	// 		$query .= $_search;

	// 		$query .= "
	// 			)
	// 		";
	// 	}

	// 	$query .= " ORDER BY seq ";

	// 	$page = ( isset($condition['page']) && !empty($condition['page']) ) ? (int)$condition['page'] : 0;
	// 	$limit = ( isset($condition['limit']) && !empty($condition['limit']) ) ? (int)$condition['limit'] : (int)$this->config->item('paging_limit2');

	// 	// MariaDB 이슈
	// 	// $query .= " LIMIT 18446744073709551615 ";

	// 	$query .= "
	// 		) T,
	// 		( SELECT @RNUM := 0 ) R
	// 	";

	// 	$query .= "
	// 		ORDER BY rownum DESC
	// 	";

	// 	$query .= " LIMIT ".$page.", ".$limit." ";

 //      	return $this->db->query($query)->result();  
	// }

	// 단가 리스트
	public function get_gongsabi_list($condition)
	{
		$query = "
			SELECT
				seq,
				c2,
				c4,
				c7,
				d7,
				c9,
				c11,
				c13,
				c13_order,
				c15,
				d24_33,
				e24_33,
				ins_datetime
			FROM
				gongsabi_data_gongsabi
			WHERE
				1 = 1
		";

		if ( isset($condition['seq']) && $condition['seq'] != '' )
		{
			$query .= "
				AND seq = '".$condition['seq']."'
			";
		}

		if ( isset($condition['c4']) && $condition['c4'] != '' )
		{
			$query .= " AND ( ";

			$_query = array();
			foreach ($this->config->item('DATA_GONGSABI_C4')[$condition['c4']] as $key => $value) {
				$_query[] = " c4 = '".$value."' ";	
			}

			$query .= implode(' OR ', $_query);

			$query .= " ) ";
		}

		if ( isset($condition['c7']) && $condition['c7'] != '' )
		{
			switch ( $condition['c7'] ) {
				case '1':
					$query .= " AND ( 0 <= c7 AND c7 <= 999 ) ";
					break;
				case '2':
					$query .= " AND ( 1000 <= c7 AND c7 <= 4999 ) ";
					break;
				case '3':
					$query .= " AND ( 5000 <= c7 AND c7 <= 9999 ) ";
					break;
				case '4':
					$query .= " AND ( 10000 <= c7 AND c7 <= 19999 ) ";
					break;
				case '5':
					$query .= " AND ( 20000 <= c7 AND c7 <= 39999 ) ";
					break;
				case '6':
					$query .= " AND ( 40000 <= c7 AND c7 <= 59999 ) ";
					break;
				case '7':
					$query .= " AND ( 60000 <= c7 AND c7 <= 99999 ) ";
					break;
				case '8':
					$query .= " AND ( 10000 <= c7 ) ";
					break;
			}
		}

		if ( isset($condition['c9']) && $condition['c9'] != '' )
		{
			$query .= "
				AND c9 LIKE '%".$condition['c9']."%'
			";
		}

		if ( isset($condition['c11']) && $condition['c11'] != '' )
		{
			$query .= "
				AND c11 LIKE '%".$condition['c11']."%'
			";
		}

		if ( isset($condition['c13']) && $condition['c13'] != '' )
		{
			$query .= "
				AND c13 LIKE '%".$condition['c13']."%'
			";
		}

		if ( isset($condition['keyword']) && $condition['keyword'] != '' )
		{
			$query .= "
				AND (
			";

			$keywords = explode(' ', $condition['keyword']);

			$_search = array();

			foreach ( $keywords as $keyword ) {
				$_search[] = " (
					c2 LIKE '%".$keyword."%'
				) ";
			}

			$_search = implode(' AND ', $_search);

			$query .= $_search;

			$query .= "
				)
			";
		}

		if ( isset($condition['order_by']) && $condition['order_by'] != '' )
			$query .= " ORDER BY ".$condition['order_by']." DESC ";
		else
			$query .= " ORDER BY c13_order, seq DESC ";

		$page = ( isset($condition['page']) && !empty($condition['page']) ) ? (int)$condition['page'] : 0;
		$limit = ( isset($condition['limit']) && !empty($condition['limit']) ) ? (int)$condition['limit'] : (int)$this->config->item('paging_limit2');

		$query .= " LIMIT ".$page.", ".$limit." ";

      	return $this->db->query($query)->result();  
	}

	// 단가 리스트
	public function get_gongsabi_info($condition)
	{
		$query = "
			SELECT
				*
			FROM
				gongsabi_data_gongsabi
			WHERE
				1 = 1
		";

		if ( isset($condition['seq']) && $condition['seq'] != '' )
		{
			$query .= "
				AND seq = '".$condition['seq']."'
			";
		}

		if ( isset($condition['c4']) && $condition['c4'] != '' )
		{
			$query .= " AND ( ";

			$_query = array();
			foreach ($this->config->item('DATA_GONGSABI_C4')[$condition['c4']] as $key => $value) {
				$_query[] = " c4 = '".$value."' ";	
			}

			$query .= implode(' OR ', $_query);

			$query .= " ) ";
		}

		if ( isset($condition['c7']) && $condition['c7'] != '' )
		{
			switch ( $condition['c7'] ) {
				case '1':
					$query .= " AND ( 0 <= c7 AND c7 <= 999 ) ";
					break;
				case '2':
					$query .= " AND ( 1000 <= c7 AND c7 <= 4999 ) ";
					break;
				case '3':
					$query .= " AND ( 5000 <= c7 AND c7 <= 9999 ) ";
					break;
				case '4':
					$query .= " AND ( 10000 <= c7 AND c7 <= 19999 ) ";
					break;
				case '5':
					$query .= " AND ( 20000 <= c7 AND c7 <= 39999 ) ";
					break;
				case '6':
					$query .= " AND ( 40000 <= c7 AND c7 <= 59999 ) ";
					break;
				case '7':
					$query .= " AND ( 60000 <= c7 AND c7 <= 99999 ) ";
					break;
				case '8':
					$query .= " AND ( 10000 <= c7 ) ";
					break;
			}
		}

		if ( isset($condition['c9']) && $condition['c9'] != '' )
		{
			$query .= "
				AND c9 LIKE '%".$condition['c9']."%'
			";
		}

		if ( isset($condition['c11']) && $condition['c11'] != '' )
		{
			$query .= "
				AND c11 LIKE '%".$condition['c11']."%'
			";
		}

		if ( isset($condition['c13']) && $condition['c13'] != '' )
		{
			$query .= "
				AND c13 LIKE '%".$condition['c13']."%'
			";
		}

		if ( isset($condition['keyword']) && $condition['keyword'] != '' )
		{
			$query .= "
				AND (
			";

			$keywords = explode(' ', $condition['keyword']);

			$_search = array();

			foreach ( $keywords as $keyword ) {
				$_search[] = " (
					c2 LIKE '%".$keyword."%'
				) ";
			}

			$_search = implode(' AND ', $_search);

			$query .= $_search;

			$query .= "
				)
			";
		}

      	return $this->db->query($query)->result();  
	}

	// 단가 갯수
	public function get_gongsabi_count($condition)
	{
		$query = "
			SELECT
				COUNT(seq) AS cnt
			FROM
				gongsabi_data_gongsabi
			WHERE
				1 = 1
		";

		if ( isset($condition['seq']) && $condition['seq'] != '' )
		{
			$query .= "
				AND seq = '".$condition['seq']."'
			";
		}

		if ( isset($condition['c4']) && $condition['c4'] != '' )
		{
			$query .= " AND ( ";

			$_query = array();
			foreach ($this->config->item('DATA_GONGSABI_C4')[$condition['c4']] as $key => $value) {
				$_query[] = " c4 = '".$value."' ";	
			}

			$query .= implode(' OR ', $_query);

			$query .= " ) ";
		}

		if ( isset($condition['c7']) && $condition['c7'] != '' )
		{
			switch ( $condition['c7'] ) {
				case '1':
					$query .= " AND ( 0 <= c7 AND c7 <= 999 ) ";
					break;
				case '2':
					$query .= " AND ( 1000 <= c7 AND c7 <= 4999 ) ";
					break;
				case '3':
					$query .= " AND ( 5000 <= c7 AND c7 <= 9999 ) ";
					break;
				case '4':
					$query .= " AND ( 10000 <= c7 AND c7 <= 19999 ) ";
					break;
				case '5':
					$query .= " AND ( 20000 <= c7 AND c7 <= 39999 ) ";
					break;
				case '6':
					$query .= " AND ( 40000 <= c7 AND c7 <= 59999 ) ";
					break;
				case '7':
					$query .= " AND ( 60000 <= c7 AND c7 <= 99999 ) ";
					break;
				case '8':
					$query .= " AND ( 10000 <= c7 ) ";
					break;
			}
		}

		if ( isset($condition['c9']) && $condition['c9'] != '' )
		{
			$query .= "
				AND c9 LIKE '%".$condition['c9']."%'
			";
		}

		if ( isset($condition['c11']) && $condition['c11'] != '' )
		{
			$query .= "
				AND c11 LIKE '%".$condition['c11']."%'
			";
		}

		if ( isset($condition['c13']) && $condition['c13'] != '' )
		{
			$query .= "
				AND c13 LIKE '%".$condition['c13']."%'
			";
		}

		if ( isset($condition['keyword']) && $condition['keyword'] != '' )
		{
			$query .= "
				AND (
			";

			$keywords = explode(' ', $condition['keyword']);

			$_search = array();

			foreach ( $keywords as $keyword ) {
				$_search[] = " (
					c2 LIKE '%".$keyword."%'
				) ";
			}

			$_search = implode(' AND ', $_search);

			$query .= $_search;

			$query .= "
				)
			";
		}

      	return $this->db->query($query)->result();  
	}

	// 게시판 등록
	public function regist_gongsabi($values)
	{
		$result = $this->db->insert('gongsabi_data_gongsabi', $values);

		if ($result) 
			return $this->db->insert_id();
		else
			return false;
	}

	// 게시판 등록
	public function delete_gongsabi($values)
	{
		$this->db->where('seq', $values['seq']);

		$result = $this->db->delete('gongsabi_data_gongsabi');

		if ($result) 
			return true;
		else
			return false;
	}

	// 단가 리스트
	public function get_goljo_list($condition)
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
				gongsabi_data_goljo
			WHERE
				1 = 1
		";

		if ( isset($condition['danga_category1']) && $condition['danga_category1'] != '' )
		{
			$query .= "
				AND danga_category1 = '".$condition['danga_category1']."'
			";
		}

		if ( isset($condition['danga_category2']) && $condition['danga_category2'] != '' )
		{
			$query .= "
				AND danga_category2 = '".$condition['danga_category2']."'
			";
		}

		if ( isset($condition['keyword']) && $condition['keyword'] != '' )
		{
			$query .= "
				AND (
			";

			$keywords = explode(' ', $condition['keyword']);

			$_search = array();

			foreach ( $keywords as $keyword ) {
				$_search[] = " (
					danga_name LIKE '%".$keyword."%'
					OR danga_standard LIKE '%".$keyword."%'
				) ";
			}

			$_search = implode(' AND ', $_search);

			$query .= $_search;

			$query .= "
				)
			";
		}

		$query .= " ORDER BY year, ins_datetime ";

		$page = ( isset($condition['page']) && !empty($condition['page']) ) ? (int)$condition['page'] : 0;
		$limit = ( isset($condition['limit']) && !empty($condition['limit']) ) ? (int)$condition['limit'] : (int)$this->config->item('paging_limit2');

		// MariaDB 이슈
		$query .= " LIMIT 18446744073709551615 ";

		$query .= "
			) T,
			( SELECT @RNUM := 0 ) R
		";

		$query .= "
			ORDER BY rownum DESC
		";

		$query .= " LIMIT ".$page.", ".$limit." ";

      	return $this->db->query($query)->result();  
	}

	// 단가 갯수
	public function get_goljo_count($condition)
	{
		$query = "
			SELECT
				COUNT(*) AS cnt
			FROM
				gongsabi_data_goljo
			WHERE
				1 = 1
		";

		if ( isset($condition['danga_category1']) && $condition['danga_category1'] != '' )
		{
			$query .= "
				AND danga_category1 = '".$condition['danga_category1']."'
			";
		}

		if ( isset($condition['danga_category2']) && $condition['danga_category2'] != '' )
		{
			$query .= "
				AND danga_category2 = '".$condition['danga_category2']."'
			";
		}

		if ( isset($condition['keyword']) && $condition['keyword'] != '' )
		{
			$query .= "
				AND (
			";

			$keywords = explode(' ', $condition['keyword']);

			$_search = array();

			foreach ( $keywords as $keyword ) {
				$_search[] = " ( danga_name LIKE '%".$keyword."%' OR danga_standard LIKE '%".$keyword."%' ) ";
			}

			$_search = implode(' AND ', $_search);

			$query .= $_search;

			$query .= "
				)
			";
		}

      	return $this->db->query($query)->result();  
	}

	// 단가 리스트
	public function get_danga_list($condition)
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
				gongsabi_data_danga
			WHERE
				1 = 1
		";

		if ( isset($condition['danga_category1']) && $condition['danga_category1'] != '' )
		{
			$query .= "
				AND danga_category1 = '".$condition['danga_category1']."'
			";
		}

		if ( isset($condition['danga_category2']) && $condition['danga_category2'] != '' )
		{
			$query .= "
				AND danga_category2 = '".$condition['danga_category2']."'
			";
		}

		if ( isset($condition['keyword']) && $condition['keyword'] != '' )
		{
			$query .= "
				AND (
			";

			$keywords = explode(' ', $condition['keyword']);

			$_search = array();

			foreach ( $keywords as $keyword ) {
				$_search[] = " (
					danga_name LIKE '%".$keyword."%'
					OR danga_standard LIKE '%".$keyword."%'
				) ";
			}

			$_search = implode(' AND ', $_search);

			$query .= $_search;

			$query .= "
				)
			";
		}

		$query .= " ORDER BY danga_year, ins_datetime ";

		$page = ( isset($condition['page']) && !empty($condition['page']) ) ? (int)$condition['page'] : 0;
		$limit = ( isset($condition['limit']) && !empty($condition['limit']) ) ? (int)$condition['limit'] : (int)$this->config->item('paging_limit2');

		// MariaDB 이슈
		$query .= " LIMIT 18446744073709551615 ";

		$query .= "
			) T,
			( SELECT @RNUM := 0 ) R
		";

		$query .= "
			ORDER BY rownum DESC
		";

		$query .= " LIMIT ".$page.", ".$limit." ";

      	return $this->db->query($query)->result();  
	}

	// 단가 갯수
	public function get_danga_count($condition)
	{
		$query = "
			SELECT
				COUNT(*) AS cnt
			FROM
				gongsabi_data_danga
			WHERE
				1 = 1
		";

		if ( isset($condition['danga_category1']) && $condition['danga_category1'] != '' )
		{
			$query .= "
				AND danga_category1 = '".$condition['danga_category1']."'
			";
		}

		if ( isset($condition['danga_category2']) && $condition['danga_category2'] != '' )
		{
			$query .= "
				AND danga_category2 = '".$condition['danga_category2']."'
			";
		}

		if ( isset($condition['keyword']) && $condition['keyword'] != '' )
		{
			$query .= "
				AND (
			";

			$keywords = explode(' ', $condition['keyword']);

			$_search = array();

			foreach ( $keywords as $keyword ) {
				$_search[] = " ( danga_name LIKE '%".$keyword."%' OR danga_standard LIKE '%".$keyword."%' ) ";
			}

			$_search = implode(' AND ', $_search);

			$query .= $_search;

			$query .= "
				)
			";
		}

      	return $this->db->query($query)->result();  
	}
}