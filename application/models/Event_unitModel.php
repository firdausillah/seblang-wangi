<?php
 class Event_unitModel extends CI_Model{

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
 		return $this->db->get('event_unit_t');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('event_unit_t');
 	}

 	function add($data){
		$additional_data = $this->add_additional();
 		return $this->db->insert('event_unit_t', $additional_data + $data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('event_unit_t',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('event_unit_t');
 	}

	function getUnitTerdaftar($where){
		$query = $this->db->query('SELECT a.id, a.is_approve, a.event_nama AS nama, a.kordinator_nama, a.is_active, b.foto, b.file_info FROM event_unit_t a LEFT JOIN `event` b ON a.id_event = b.id '. $where);
		return $query;
	}
 }
