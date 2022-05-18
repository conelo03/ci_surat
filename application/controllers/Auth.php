<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('auth_model');
	}

	public function index(){
		$this->load->view('login');
	}

	public function cek_auth(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$result = $this->auth_model->login($username,$password);
		if ($result) {
			$sess_array = array();
			foreach ($result as $row){
				$sess_array = array(
					'id_user' 	   	=> $row->id_user,
					'username' 	   	=> $row->username,
					'nama' 		   	=> $row->nama,
					'id_jabatan'	=> $row->id_jabatan,
					'jabatan'		=> $row->jabatan,
					'nip' 		   	=> $row->nip,
					'level' 	   	=> $row->level,
					'status_login' 	=> TRUE
				);
				$this->session->set_userdata($sess_array);
				$this->session->set_flashdata('sukses', 'Selamat Datang di Sistem Informasi Manajemen Surat.');
				redirect('dashboard','refresh');
			}
			return TRUE;
		} else {
			$this->session->set_flashdata('error', 'Username atau Password Salah!');
			redirect('auth','refresh');
			return FALSE;
		}
	}

	public function logout(){
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('id_jabatan');
		$this->session->unset_userdata('nip');
		$this->session->unset_userdata('status_login');
		$this->session->set_flashdata('notif', 'ANDA SUDAH KELUAR');
		redirect('auth');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */