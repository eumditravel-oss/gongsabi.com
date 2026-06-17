<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lecture_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function get_lecture_list($condition)
	{
		$sql = "
			SELECT
				*
			FROM
				".$this->config->item('dbprefix')."lecture
			WHERE
				1 = 1
		";

		if ( isset($condition['lecture_use']) && $condition['lecture_use'] == TRUE )
		{
			$sql .= "
				AND lecture_use = '".$condition['lecture_use']."'
			";
		} else {
			$sql .= "
				AND lecture_use = '1'
			";
		}

		if ( isset($condition['lecture_seq']) && $condition['lecture_seq'] != '' )
		{
			$sql .= "
				AND lecture_seq = '".$condition['lecture_seq']."'
			";
		}

		if ( isset($condition['keyword']) && $condition['keyword'] != '' )
		{
			$query .= "
				AND (
					lecture_title LIKE '%".$condition['keyword']."%'
					OR lecture_content LIKE '%".$condition['keyword']."%'
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
					ORDER BY lecture_order
				";
			}
		}

		$page = ( isset($condition['page']) && !empty($condition['page']) ) ? (int)$condition['page'] : 0;
		$limit = ( isset($condition['limit']) && !empty($condition['limit']) ) ? (int)$condition['limit'] : (int)$this->config->item('paging_limit');

		$sql .= " LIMIT ".$page.", ".$limit." ";

      	return $this->db->query($sql)->result(); 
	}

	public function get_lecture_count($condition)
	{
		$sql = "
			SELECT
				COUNT(*) AS cnt
			FROM
				".$this->config->item('dbprefix')."lecture
			WHERE
				1 = 1
		";

		if ( isset($condition['lecture_use']) && $condition['lecture_use'] == TRUE )
		{
			$sql .= "
				AND lecture_use = '".$condition['lecture_use']."'
			";
		} else {
			$sql .= "
				AND lecture_use = '1'
			";
		}

		if ( isset($condition['lecture_seq']) && $condition['lecture_seq'] != '' )
		{
			$sql .= "
				AND lecture_seq = '".$condition['lecture_seq']."'
			";
		}

		if ( isset($condition['keyword']) && $condition['keyword'] != '' )
		{
			$query .= "
				AND (
					lecture_title LIKE '%".$condition['keyword']."%'
					OR lecture_content LIKE '%".$condition['keyword']."%'
				)
			";
		}

      	return $this->db->query($sql)->result(); 
	}

	public function regist_lecture($values)
	{
		$result = $this->db->insert($this->config->item('dbprefix').'lecture', $values);

		return $result;
	}

	public function modify_lecture($values)
	{
		$data = array(
			'lecture_upd_datetime' 	=> $values['lecture_upd_datetime'],
			'lecture_upd_user'		=> $values['lecture_upd_user']
		);

		if ( isset($values['lecture_use']) )
			$data['lecture_use'] = $values['lecture_use'];
		if ( isset($values['lecture_title']) )
			$data['lecture_title'] = $values['lecture_title'];
		if ( isset($values['lecture_time']) )
			$data['lecture_time'] = $values['lecture_time'];
		if ( isset($values['lecture_content']) )
			$data['lecture_content'] = $values['lecture_content'];
		if ( isset($values['lecture_title_eng']) )
			$data['lecture_title_eng'] = $values['lecture_title_eng'];
		if ( isset($values['lecture_time_eng']) )
			$data['lecture_time_eng'] = $values['lecture_time_eng'];
		if ( isset($values['lecture_content_eng']) )
			$data['lecture_content_eng'] = $values['lecture_content_eng'];
		if ( isset($values['lecture_order']) )
			$data['lecture_order'] = $values['lecture_order'];

		if ( isset($values['lecture_seq']) )
			$this->db->where('lecture_seq', $values['lecture_seq']);

		$result = $this->db->update($this->config->item('dbprefix').'lecture', $data);

		return $result;
	}

	public function delete_lecture($values)
	{
		$data = array(
			'lecture_use' 			=> '9',
			'lecture_upd_datetime' 	=> $values['lecture_upd_datetime'],
			'lecture_upd_user'		=> $values['lecture_upd_user']
		);

		$this->db->where('lecture_seq', $values['lecture_seq']);

		$result = $this->db->update($this->config->item('dbprefix').'lecture', $data);

		return $result;
	}

	public function get_lecture_teacher_list($condition)
	{
		$sql = "
			SELECT
				*
			FROM
				".$this->config->item('dbprefix')."lecture_teacher
			WHERE
				1 = 1
		";

		if ( isset($condition['teacher_use']) && $condition['teacher_use'] == TRUE )
		{
			$sql .= "
				AND teacher_use = '".$condition['teacher_use']."'
			";
		} else {
			$sql .= "
				AND teacher_use = '1'
			";
		}

		if ( isset($condition['teacher_seq']) && $condition['teacher_seq'] != '' )
		{
			$sql .= "
				AND teacher_seq = '".$condition['teacher_seq']."'
			";
		}

		if ( isset($condition['keyword']) && $condition['keyword'] != '' )
		{
			$sql .= "
				AND (
					teacher_name LIKE '%".$condition['keyword']."%'
					OR teacher_desc LIKE '%".$condition['keyword']."%'
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

		$sql .= " LIMIT ".$page.", ".$limit." ";

      	return $this->db->query($sql)->result(); 
	}

	public function get_lecture_teacher_count($condition)
	{
		$sql = "
			SELECT
				COUNT(*) AS cnt
			FROM
				".$this->config->item('dbprefix')."lecture_teacher
			WHERE
				1 = 1
		";

		if ( isset($condition['teacher_use']) && $condition['teacher_use'] == TRUE )
		{
			$sql .= "
				AND teacher_use = '".$condition['teacher_use']."'
			";
		} else {
			$sql .= "
				AND teacher_use = '1'
			";
		}

		if ( isset($condition['teacher_seq']) && $condition['teacher_seq'] != '' )
		{
			$sql .= "
				AND teacher_seq = '".$condition['teacher_seq']."'
			";
		}

		if ( isset($condition['keyword']) && $condition['keyword'] != '' )
		{
			$sql .= "
				AND (
					teacher_name LIKE '%".$condition['keyword']."%'
					OR teacher_desc LIKE '%".$condition['keyword']."%'
				)
			";
		}

      	return $this->db->query($sql)->result(); 
	}

	public function regist_lecture_teacher($values)
	{
		$result = $this->db->insert($this->config->item('dbprefix').'lecture_teacher', $values);

		return $result;
	}

	public function modify_lecture_teacher($values)
	{
		$data = array(
			'upd_datetime' 	=> $values['upd_datetime'],
			'upd_user'		=> $values['upd_user']
		);

		if ( isset($values['teacher_use']) )
			$data['teacher_use'] = $values['teacher_use'];
		if ( isset($values['teacher_name']) )
			$data['teacher_name'] = $values['teacher_name'];
		if ( isset($values['teacher_desc']) )
			$data['teacher_desc'] = $values['teacher_desc'];
		if ( isset($values['teacher_name_eng']) )
			$data['teacher_name_eng'] = $values['teacher_name_eng'];
		if ( isset($values['teacher_desc_eng']) )
			$data['teacher_desc_eng'] = $values['teacher_desc_eng'];
		if ( isset($values['teacher_photo']) )
			$data['teacher_photo'] = $values['teacher_photo'];

		if ( isset($values['teacher_seq']) )
			$this->db->where('teacher_seq', $values['teacher_seq']);

		$result = $this->db->update($this->config->item('dbprefix').'lecture_teacher', $data);

		return $result;
	}

	public function delete_lecture_teacher($values)
	{
		$data = array(
			'teacher_use' 	=> '9',
			'upd_datetime' 	=> $values['upd_datetime'],
		);

		if ( isset($values['upd_user']) )
			$data['upd_user'] = $values['upd_user'];

		$this->db->where('teacher_seq', $values['teacher_seq']);

		$result = $this->db->update($this->config->item('dbprefix').'lecture_teacher', $data);

		return $result;
	}
}