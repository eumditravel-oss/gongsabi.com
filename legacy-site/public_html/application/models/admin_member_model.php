<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_member_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function get_admin_member_list($condition)
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
				".$this->config->item('dbprefix')."admin_member
			WHERE
				1 = 1
		";

		if ( isset($condition['admin_member_id']) && $condition['admin_member_id'] != '' )
		{
			$sql .= "
				AND admin_member_id = '".$condition['admin_member_id']."'
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
		$sql .= " LIMIT 18446744073709551615 ";

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

	public function regist_handle_admin_member($values)
	{
		$result = $this->db->insert($this->config->item('dbprefix').'admin_member', $values);

		return $result;
	}

	public function modify_handle_admin_member($values)
	{
		$data = array(
			'upd_datetime' 	=> $values['upd_datetime'],
			'upd_ip'		=> $values['upd_ip']
		);

		if ( isset($values['admin_member_name']) )
			$data['admin_member_name'] = $values['admin_member_name'];
		if ( isset($values['admin_member_password_original']) )
			$data['admin_member_password_original'] = $values['admin_member_password_original'];
		if ( isset($values['admin_member_password']) )
			$data['admin_member_password'] = $values['admin_member_password'];
		if ( isset($values['admin_member_email']) )
			$data['admin_member_email'] = $values['admin_member_email'];
		if ( isset($values['admin_member_hp']) )
			$data['admin_member_hp'] = $values['admin_member_hp'];

		if ( isset($values['admin_member_id']) )
			$this->db->where('admin_member_id', $values['admin_member_id']);
		if ( isset($values['admin_member_seq']) )
			$this->db->where('admin_member_seq', $values['admin_member_seq']);

		$result = $this->db->update($this->config->item('dbprefix').'admin_member', $data);

		return $result;
	}

	public function delete_handle_member($values)
	{
		$data = array(
			'admin_member_use' 	=> '0',
			'del_datetime' 		=> $values['del_datetime'],
			'del_ip'			=> $values['del_ip']
		);

		$this->db->where('admin_member_id', $values['admin_member_id']);

		$result = $this->db->update($this->config->item('dbprefix').'admin_member', $data);

		return $result;
	}
}