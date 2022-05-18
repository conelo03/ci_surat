<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		//Do your magic here
	}

	public function get_data($table){
		return $this->db->get($table);
	}

	public function insert_data($table,$data){
		$this->db->insert($table,$data);
	}

	public function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function update_data($table,$data,$id_user){
		$this->db->update($table,$data,$id_user);
	}

	public function delete_data($table,$data){
		$this->db->delete($table,$data);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */