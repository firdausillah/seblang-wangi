<?php
 class ProfileModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
 		return $this->db->get('profile');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('profile');
 	}

 	function add($data){
 		return $this->db->insert('profile',$data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('profile',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('profile');
 	}
 }
