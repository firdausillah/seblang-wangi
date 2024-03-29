<?php
 class Unit_kordinatorModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
	function add_additional(){
		$user_id = $_SESSION['id'];
		date_default_timezone_set('Asia/Jakarta');
		return $data = [
			'created_by' => $user_id,
			'created_on' => date('Y-m-d H:i:s')
		];
	}

 	function get(){
		$this->db->where(['is_active' => 1]);
 		return $this->db->get('unit_kordinator');
 	}

 	function findBy($id){
 		$this->db->where($id);
		$this->db->where(['is_active' => 1]);
 		return $this->db->get('unit_kordinator');
 	}

 	function findByLike($id){
 		$this->db->like($id);
 		return $this->db->get('unit_kordinator');
 	}

 	function add($data){
		$additional_data = $this->add_additional();
 		return $this->db->insert('unit_kordinator', $additional_data + $data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('unit_kordinator',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('unit_kordinator');
 	}
 }
