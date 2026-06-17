<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Scrap_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function get_scrap_list($condition)
	{
		$sql = "
			SELECT 
				@RNUM := @RNUM + 1 AS rownum,
				T.*
			FROM
			(
		";

		$sql .= "
			SELECT
				*
			FROM
				".$this->config->item('dbprefix')."scrap
			WHERE
				1 = 1
		";

		if ( isset($condition['seq']) && $condition['seq'] != '' )
		{
			$sql .= "
				AND seq = '".$condition['seq']."'
			";
		}

		if ( isset($condition['member_id']) && $condition['member_id'] != '' )
		{
			$sql .= "
				AND member_id = '".$condition['member_id']."'
			";
		}

		if ( isset($condition['type']) && $condition['type'] != '' )
		{
			$sql .= "
				AND type = '".$condition['type']."'
			";
		}

		if ( isset($condition['data_seq']) && $condition['data_seq'] != '' )
		{
			$sql .= "
				AND data_seq = '".$condition['data_seq']."'
			";
		}

		// 랜덤을 사용한다면
		if ( isset($condition['use_random']) && $condition['use_random'] == TRUE )
		{
			$sql .= "
				ORDER BY rand()
			";
		}
		// 랜덤을 사용하지 않는다면
		else
		{
			if (
				isset($condition['sort_field']) && $condition['sort_field'] != '' && 
				isset($condition['sort']) && $condition['sort'] != ''
			)
			{
				$sql .= "
					ORDER BY ".$condition['sort_field']." ".$condition['sort']."
				";
			}
			else
			{
				$sql .= "
					ORDER BY ins_datetime
				";
			}
		}

		$page = ( isset($condition['page']) && !empty($condition['page']) ) ? (int)$condition['page'] : 0;
		$limit = ( isset($condition['limit']) && !empty($condition['limit']) ) ? (int)$condition['limit'] : (int)$this->config->item('paging_limit');

		// MariaDB 이슈
		// $sql .= " LIMIT 18446744073709551615 ";

		$sql .= "
			) T,
			( SELECT @RNUM := 0 ) R
		";

		$sql .= "
			ORDER BY rownum DESC
		";

		$sql .= " LIMIT ".$page.", ".$limit." ";

      	return $this->db->query($sql)->result(); 
	}

	public function get_scrap_count($condition)
	{
		$sql = "
			SELECT
				COUNT(*) AS cnt
			FROM
				".$this->config->item('dbprefix')."scrap
			WHERE
				1 = 1
		";

		if ( isset($condition['seq']) && $condition['seq'] != '' )
		{
			$sql .= "
				AND seq = '".$condition['seq']."'
			";
		}

		if ( isset($condition['member_id']) && $condition['member_id'] != '' )
		{
			$sql .= "
				AND member_id = '".$condition['member_id']."'
			";
		}

		if ( isset($condition['type']) && $condition['type'] != '' )
		{
			$sql .= "
				AND type = '".$condition['type']."'
			";
		}

		if ( isset($condition['data_seq']) && $condition['data_seq'] != '' )
		{
			$sql .= "
				AND data_seq = '".$condition['data_seq']."'
			";
		}

      	return $this->db->query($sql)->result(); 
	}

	public function regist_scrap($values)
	{
		$result = $this->db->insert($this->config->item('dbprefix').'scrap', $values);

		return $result;
	}

	public function delete_scrap($values)
	{
		$this->db->where('seq', $values['seq']);

		$result = $this->db->delete($this->config->item('dbprefix').'scrap', $values);

		return $result;
	}
}