<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function get_config_list($condition)
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
				".$this->config->item('dbprefix')."config
			WHERE
				1 = 1
		";

		if ( isset($condition['seq']) && $condition['seq'] != '' )
		{
			$sql .= "
				AND seq = '".$condition['seq']."'
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
					ORDER BY seq
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

	public function modify_config($values)
	{
		if ( isset($values['status']) )
			$data['status'] = $values['status'];
		if ( isset($values['noti_contact_phone1']) )
			$data['noti_contact_phone1'] = $values['noti_contact_phone1'];
		if ( isset($values['noti_qna_phone1']) )
			$data['noti_qna_phone1'] = $values['noti_qna_phone1'];
		if ( isset($values['noti_qna_phone2']) )
			$data['noti_qna_phone2'] = $values['noti_qna_phone2'];
		if ( isset($values['noti_gongsabi_phone1']) )
			$data['noti_gongsabi_phone1'] = $values['noti_gongsabi_phone1'];
		if ( isset($values['noti_gongsabi_phone2']) )
			$data['noti_gongsabi_phone2'] = $values['noti_gongsabi_phone2'];
		if ( isset($values['noti_book_phone1']) )
			$data['noti_book_phone1'] = $values['noti_book_phone1'];
		if ( isset($values['noti_book_phone2']) )
			$data['noti_book_phone2'] = $values['noti_book_phone2'];
		if ( isset($values['noti_lecture_phone1']) )
			$data['noti_lecture_phone1'] = $values['noti_lecture_phone1'];
		if ( isset($values['noti_lecture_phone2']) )
			$data['noti_lecture_phone2'] = $values['noti_lecture_phone2'];
		
		if ( isset($values['seq']) )
			$this->db->where('seq', $values['seq']);

		$result = $this->db->update($this->config->item('dbprefix').'config', $data);

		return $result;
	}
}