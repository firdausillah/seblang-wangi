<?php
 class AuthModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
	function cekLogin($table, $where){
		$this->db->where($where);
		return $this->db->get($table);
	}
 }
