<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('status_login') != TRUE) {
			$this->session->set_flashdata('notif', 'AKSES GAGAL HARAP LOGIN !');
			redirect('');
		};
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('user_model');
		$this->load->model('jabatan_model');
	}

	public function index(){
		$data = array(
			'jabatan'     => $this->jabatan_model->get_data('jabatan')->result() 
		);
		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/jabatan/view_jabatan', $data);
		$this->load->view('template/footer');
	}

	public function tambah_jabatan(){
		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/jabatan/tambah_jabatan');
		$this->load->view('template/footer');
	}

	public function aksi_tambah_jabatan(){
		$jabatan 	= $this->input->post('jabatan');
		$this->form_validation->set_rules('jabatan','Jabatan', 'required',array('required' => 'Jabatan'));
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Arsip Jabatan - Tambah Jabatan' 
			);
			$this->load->view('template/header', $data);
			$this->load->view('template/nav');
			$this->load->view('halaman/jabatan/tambah_jabatan');
			$this->load->view('template/footer');
		} else {
			$data = array(
				'jabatan' => $jabatan
			);
			$this->jabatan_model->insert_data('jabatan',$data);
			$this->session->set_flashdata('sukses', 'Jabatan Berhasil Di Tambahkan !');
			redirect('jabatan','refresh');
		}
	}

	public function edit_jabatan($id_jabatan){
		$where = array('id_jabatan' => $id_jabatan );
		$data = array(
			'jabatan'     => $this->jabatan_model->edit_data($where,'jabatan')->result()
		);
		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/jabatan/edit_jabatan', $data);
		$this->load->view('template/footer');
	}

	public function aksi_edit_jabatan(){
		$id_jabatan  = $this->input->post('id_jabatan');

		$jabatan = $this->input->post('jabatan');
		$this->form_validation->set_rules('jabatan','Jabatan', 'required',array('required' => 'Jabatan'));
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Arsip Surat - Edit Jabatan'
			);
			$this->load->view('template/header', $data);
			$this->load->view('template/nav');
			$this->load->view('halaman/jabatan/edit_jabatan');
			$this->load->view('template/footer');
		} else {
			$id_jabatan = array('id_jabatan' => $id_jabatan );
			$data = array(
				'jabatan' => $jabatan
			);
			$this->jabatan_model->update_data('jabatan',$data,$id_jabatan);
			$this->session->set_flashdata('sukses', 'Jabatan Berhasil Di Edit !');
			redirect('jabatan','refresh');
		}
	}

	public function hapus_jabatan(){
		$id_jabatan['id_jabatan'] = $this->uri->segment(3);
		$this->jabatan_model->delete_data('jabatan',$id_jabatan);
		$this->session->set_flashdata('sukses', 'Data jabatan Berhasil Di Hapus !');
		redirect('jabatan','refresh');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */