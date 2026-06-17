<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

	// 게시판 상세
	public function get_random_main($condition)
	{
		$query = "
			SELECT
				*
			FROM
				".$condition['parent']."
			WHERE
				use_yn = '1'
				AND target IN ('notice', 'news', 'site')
			ORDER BY RAND()
			LIMIT 0, 2
		";

		return $this->db->query($query)->result();
	}

}