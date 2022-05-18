<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		//Do your magic here
	}

	public function get_data_disposisi($table){
		$id_user = $this->session->userdata('id_user');
		return $this->db->select('*, jabatan.jabatan as jabatan_tujuan')->from($table)->join('jabatan',''.$table.'.tujuan=jabatan.id_jabatan')->where('surat.status','1')->get();
	}

	public function get_data_disposisi_by_id($id_surat){
		$this->db->select('*');
		$this->db->from('disposisi_surat');
		$this->db->join('surat', 'surat.id_surat = disposisi_surat.id_surat');
		$this->db->where('disposisi_surat.id_surat', $id_surat);
		$query = $this->db->get();
		return $query;
	}

	public function get_data_instruksi_by_id($id_disposisi){
		$this->db->select('*');
		$this->db->from('instruksi');
		$this->db->join('disposisi_surat', 'instruksi.id_disposisi = disposisi_surat.id_disposisi');
		$this->db->join('jabatan', 'instruksi.terusan = jabatan.id_jabatan');
		$this->db->where('instruksi.id_disposisi', $id_disposisi);
		$query = $this->db->get();
		return $query;
	}

	public function get_data_instruksi_by_id_instruksi($id_instruksi){
		$this->db->select('*');
		$this->db->from('instruksi');
		$this->db->where('instruksi.id_instruksi', $id_instruksi);
		$query = $this->db->get();
		return $query;
	}

	public function get_surat_for_disposisi(){
		$this->db->select('*');
		$this->db->from('disposisi');
		$this->db->join('surat_masuk', 'surat_masuk.id_surat = disposisi.id_surat');
		$query = $this->db->get();
		return $query;
	}

	public function insert_surat_disposisi($table,$data){
		$this->db->insert($table,$data);
	}

	public function get_surat_disposisi_by_id($id,$table){
		return $this->db->select('*, jabatan.jabatan as jabatan_tujuan')->from($table)->join('jabatan',''.$table.'.tujuan=jabatan.id_jabatan')->where('surat.id_surat', $id)->get();
	}

	public function update_surat_disposisi($table,$data,$id_disposisi){
		$this->db->update($table,$data,$id_disposisi);
	}

	public function delete_surat_disposisi($table,$data){
		$this->db->delete($table,$data);
	}
	

}

/* End of file Disposisi_model.php */
/* Location: ./application/models/Disposisi_model.php */