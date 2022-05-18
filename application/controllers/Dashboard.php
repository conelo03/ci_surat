<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('status_login') != TRUE){
			$this->session->set_flashdata('notif', 'LOGIN GAGAL USERNAME ATAU PASSWORD SALAH !');
			redirect('');
		};
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('transaksi_surat_model');
		$this->load->model('disposisi_model');
		$this->load->model('user_model');
	}

	public function index(){
		if($this->session->userdata('level') == "Instalasi"){
			$data = array(
				'user'     => $this->user_model->edit_data_user($this->session->userdata('id_user'),'user')->row() 
			);
			$this->load->view('template/header');
			$this->load->view('template/nav');
			$this->load->view('halaman/dashboard/view_dashboard',$data);
			$this->load->view('template/footer');
		}else{
			$this->load->view('template/header');
			$this->load->view('template/nav');
			$this->load->view('halaman/dashboard/view_dashboard');
			$this->load->view('template/footer');
		}	
		
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */