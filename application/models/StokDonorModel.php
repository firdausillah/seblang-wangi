<?php
 class StokDonorModel extends CI_Model{

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
		// print_r($this->add_additional());
		$this->db->where(['is_active' => 1]);
 		return $this->db->get('stok_donor');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('stok_donor');
 	}

 	function add($data){
		$additional_data = $this->add_additional();
		// print_r($additional_data + $data); 
		// exit();
 		return $this->db->insert('stok_donor', $additional_data + $data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('stok_donor',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('stok_donor');
 	}
 }
