<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instalasi_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		//Do your magic here
	}

	public function get_data($table){
		return $this->db->select('*')->from($table)->join('jabatan',''.$table.'.id_jabatan=jabatan.id_jabatan')->get();
	}

	public function insert_data($table,$data){
		$this->db->insert($table,$data);
	}

	public function edit_data($where,$table){
		return $this->db->select('*')->from($table)->join('jabatan',''.$table.'.id_jabatan=jabatan.id_jabatan')->where(''.$table.'.id_instalasi='.$where.'')->get();
	}

	public function update_data($table,$data,$id){
		$this->db->update($table,$data,$id);
	}

	public function delete_data($table,$data){
		$this->db->delete($table,$data);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */