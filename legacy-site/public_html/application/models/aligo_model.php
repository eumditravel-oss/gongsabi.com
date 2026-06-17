<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aligo_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function regist_aligo_log($values)
	{
		$result = $this->db->insert('gongsabi_aligo_log', $values);

		if ($result) 
			return $this->db->insert_id();
		else
			return false;
	}
}