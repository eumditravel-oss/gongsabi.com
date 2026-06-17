<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	// 핸들 배너 리스트
	public function get_book_review_list($condition)
	{
		$query = "
			SELECT
				review.*,
				member.member_name
			FROM
				gongsabi_book_review AS review
				JOIN
				gongsabi_member AS member
				ON
				review.ins_user = member.member_id
			WHERE
				1 = 1
		";

		if ( isset($condition['review_seq']) && $condition['review_seq'] != '' )
		{
			$query .= "
				AND review_seq = '".$condition['review_seq']."'
			";
		}

		if ( isset($condition['book_num']) && $condition['book_num'] != '' )
		{
			$query .= "
				AND book_num = '".$condition['book_num']."'
			";
		}

		if ( isset($condition['ins_user']) && $condition['ins_user'] != '' )
		{
			$query .= "
				AND ins_user = '".$condition['ins_user']."'
			";
		}

		if ( isset($condition['order_by']) )
		{
			if ( $condition['order_by'] == 'score' )
			{
				$query .= " ORDER BY review_score DESC, ins_datetime DESC ";
			}
			else if ( $condition['order_by'] == 'new' )
			{
				$query .= " ORDER BY ins_datetime DESC ";
			}
		}

		$page = ( isset($condition['page']) && !empty($condition['page']) ) ? (int)$condition['page'] : 0;
		$limit = ( isset($condition['limit']) && !empty($condition['limit']) ) ? (int)$condition['limit'] : (int)$this->config->item('paging_limit');

		$query .= " LIMIT ".$page.", ".$limit." ";

		// echo $query;

      	return $this->db->query($query)->result(); 
	}

	// 핸들 배너 리스트
	public function get_book_review_count($condition)
	{
		$query = "
			SELECT
				COUNT(*) AS cnt
			FROM
				gongsabi_book_review
			WHERE
				1 = 1
		";

		if ( isset($condition['review_seq']) && $condition['review_seq'] != '' )
		{
			$query .= "
				AND review_seq = '".$condition['review_seq']."'
			";
		}

		if ( isset($condition['book_num']) && $condition['book_num'] != '' )
		{
			$query .= "
				AND book_num = '".$condition['book_num']."'
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

	// 핸들 배너 등록
	public function regist_book_review($values)
	{
		$result = $this->db->insert('gongsabi_book_review', $values);

		return $result;
	}

	// 핸들 배너 수정
	public function modify_book_review($values)
	{
		$data = array(
			'upd_datetime' 	=> $values['upd_datetime'],
			'upd_ip'		=> $values['upd_ip'],
		);

		if ( isset($values['review_comment']) )
			$data['review_comment'] = $values['review_comment'];
		if ( isset($values['review_score']) )
			$data['review_score'] = $values['review_score'];

		$this->db->where('review_seq', $values['review_seq']);

		$result = $this->db->update('gongsabi_book_review', $data);

		return $result;
	}

	// 핸들 배너 삭제
	public function delete_book_review($values)
	{
		$this->db->where('review_seq', $values['review_seq']);

		$result = $this->db->delete('gongsabi_book_review');

		return $result;
	}

	// 핸들 배너 리스트
	public function get_book_review_summary($condition)
	{
		$query = "
			SELECT
				review_score,
				COUNT(review_score) AS count
			FROM
				gongsabi_book_review
			WHERE
				1 = 1
		";

		if ( isset($condition['book_num']) && $condition['book_num'] != '' )
		{
			$query .= "
				AND book_num = '".$condition['book_num']."'
			";
		}

		$query .= "
			GROUP BY review_score
		";

		// echo $query;

      	return $this->db->query($query)->result(); 
	}
}