<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	// 핸들 배너 리스트
	public function get_banner_list($condition)
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
				gongsabi_banner
			WHERE
				1 = 1
		";

		if ( isset($condition['seq']) && $condition['seq'] != '' )
		{
			$query .= "
				AND seq = '".$condition['seq']."'
			";
		}

		if ( isset($condition['area']) && $condition['area'] != '' )
		{
			$query .= "
				AND area = '".$condition['area']."'
			";
		}

		if ( isset($condition['keyword']) && $condition['keyword'] != '' )
		{
			$query .= "
				AND (
					desc LIKE '%".$condition['keyword']."%'
				)
			";
		}

		if ( isset($condition['status']) && $condition['status'] != '' )
		{
			$query .= "
				AND status = '".$condition['status']."'
			";
		}
		else
		{
			$query .= "
				AND status <> '8'
			";			
		}

		// 랜덤을 사용한다면
		if ( isset($condition['use_random']) && $condition['use_random'] == TRUE )
		{
			$query .= " ORDER BY rand() ";
		}
		// 랜덤을 사용하지 않는다면
		else
		{
			$query .= " ORDER BY banner_order DESC, ins_datetime ";
		}

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

		if ( isset($condition['use_limit']) && !empty($condition['use_limit']) && $condition['use_limit'] )
			$query .= " LIMIT ".$page.", ".$limit." ";

      	return $this->db->query($query)->result(); 
	}

	// 핸들 배너 리스트
	public function get_banner_count($condition)
	{
		$query = "
			SELECT
				COUNT(*) AS cnt
			FROM
				gongsabi_banner
			WHERE
				1 = 1
		";

		if ( isset($condition['seq']) && $condition['seq'] != '' )
		{
			$query .= "
				AND seq = '".$condition['seq']."'
			";
		}

		if ( isset($condition['area']) && $condition['area'] != '' )
		{
			$query .= "
				AND area = '".$condition['area']."'
			";
		}

		if ( isset($condition['keyword']) && $condition['keyword'] != '' )
		{
			$query .= "
				AND (
					desc LIKE '%".$condition['keyword']."%'
				)
			";
		}

		if ( isset($condition['status']) && $condition['status'] != '' )
		{
			$query .= "
				AND status = '".$condition['status']."'
			";
		}
		else
		{
			$query .= "
				AND status <> '8'
			";			
		}

      	return $this->db->query($query)->result(); 
	}

	// 핸들 배너 등록
	public function regist_banner($values)
	{
		$result = $this->db->insert('gongsabi_banner', $values);

		return $result;
	}

	// 핸들 배너 수정
	public function modify_banner($values)
	{
		$data = array(
			'area' 			=> $values['area'],
			'upd_datetime' 	=> $values['upd_datetime'],
			'upd_ip'		=> $values['upd_ip']
		);

		if ( isset($values['status']) )
			$data['status'] = $values['status'];
		if ( isset($values['w_link']) )
			$data['w_link'] = $values['w_link'];
		if ( isset($values['m_link']) )
			$data['m_link'] = $values['m_link'];
		if ( isset($values['w_target']) )
			$data['w_target'] = $values['w_target'];
		if ( isset($values['m_target']) )
			$data['m_target'] = $values['m_target'];
		if ( isset($values['w_image']) )
			$data['w_image'] = $values['w_image'];
		if ( isset($values['m_image']) )
			$data['m_image'] = $values['m_image'];
		if ( isset($values['banner_order']) )
			$data['banner_order'] = $values['banner_order'];

		$this->db->where('seq', $values['seq']);

		$result = $this->db->update('gongsabi_banner', $data);

		return $result;
	}

	// 핸들 배너 삭제
	public function delete_handle_banner($values)
	{
		$data = array(
			'status' 		=> '8',
			'del_datetime' 	=> $values['del_datetime'],
			'del_ip'		=> $values['del_ip']
		);

		$this->db->where('seq', $values['seq']);

		$result = $this->db->update('gongsabi_banner', $data);

		return $result;
	}
}