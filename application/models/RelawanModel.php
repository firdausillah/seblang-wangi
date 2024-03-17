<?php
 class RelawanModel extends CI_Model{

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
		$this->db->where(['is_active' =>1]);
 		return $this->db->get('relawan');
 	}

 	function findBy($id, $order = ''){
		// print_r($id);
		// print_r($order);
		// exit();
 		$this->db->where($id);
		$this->db->order_by($order);
 		return $this->db->get('relawan');
 	}

 	function relawanPeserta($id, $order = '', $not_in = ''){
		// untuk option peserta event di menu even->pengajuan (menampilkan relawan selain yang sudah diinput)
 		$this->db->where($id);
		$this->db->order_by($order);
		$this->db->where_not_in('id', $not_in);
 		return $this->db->get('relawan');
 	}

 	function add($data){
		$additional_data = $this->add_additional();
 		return $this->db->insert('relawan', $additional_data + $data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('relawan',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('relawan');
 	}
 }
