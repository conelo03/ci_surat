<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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
			'user'     => $this->user_model->get_data_user('user')->result() 
		);
		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/user/view_user', $data);
		$this->load->view('template/footer');
	}

	public function tambah_user(){
		$data = array(
			'jabatan'=> $this->jabatan_model->get_data('jabatan')->result()
		);
		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/user/tambah_user',$data);
		$this->load->view('template/footer');
	}

	public function aksi_tambah_user(){
		$username 	= $this->input->post('username');
		$password 	= md5($this->input->post('password'));
		$nama 	  	= $this->input->post('nama');
		$jbt	= $this->input->post('jabatan');
		$nip	  	= $this->input->post('nip');
		$level	  	= $this->input->post('level');
		$this->form_validation->set_rules('username','Username', 'required',array('required' => 'Masukan Username'));
		$this->form_validation->set_rules('password','Password', 'required',array('required' => 'Masukan Password')); 
		$this->form_validation->set_rules('nama','Nama', 'required',array('required' => 'Masukan Nama'));
		$this->form_validation->set_rules('nip','NIP', 'required',array('required' => 'Masukan NIP'));
		$this->form_validation->set_rules('level','Level', 'required',array('required' => 'Pilih Tipe Level'));
		$this->form_validation->set_rules('jabatan','Jabatan', 'required',array('required' => 'Pilih Jabatan'));
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Arsip Surat - Tambah User' 
			);
			$this->load->view('template/header',$data);
			$this->load->view('template/nav');
			$this->load->view('halaman/user/tambah_user');
			$this->load->view('template/footer');
		} else {
			$pch_jbt = explode('-', $jbt);
			$data = array(
				'username' => $username,
				'password' => $password,
				'nama'     => $nama,
				'id_jabatan'     => $pch_jbt[0],
				'jabatan'     => $pch_jbt[1],
				'nip'      => $nip,
				'level'    => $level 
			);
			$this->user_model->insert_data_user('user',$data);
			$this->session->set_flashdata('sukses', 'User Berhasil Di Tambahkan !');
			redirect('user','refresh');
		}
	}

	public function edit_user($id_user){
		$where = $id_user;
		$data = array(
			'user'     => $this->user_model->edit_data_user($where,'user')->result(),
			'jabatan'=> $this->jabatan_model->get_data('jabatan')->result() 
		);
		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/user/edit_user', $data);
		$this->load->view('template/footer');
	}

	public function aksi_edit_user(){
		$id_user  = $this->input->post('id_user');

		$username = $this->input->post('username');
		$nama 	  = $this->input->post('nama');
		$nip	  = $this->input->post('nip');
		$level	  = $this->input->post('level');
		$jbt	= $this->input->post('jabatan');
		$this->form_validation->set_rules('jabatan','Jabatan', 'required',array('required' => 'Pilih Jabatan'));
		$this->form_validation->set_rules('username','Username', 'required',array('required' => 'Masukan Username')); 
		$this->form_validation->set_rules('nama','Nama', 'required',array('required' => 'Masukan Nama'));
		$this->form_validation->set_rules('nip','NIP', 'required',array('required' => 'Masukan NIP'));
		$this->form_validation->set_rules('level','Level', 'required',array('required' => 'Pilih Tipe Level'));
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Arsip Surat - Edit User'
			);
			$this->load->view('template/header',$data);
			$this->load->view('template/nav');
			$this->load->view('halaman/user/edit_user');
			$this->load->view('template/footer');
		} else {
			$id_user = array('id_user' => $id_user );
			$pch_jbt = explode('-', $jbt);
			$data = array(
				'username' => $username,
				'nama'     => $nama,
				'id_jabatan'     => $pch_jbt[0],
				'jabatan'     => $pch_jbt[1],
				'nip'      => $nip,
				'level'    => $level 
			);
			$this->user_model->update_data_user('user',$data,$id_user);
			$this->session->set_flashdata('sukses', 'User Berhasil Di Edit !');
			redirect('user','refresh');
		}
	}

	public function hapus_user(){
		$id_user['id_user'] = $this->uri->segment(3);
		$this->user_model->delete_data_user('user',$id_user);
		$this->session->set_flashdata('sukses', 'Data User Berhasil Di Hapus !');
		redirect('user','refresh');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */