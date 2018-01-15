<?php

class Adminmod extends CI_Model{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function select_where_username($u)
	{
		$this->db->where('username', $u);
		$obj=$this->db->get('admin_tbl');
		return $obj;
	}
}
?>