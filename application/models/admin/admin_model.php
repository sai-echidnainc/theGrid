<?php
class Admin_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function check_user($username = false, $password = false)
	{
		if ($username == false || $password == false)
		{
			return false;
		}
	
		$query = $this->db->get_where('users', array('user_name' => $username, 'password' => $password));
		return $query->row_array();
	}
}