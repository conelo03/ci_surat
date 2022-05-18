<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_surat_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}

	public function get_data_surat($table){
		return $this->db->get($table);
	}

	public function get_data_surat_keluar($table){
		$jabatan = $this->session->userdata('jabatan');
		/*if ($jabatan == 'Bagian Umum'){
			return $this->db->select('*')->from('surat')->join('jabatan','surat.tujuan=jabatan.id_jabatan')->where('surat.jenis_surat','Internal')->get();
		}*/
		return $this->db->select('*')->from('surat')->join('jabatan','surat.tujuan=jabatan.id_jabatan')->where('surat.jenis_surat','Internal')->where('surat.asal',$jabatan)->get();
	}

	public function get_data_surat_keluar_eksternal($table){
		$jabatan = $this->session->userdata('jabatan');
		if ($jabatan == 'Bagian Umum'){
			return $this->db->select('*')->from('surat')->where('surat.jenis_surat','Eksternal Keluar')->get();
		}
		return $this->db->select('*')->from('surat')->where('surat.jenis_surat','Eksternal Keluar')->where('surat.asal',$jabatan)->get();
	}

	public function get_data_surat_masuk_eksternal($table){
		$id_jabatan = $this->session->userdata('id_jabatan');
		return $this->db->query("SELECT surat.no_surat,surat.asal,surat.jenis_surat,surat.sifat,surat.perihal,surat.tanggal,surat.status,surat.id_surat, jabatan.jabatan as jabatan_tujuan from surat join jabatan on surat.tujuan=jabatan.id_jabatan where surat.jenis_surat='Eksternal' and (surat.status='0' or surat.status='1' or surat.status='2'or surat.status='3') UNION SELECT surat.no_surat,surat.asal,surat.jenis_surat,surat.sifat,surat.perihal,surat.tanggal,surat.status,surat.id_surat, jabatan.jabatan as jabatan_tujuan from surat join jabatan on surat.tujuan=jabatan.id_jabatan join disposisi_surat on disposisi_surat.id_surat=surat.id_surat join instruksi on instruksi.id_disposisi=disposisi_surat.id_disposisi where instruksi.terusan='$id_jabatan' and surat.jenis_surat='Eksternal' and surat.status='3'");
	}

	public function get_all_surat($table){
		return $this->db->select('*, jabatan.jabatan as jabatan_tujuan')->from($table)->join('jabatan',''.$table.'.tujuan=jabatan.id_jabatan')->where('surat.jenis_surat', 'Internal') ->order_by(''.$table.'.id_surat', 'DESC')->get();
	}

	public function get_surat_by_instalasi($table){
		$id_user = $this->session->userdata('id_user');
		return $this->db->query("SELECT * FROM surat join jabatan on (surat.tujuan=jabatan.id_jabatan) where surat.asal='$id_user' and surat.jenis_surat='Internal' and (surat.status='3' or surat.status='4')");
		return $this->db->select('*, jabatan.jabatan as jabatan_tujuan')
						->from('surat')
						->join('jabatan','surat.tujuan=jabatan.id_jabatan')
						->where('surat.asal',$id_user)
						->where('surat.jenis_surat','Internal')
						->where('surat.status', '4')
						->or_where('surat.status', '4')

						->get();
	}

	public function get_surat_by_instruksi($table){
		$id_jabatan = $this->session->userdata('id_jabatan');
		return $this->db->select('*, jabatan.jabatan as jabatan_tujuan')
						->from('surat')
						->join('jabatan','surat.tujuan=jabatan.id_jabatan')
						->join('disposisi_surat','disposisi_surat.id_surat=surat.id_surat')
						->join('instruksi','instruksi.id_disposisi=disposisi_surat.id_disposisi')
						->where('instruksi.terusan',$id_jabatan)
						->where('surat.jenis_surat','Internal')
						->where('surat.status', '3')
						->or_where('surat.status', '4')
						->group_by('instruksi.id_disposisi')
						->get();
	}

	public function get_surat_by_instalasi_eks($table){
		$id_user = $this->session->userdata('id_user');
		return $this->db->query("SELECT * FROM surat join jabatan on (surat.tujuan=jabatan.id_jabatan) where surat.jenis_surat='Eksternal' and (surat.status='3' or surat.status='4')");
		//return $this->db->select('*, jabatan.jabatan as jabatan_tujuan')->from('surat')->join('jabatan','surat.tujuan=jabatan.id_jabatan')->where('surat.jenis_surat','Eksternal')->where('surat.status', '3')->or_where('surat.status', '4')->get();
	}

	public function get_surat_by_instruksi_eks($table){
		$id_jabatan = $this->session->userdata('id_jabatan');
		return $this->db->query("SELECT *, jabatan.jabatan as jabatan_tujuan from surat join jabatan join disposisi_surat join instruksi on surat.tujuan=jabatan.id_jabatan and disposisi_surat.id_surat=surat.id_surat and instruksi.id_disposisi=disposisi_surat.id_disposisi where instruksi.terusan='$id_jabatan' and surat.jenis_surat='Eksternal' and (surat.status='3' or surat.status='4') group by instruksi.id_disposisi");
		
	}

	public function insert_data_surat($table,$data){
		$this->db->insert($table,$data);
	}

	public function get_data_surat_by_id($id,$table){
		return $this->db->select('*, jabatan.jabatan as jabatan_tujuan')->from($table)->join('jabatan',''.$table.'.tujuan=jabatan.id_jabatan')->where('surat.id_surat', $id)->get();
	}

	public function get_data_surat_eks_by_id($id,$table){
		return $this->db->select('*')->from($table)->where('surat.id_surat', $id)->get();
	}

	public function get_data_surat_register_by_id($id,$table){
		return $this->db->select('*, jabatan.jabatan as jabatan_tujuan')->from($table)->join('jabatan',''.$table.'.tujuan=jabatan.id_jabatan')->join('register',''.$table.'.id_surat=register.id_surat')->where('surat.id_surat', $id)->get();
	}

	public function get_data_disposisi_by_id($id,$table){
		return $this->db->select('*, jabatan.jabatan as jabatan_tujuan')->from($table)->join('jabatan',''.$table.'.tujuan=jabatan.id_jabatan')->join('disposisi_surat','disposisi_surat.id_surat=surat.id_surat')->where('disposisi_surat.id_disposisi', $id)->get();
	}

	public function update_data_surat($table,$data,$id_surat){
		$this->db->update($table,$data,$id_surat);
	}

	public function delete_data_surat($table,$data){
		$this->db->delete($table,$data);
	}

	public function download_surat_masuk(){
		$query = $this->db->query("SELECT file FROM surat_masuk WHERE id_surat = '$id_surat'");
		return $query->row_array();
	}

	public function get_no_agenda_masuk(){
		$q = $this->db->query("SELECT MAX(RIGHT(no_agenda,1)) AS kd_max FROM surat_masuk");
		$kd = "";
		if($q->num_rows() > 0) {
			foreach ($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%01s", $tmp);
			}
		}else{
			$kd = "1";
		}
		return "".$kd;
	}

	public function get_no_agenda_keluar(){
		$q = $this->db->query("SELECT MAX(RIGHT(no_agenda,1)) AS kd_max FROM surat_keluar");
		$kd = "";
		if($q->num_rows() > 0) {
			foreach ($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%01s", $tmp);
			}
		}else{
			$kd = "1";
		}
		return "".$kd;
	}
}

/* End of file Transaksi_surat_model.php */
/* Location: ./application/models/Transaksi_surat_model.php */