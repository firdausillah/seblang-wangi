<?php
 class CetakModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}


 	function get_persons($id_event_unit){
		return $this->db->query('
		SELECT 
			a.relawan_nama, 
			a.relawan_kode,  
			CONCAT(a.unit_jenis, " ", a.unit_kategori, " ", a.unit_nama) AS unit_nama, 
			a.foto, 
			b.event_nama,
			"Peserta" AS sebagai
		FROM event_peserta_t a 
		LEFT JOIN event_unit_t b ON a.id_event_unit = b.id 
		WHERE a.id_event_unit = '. $id_event_unit);
 	}

 	function get_person($id_event_peserta){
		return $this->db->query('
		SELECT 
			a.relawan_nama, 
			a.relawan_kode,  
			CONCAT(a.unit_jenis, " ", a.unit_kategori, " ", a.unit_nama) AS unit_nama, 
			a.foto, 
			b.event_nama,
			"Peserta" AS sebagai
		FROM event_peserta_t a 
		LEFT JOIN event_unit_t b ON a.id_event_unit = b.id 
		WHERE a.id = '. $id_event_peserta);
 	}

 	function get_pendamping($id_event_unit){
		return $this->db->query('
		SELECT 
			a.pendamping_nama, 
			a.kontak,  
			CONCAT(a.unit_jenis, " ", a.unit_kategori, " ", a.unit_nama) AS unit_nama, 
			a.event_nama,
			"Pendamping" AS sebagai
		FROM event_unit_t a 
		WHERE a.id = '. $id_event_unit);
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('event');
 	}

	function findByLike($id)
	{
		$this->db->where(['is_active' => 1]);
		$this->db->like($id);
		return $this->db->get('event');
	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('event',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('event');
 	}
 }
