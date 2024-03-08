<?php
 class UserModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
 		return $this->db->get('users');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('users');
 	}

 	function add($data){
 		return $this->db->insert('users',$data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('users',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('users');
 	}
 }
