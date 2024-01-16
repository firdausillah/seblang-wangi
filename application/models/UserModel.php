<?php
 class UserModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
 		return $this->db->get('user');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('user');
 	}

 	function add($data){
 		return $this->db->insert('user',$data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('user',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('user');
 	}
 }
