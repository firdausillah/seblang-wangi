<?php
 class Event_pendampingModel extends CI_Model{

	// id_event_unit di dapat dari id table event unit

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
 		return $this->db->get('event_pendamping_t');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('event_pendamping_t');
 	}

 	function add($data){
		$additional_data = $this->add_additional();
 		return $this->db->insert('event_pendamping_t', $additional_data + $data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('event_pendamping_t',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('event_pendamping_t');
 	}
 }
