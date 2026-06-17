<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function get_member_list($condition)
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
				".$this->config->item('dbprefix')."member
			WHERE
				1 = 1
		";

		if ( isset($condition['member_seq']) && $condition['member_seq'] != '' )
		{
			$sql .= "
				AND member_seq = '".$condition['member_seq']."'
			";
		}

		if ( isset($condition['member_id']) && $condition['member_id'] != '' )
		{
			$sql .= "
				AND member_id = '".$condition['member_id']."'
			";
		}

		if ( isset($condition['member_type']) && $condition['member_type'] != '' )
		{
			$sql .= "
				AND member_type = '".$condition['member_type']."'
			";
		}

		if ( isset($condition['member_hp']) && $condition['member_hp'] != '' )
		{
			$sql .= "
				AND member_hp = '".$condition['member_hp']."'
			";
		}

		if ( isset($condition['member_use']) && $condition['member_use'] != '' )
		{
			$sql .= "
				AND member_use = '".$condition['member_use']."'
			";
		} else {
			$sql .= " AND member_use IN (1, 8) ";
		}

		if ( isset($condition['keyword']) && $condition['keyword'] != '' )
		{
			$sql .= "
				AND (
					member_name LIKE '%".$condition['keyword']."%'
					OR member_id LIKE '%".$condition['keyword']."%'
					OR member_hp LIKE '%".$condition['keyword']."%'
				)
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

	public function get_member_count($condition)
	{
		$sql = "
			SELECT
				COUNT(*) AS cnt
			FROM
				".$this->config->item('dbprefix')."member
			WHERE
				1 = 1
		";

		if ( isset($condition['member_seq']) && $condition['member_seq'] != '' )
		{
			$sql .= "
				AND member_seq = '".$condition['member_seq']."'
			";
		}

		if ( isset($condition['member_id']) && $condition['member_id'] != '' )
		{
			$sql .= "
				AND member_id = '".$condition['member_id']."'
			";
		}

		if ( isset($condition['member_type']) && $condition['member_type'] != '' )
		{
			$sql .= "
				AND member_type = '".$condition['member_type']."'
			";
		}

		if ( isset($condition['member_hp']) && $condition['member_hp'] != '' )
		{
			$sql .= "
				AND member_hp = '".$condition['member_hp']."'
			";
		}

		if ( isset($condition['member_use']) && $condition['member_use'] != '' )
		{
			$sql .= "
				AND member_use = '".$condition['member_use']."'
			";
		} else {
			$sql .= " AND member_use IN (1, 8) ";
		}

		if ( isset($condition['keyword']) && $condition['keyword'] != '' )
		{
			$sql .= "
				AND (
					member_name LIKE '%".$condition['keyword']."%'
					OR member_id LIKE '%".$condition['keyword']."%'
					OR member_hp LIKE '%".$condition['keyword']."%'
				)
			";
		}

      	return $this->db->query($sql)->result(); 
	}

	public function regist_member($values)
	{
		$result = $this->db->insert($this->config->item('dbprefix').'member', $values);

		return $result;
	}

	public function modify_member($values)
	{
		$data = array(
			'upd_datetime' 	=> $values['upd_datetime'],
			'upd_ip'		=> $values['upd_ip']
		);

		if ( isset($values['member_level']) )
			$data['member_level'] = $values['member_level'];
		if ( isset($values['member_use']) )
			$data['member_use'] = $values['member_use'];
		if ( isset($values['member_type']) )
			$data['member_type'] = $values['member_type'];
		if ( isset($values['member_name']) )
			$data['member_name'] = $values['member_name'];
		if ( isset($values['member_password_original']) )
			$data['member_password_original'] = $values['member_password_original'];
		if ( isset($values['member_password']) )
			$data['member_password'] = $values['member_password'];
		if ( isset($values['member_email']) )
			$data['member_email'] = $values['member_email'];
		if ( isset($values['member_hp']) )
			$data['member_hp'] = $values['member_hp'];
		if ( isset($values['member_company']) )
			$data['member_company'] = $values['member_company'];
		if ( isset($values['member_position']) )
			$data['member_position'] = $values['member_position'];
		if ( isset($values['leave_reason']) )
			$data['leave_reason'] = $values['leave_reason'];
		if ( isset($values['leave_datetime']) )
			$data['leave_datetime'] = $values['leave_datetime'];
		if ( isset($values['member_agree1_yn']) )
			$data['member_agree1_yn'] = $values['member_agree1_yn'];
		if ( isset($values['member_agree2_yn']) )
			$data['member_agree2_yn'] = $values['member_agree2_yn'];
		if ( isset($values['agree_datetime']) )
			$data['agree_datetime'] = $values['agree_datetime'];

		if ( isset($values['member_id']) )
			$this->db->where('member_id', $values['member_id']);
		if ( isset($values['member_seq']) )
			$this->db->where('member_seq', $values['member_seq']);

		$result = $this->db->update($this->config->item('dbprefix').'member', $data);

		return $result;
	}

	public function delete_member($values)
	{
		$data = array(
			// 삭제
			'member_use' 	=> '9',
			'del_datetime' 	=> $values['del_datetime'],
			'del_ip'		=> $values['del_ip']
		);

		$this->db->where('member_seq', $values['member_seq']);

		$result = $this->db->update($this->config->item('dbprefix').'member', $data);

		return $result;
	}
}