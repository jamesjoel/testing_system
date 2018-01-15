<?php

class Studentmod extends CI_Model{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insert($data)
	{
		$this->db->insert('question_tbl', $data);
	}
	function get_all()
	{
		$obj=$this->db->get('question_tbl');
		return $obj;
	}
	function get_all_by_id($id)
	{
		$this->db->where('id', $id);
		$obj=$this->db->get('question_tbl');
		return $obj;
	}
	
	function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('question_tbl', $data);
	}
	function delete_by_id($id)
	{

	}
	
}
?>