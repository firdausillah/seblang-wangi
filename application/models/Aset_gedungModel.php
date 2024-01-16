<?php
 class Aset_gedungModel extends CI_Model{

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
		$this->db->where(['is_active' => 1, 'jenis_aset' => 'gedung']);
 		return $this->db->get('aset_gedung_tanah');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('aset_gedung_tanah');
 	}

 	function add($data){
		$additional_data = $this->add_additional();
 		return $this->db->insert('aset_gedung_tanah', $additional_data + $data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('aset_gedung_tanah',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('aset_gedung_tanah');
 	}
 }
