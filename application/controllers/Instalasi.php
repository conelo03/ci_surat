<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instalasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('status_login') != TRUE) {
			$this->session->set_flashdata('notif', 'AKSES GAGAL HARAP LOGIN !');
			redirect('');
		};
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('user_model');
		$this->load->model('jabatan_model');
		$this->load->model('instalasi_model');
	}

	public function index(){
		$data = array(
			'instalasi'     => $this->instalasi_model->get_data('instalasi')->result() 
		);
		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/instalasi/view_instalasi', $data);
		$this->load->view('template/footer');
	}

	public function tambah_instalasi(){
		$data = array(
			'jabatan'=> $this->jabatan_model->get_data('jabatan')->result()
		);
		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/instalasi/tambah_instalasi',$data);
		$this->load->view('template/footer');
	}

	public function aksi_tambah_instalasi(){
		$id_jabatan 	= $this->input->post('id_jabatan');
		$nama_instalasi 	= $this->input->post('nama_instalasi');
		$kode_surat 	= $this->input->post('kode_surat');
		$this->form_validation->set_rules('id_jabatan','Jabatan', 'required',array('required' => 'Jabatan'));
		$this->form_validation->set_rules('nama_instalasi','Nama Instalasi', 'required',array('required' => 'Nama Instalasi'));
		$this->form_validation->set_rules('kode_surat','Kode Surat', 'required',array('required' => 'Kode Surat'));
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Arsip Instalasi - Tambah Instalasi' 
			);
			$this->load->view('template/header', $data);
			$this->load->view('template/nav');
			$this->load->view('halaman/instalasi/tambah_instalasi');
			$this->load->view('template/footer');
		} else {
			$data = array(
				'id_jabatan' => $id_jabatan,
				'nama_instalasi' => $nama_instalasi,
				'kode_surat' => $kode_surat
			);
			$this->instalasi_model->insert_data('instalasi',$data);
			$this->session->set_flashdata('sukses', 'Instalasi Berhasil Di Tambahkan !');
			redirect('instalasi','refresh');
		}
	}

	public function edit_instalasi($id_instalasi){
		$where = $id_instalasi;
		$data = array(
			'instalasi'     => $this->instalasi_model->edit_data($where,'instalasi')->result(),
			'jabatan'=> $this->jabatan_model->get_data('jabatan')->result()
		);
		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/instalasi/edit_instalasi', $data);
		$this->load->view('template/footer');
	}

	public function aksi_edit_instalasi(){
		$id_instalasi  = $this->input->post('id_instalasi');

		$id_jabatan 	= $this->input->post('id_jabatan');
		$nama_instalasi 	= $this->input->post('nama_instalasi');
		$kode_surat 	= $this->input->post('kode_surat');
		$this->form_validation->set_rules('id_jabatan','Jabatan', 'required',array('required' => 'Jabatan'));
		$this->form_validation->set_rules('nama_instalasi','Nama Instalasi', 'required',array('required' => 'Nama Instalasi'));
		$this->form_validation->set_rules('kode_surat','Kode Surat', 'required',array('required' => 'Kode Surat'));
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Arsip Surat - Edit Instalasi'
			);
			$this->load->view('template/header', $data);
			$this->load->view('template/nav');
			$this->load->view('halaman/instalasi/edit_instalasi');
			$this->load->view('template/footer');
		} else {
			$id_instalasi = array('id_instalasi' => $id_instalasi );
			$data = array(
				'id_jabatan' => $id_jabatan,
				'nama_instalasi' => $nama_instalasi,
				'kode_surat' => $kode_surat
			);
			$this->instalasi_model->update_data('instalasi',$data,$id_instalasi);
			$this->session->set_flashdata('sukses', 'Instalasi Berhasil Di Edit !');
			redirect('instalasi','refresh');
		}
	}

	public function hapus_instalasi(){
		$id_instalasi['id_instalasi'] = $this->uri->segment(3);
		$this->instalasi_model->delete_data('instalasi',$id_instalasi);
		$this->session->set_flashdata('sukses', 'Data Instalasi Berhasil Di Hapus !');
		redirect('instalasi','refresh');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */