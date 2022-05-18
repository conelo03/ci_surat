<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		//Do your magic here
	}

	public function get_data_user($table){
		return $this->db->select('*, user.jabatan as jabatan')->from($table)->join('jabatan','user.id_jabatan=jabatan.id_jabatan')->get();
	}

	public function insert_data_user($table,$data){
		$this->db->insert($table,$data);
	}

	public function edit_data_user($where,$table){
		return $this->db->select('*')->from($table)->join('jabatan','user.id_jabatan=jabatan.id_jabatan')->where(''.$table.'.id_user='.$where.'')->get();
	}

	public function update_data_user($table,$data,$id_user){
		$this->db->update($table,$data,$id_user);
	}

	public function delete_data_user($table,$data){
		$this->db->delete($table,$data);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */