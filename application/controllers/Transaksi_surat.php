<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_surat extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('status_login') != TRUE) {
			$this->session->set_flashdata('notif', 'AKSES GAGAL HARAP LOGIN !');
			redirect('');
		};
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('Disposisi_model');
		$this->load->model('user_model');
		$this->load->model('jabatan_model');
		$this->load->model('Transaksi_surat_model');
		$this->load->helper('download');
	}

	/* ===================[CRUD Surat Masuk]===================*/
	public function index(){
		if($this->session->userdata('level') == 'Bagian Umum'){
			$data['surat_keluar'] = $this->Transaksi_surat_model->get_all_surat('surat')->result();

			$this->load->view('template/header');
			$this->load->view('template/nav');
			$this->load->view('halaman/surat_masuk/v_surat_masuk', $data);
			$this->load->view('template/footer');
		}elseif ($this->session->userdata('level') == 'Instalasi'){
			$id_user = $this->session->userdata('id_user'); 
			$data['surat_keluar'] = $this->Transaksi_surat_model->get_surat_by_instalasi('surat')->result();
			if(empty($data['surat_keluar'])){
				$data['surat_keluar'] = $this->Transaksi_surat_model->get_surat_by_instruksi('surat')->result();
			} else {
				$data['surat_keluar'] = $this->Transaksi_surat_model->get_surat_by_instalasi('surat')->result();
			}
			$this->load->view('template/header');
			$this->load->view('template/nav');
			$this->load->view('halaman/surat_masuk/v_surat_masuk', $data);
			$this->load->view('template/footer');
		}
		
	}

	public function surat_masuk_eksternal(){
		if($this->session->userdata('level') == 'Bagian Umum'){
			$data['surat_keluar'] = $this->Transaksi_surat_model->get_data_surat_masuk_eksternal('surat')->result();

			$this->load->view('template/header');
			$this->load->view('template/nav');
			$this->load->view('halaman/surat_masuk/v_surat_masuk_eks', $data);
			$this->load->view('template/footer');
		}elseif ($this->session->userdata('level') == 'Instalasi'){
			$id_user = $this->session->userdata('id_user'); 
			
			$data['surat_keluar'] = $this->Transaksi_surat_model->get_surat_by_instruksi_eks('surat')->result();
			$this->load->view('template/header');
			$this->load->view('template/nav');
			$this->load->view('halaman/surat_masuk/v_surat_masuk_eks', $data);
			$this->load->view('template/footer');
		}
		
	}

	public function tambah_surat_masuk_eks(){
		$id_user = $this->session->userdata('id_user');
		$data['user'] = $this->user_model->edit_data_user($this->session->userdata('id_user'),'user')->row();
		$data['instalasi'] = $this->db->get_where('instalasi', ['id_jabatan' => $data['user']->id_jabatan])->row();
		$data['jabatan']= $this->jabatan_model->get_data('jabatan')->result();
      	
		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/surat_masuk/v_tambah_surat_masuk_eks', $data);
		$this->load->view('template/footer');
	}

	public function register_surat($id_surat){
		$data['surat_keluar'] = $this->Transaksi_surat_model->get_data_surat_by_id($id_surat,'surat')->row();
		$data['instalasi'] = $this->db->get_where('instalasi', ['id_jabatan' => $data['surat_keluar']->id_jabatan])->row();
		$data['jabatan']= $this->jabatan_model->get_data('jabatan')->result();
		$pch_tgl =explode('-', date('d-F-Y'));
      	$data['tahun'] = $pch_tgl[2];
      	$getid_disposisi = $this->db->query("SELECT max(id_register) as id_register from register")->row();
      	if(empty($getid_disposisi)){
      		$data['no_index'] = '001';
      		$this->load->view('template/header');
			$this->load->view('template/nav');
			$this->load->view('halaman/surat_masuk/v_register_surat', $data);
			$this->load->view('template/footer');
      	}else{
      		$get_disposisi = $this->db->query("SELECT * from register where id_register='$getid_disposisi->id_register'")->row();
      		if(empty($get_disposisi)){
      			$data['no_index'] = '001';
      		} else {
      			$no = explode('/', $get_disposisi->index_disposisi);
				$no1 =  $no[0] + 1;
				if ($no1 < 10 ){
					$data['no_index'] = '00'.$no1;
				} elseif($no1 > 9){
					$data['no_index'] = '0'.$no1;
				} elseif($no1 > 99){
					$data['no_index'] = $no1;
				}
      		}
			
			$this->load->view('template/header');
			$this->load->view('template/nav');
			$this->load->view('halaman/surat_masuk/v_register_surat', $data);
			$this->load->view('template/footer');
      	}
	}

	public function register_surat_eks($id_surat){
		$data['surat_keluar'] = $this->Transaksi_surat_model->get_data_surat_by_id($id_surat,'surat')->row();
		$data['instalasi'] = $this->db->get_where('instalasi', ['id_jabatan' => $data['surat_keluar']->id_jabatan])->row();
		$data['jabatan']= $this->jabatan_model->get_data('jabatan')->result();
		$pch_tgl =explode('-', date('d-F-Y'));
      	$data['tahun'] = $pch_tgl[2];
      	$getid_disposisi = $this->db->query("SELECT max(id_register) as id_register from register")->row();
      	if(empty($getid_disposisi)){
      		$data['no_index'] = '001';
      		$this->load->view('template/header');
			$this->load->view('template/nav');
			$this->load->view('halaman/surat_masuk/v_register_surat', $data);
			$this->load->view('template/footer');
      	}else{
      		$get_disposisi = $this->db->query("SELECT * from register where id_register='$getid_disposisi->id_register'")->row();
      		if(empty($get_disposisi)){
      			$data['no_index'] = '001';
      		} else {
      			$no = explode('/', $get_disposisi->index_disposisi);
				$no1 =  $no[0] + 1;
				if ($no1 < 10 ){
					$data['no_index'] = '00'.$no1;
				} elseif($no1 > 9){
					$data['no_index'] = '0'.$no1;
				} elseif($no1 > 99){
					$data['no_index'] = $no1;
				}
      		}
			
			$this->load->view('template/header');
			$this->load->view('template/nav');
			$this->load->view('halaman/surat_masuk/v_register_surat_eks', $data);
			$this->load->view('template/footer');
      	}
	}
	/*eki*/
	public function edit_surat_masuk_eks($id_surat){
		$id_surat = $id_surat;
		$data['surat_keluar'] = $this->Transaksi_surat_model->get_data_surat_by_id($id_surat,'surat')->row();
		$data['instalasi'] = $this->db->get_where('instalasi', ['id_jabatan' => $data['surat_keluar']->id_jabatan])->row();
		$data['jabatan']= $this->jabatan_model->get_data('jabatan')->result();
		$pch_tgl =explode('-', date('d-F-Y'));
		$data['bulan'] = $this->bulan_romawi($pch_tgl[1]);
      	$data['tahun'] = $pch_tgl[2];

		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/surat_masuk/v_edit_surat_masuk_eks', $data);
		$this->load->view('template/footer');
	}

	public function aksi_edit_surat_masuk_eks($keluar = null){
		$id_surat   = $this->input->post('id_surat'); 
		$judul   = $this->input->post('judul');
		$no_surat  = $this->input->post('no_surat');
		$tujuan     = $this->input->post('tujuan');
		$asal   = $this->input->post('asal');
		$sifat        = $this->input->post('sifat');
		$tanggal       = $this->input->post('tanggal');
		$perihal  = $this->input->post('perihal');
		$isi  = $this->input->post('isi');
		$status = '0';
		$data = array(
			'judul' 		=> $judul,

			'no_surat' 	=> $no_surat,
			'tujuan'    	=> $tujuan,
			'asal'		=> $asal,
			'sifat'			=> $sifat,
			'tanggal'			=> $tanggal,
			'perihal'		=> $perihal,
			'isi'	=> nl2br($isi),
			'status'			=> $status
		);
		$this->Transaksi_surat_model->update_data_surat('surat',$data,['id_surat'=>$id_surat]);
		$this->session->set_flashdata('sukses', 'Surat Masuk Berhasil Di Edit !');
		if($keluar != null){
			redirect('transaksi_surat/surat_masuk_eksternal','refresh');
		}else{
			redirect('transaksi_surat/surat_masuk_eksternal','refresh');
		}
		
	}
	/*sampe sini*/
	public function aksi_register_surat(){
		$id_surat   = $this->input->post('id_surat'); 
		$dari   = $this->input->post('dari');
		$index_disposisi = $this->input->post('index_disposisi');
		$isi_ringkas  = $this->input->post('isi_ringkas');
		$pengolah  = $this->input->post('pengolah');
		$tgl_diteruskan  = $this->input->post('tgl_diteruskan');
		$catatan  = $this->input->post('catatan');

		if (!empty($_FILES['lampiran']['name'])){
			$lampiran = $this->upload_lampiran();
		} else {
			$lampiran = '';
		}

		$data = array(
			'id_surat' 		=> $id_surat,

			'index_disposisi' 	=> $index_disposisi,
			'isi_ringkas'		=> nl2br($isi_ringkas),
			'pengolah'			=> $pengolah,
			'tgl_diteruskan'			=> $tgl_diteruskan,
			'catatan'		=> $catatan,
			'lampiran'	=> $lampiran
		);
		$this->Transaksi_surat_model->insert_data_surat('register',$data);
		$where = array('id_surat' => $id_surat );
		$data2 = array(
			'status' => '1'
		);
		$this->Transaksi_surat_model->update_data_surat('surat',$data2, $where);
		$this->session->set_flashdata('sukses', 'Surat Berhasil diregister dan diforward ke Direktur !');
		redirect('transaksi_surat','refresh');
	}

	public function aksi_register_surat_eks(){
		$id_surat   = $this->input->post('id_surat'); 
		$dari   = $this->input->post('dari');
		$index_disposisi = $this->input->post('index_disposisi');
		$isi_ringkas  = $this->input->post('isi_ringkas');
		$pengolah  = $this->input->post('pengolah');
		$tgl_diteruskan  = $this->input->post('tgl_diteruskan');
		$catatan  = $this->input->post('catatan');

		if (!empty($_FILES['lampiran']['name'])){
			$lampiran = $this->upload_lampiran();
		} else {
			$lampiran = '';
		}

		$data = array(
			'id_surat' 		=> $id_surat,

			'index_disposisi' 	=> $index_disposisi,
			'isi_ringkas'		=> nl2br($isi_ringkas),
			'pengolah'			=> $pengolah,
			'tgl_diteruskan'			=> $tgl_diteruskan,
			'catatan'		=> $catatan,
			'lampiran'	=> $lampiran
		);
		$this->Transaksi_surat_model->insert_data_surat('register',$data);
		$where = array('id_surat' => $id_surat );
		$data2 = array(
			'status' => '1'
		);
		$this->Transaksi_surat_model->update_data_surat('surat',$data2, $where);
		$this->session->set_flashdata('sukses', 'Surat Berhasil diregister dan diforward ke Direktur !');
		redirect('transaksi_surat/surat_masuk_eksternal','refresh');
	}

	private function upload_lampiran(){
		$config['upload_path'] = './assets/upload/lampiran/';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
		$config['max_size']  = '10048';
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('lampiran')){
			return $this->upload->data('file_name');
		} else {
			echo $this->upload->display_errors();
		}
	}

	public function verifikasi_disposisi($id_surat){
		$where = array('id_surat' => $id_surat );
		$data = array(
			'status' => '3'
		);
		$this->Transaksi_surat_model->update_data_surat('surat',$data, $where);
		$this->session->set_flashdata('sukses', 'Surat Berhasil diverifikasi dan diteruskan !');
		redirect('transaksi_surat','refresh');
	}

	public function konfirmasi_selesai($id_surat){
		$where = array('id_surat' => $id_surat );
		$data = array(
			'status' => '4'
		);
		$this->Transaksi_surat_model->update_data_surat('surat',$data, $where);
		$this->session->set_flashdata('sukses', 'Surat Berhasil diselesaikan !');
		redirect('transaksi_surat','refresh');
	}

	public function kembalikan_surat($id_surat){
		$data['id_surat'] =$id_surat;
		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/surat_masuk/v_komen_surat', $data);
		$this->load->view('template/footer');
		
	}

	public function aksi_kembalikan_surat(){
		$id_surat = $this->input->post('id_surat');
		$komentar = $this->input->post('komentar');
		$where = array('id_surat' => $id_surat);
		$data = array(
			'komentar' => $komentar,
			'status' => '5'
		);
		$this->Transaksi_surat_model->update_data_surat('surat',$data, $where);
		$this->session->set_flashdata('sukses', 'Surat Berhasil diselesaikan !');
		redirect('transaksi_surat','refresh');
	}

	public function verifikasi_disposisi_eks($id_surat){
		$where = array('id_surat' => $id_surat );
		$data = array(
			'status' => '3'
		);
		$this->Transaksi_surat_model->update_data_surat('surat',$data, $where);
		$this->session->set_flashdata('sukses', 'Surat Berhasil diverifikasi dan diteruskan !');
		redirect('transaksi_surat/surat_masuk_eksternal','refresh');
	}

	public function aksi_tambah_surat_masuk(){
		$id_user      = $this->input->post('id_user');

		$no_agenda    = $this->input->post('no_agenda');
		$asal_surat   = $this->input->post('asal_surat');
		$no_surat     = $this->input->post('no_surat');
		$isi		  = $this->input->post('isi');
		$kode		  = $this->input->post('kode');
		$indeks		  = $this->input->post('indeks');
		$tgl_surat	  = $this->input->post('tgl_surat');
		$tgl_diterima = $this->input->post('tgl_diterima');
		$keterangan   = $this->input->post('keterangan');

		$config['upload_path'] = './assets/upload/surat_masuk/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size']  = '2048';
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file')){
			$file = ($this->upload->data('file_name'));
			$data = array(
				'id_user' 		=> $id_user,

				'no_agenda' 	=> $no_agenda,
				'asal_surat'	=> $asal_surat,
				'no_surat'		=> $no_surat,
				'isi'			=> $isi,
				'kode'			=> $kode,
				'indeks'		=> $indeks,
				'tgl_surat'		=> $tgl_surat,
				'tgl_diterima'	=> date("Y-m-d"),
				'keterangan'	=> $keterangan,
				'file'			=> $file
			);
			$this->Transaksi_surat_model->insert_data_surat('surat_masuk',$data);
			$this->session->set_flashdata('sukses', 'Surat Masuk Berhasil Di Tambahkan !');
			redirect('transaksi_surat','refresh');
		} else {
			echo $this->upload->display_errors();
		}
	}

	public function aksi_edit_surat_masuk(){
		$id_surat 	  = $this->input->post('id_surat');

		$id_user 	  = $this->input->post('id_user');
		$no_agenda    = $this->input->post('no_agenda');
		$asal_surat   = $this->input->post('asal_surat');
		$no_surat     = $this->input->post('no_surat');
		$isi 		  = $this->input->post('isi');
		$kode		  = $this->input->post('kode');
		$indeks 	  = $this->input->post('indeks');
		$tgl_surat    = $this->input->post('tgl_surat');
		$tgl_diterima = $this->input->post('tgl_diterima');
		$keterangan   = $this->input->post('keterangan');

		$config['upload_path'] = './assets/upload/surat_masuk/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size']  = '2048';
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file')){
			$file = ($this->upload->data('file_name'));
			$id_surat = array('id_surat' => $id_surat );
			$data = array(
				'id_user' 		=> $id_user,
				'no_agenda' 	=> $no_agenda,
				'asal_surat'	=> $asal_surat,
				'no_surat'		=> $no_surat,
				'isi'			=> $isi,
				'kode'			=> $kode,
				'indeks'		=> $indeks,
				'tgl_surat'		=> $tgl_surat,
				'tgl_diterima'	=> date("Y-m-d"),
				'keterangan'	=> $keterangan,
				'file'			=> $file
			);
			$this->Transaksi_surat_model->update_data_surat('surat_masuk',$data,$id_surat);
			$this->session->set_flashdata('sukses', 'Surat Masuk Berhasil Di Edit !');
			redirect('transaksi_surat','refresh');
		} else {
			echo $this->upload->display_errors();
		}
	}

	public function hapus_surat_masuk(){
		$id_surat['id_surat'] = $this->uri->segment(3);
		$this->Transaksi_surat_model->delete_data_surat('surat_masuk',$id_surat);
		$this->session->set_flashdata('sukses', 'Surat Berhasil Di Hapus !');
		redirect('Transaksi_surat','refresh');
	}

	public function cek_surat_disposisi($id_surat,$id_disposisi){
		$where = $id_disposisi;
		$data['disposisi'] = $this->Transaksi_surat_model->get_data_disposisi_by_id($where,'surat')->row();
		$data['instruksi'] = $this->Disposisi_model->get_data_instruksi_by_id($id_disposisi)->result();
		$pch_tgl_surat = explode('-', date('d-F-Y', strtotime($data['disposisi']->tanggal)));
		$pch_tgl_selesai = explode('-', date('d-F-Y', strtotime($data['disposisi']->tgl_penyelesaian)));
		$pch_tgl_kembali = explode('-', date('d-F-Y', strtotime($data['disposisi']->tgl_kembali)));
		$bulan_surat = $this->bulan_indo($pch_tgl_surat[1]);
		$bulan_selesai = $this->bulan_indo($pch_tgl_selesai[1]);
		$bulan_kembali = $this->bulan_indo($pch_tgl_kembali[1]);
		$data['tanggal_surat'] = $pch_tgl_surat[0].' '.$bulan_surat.' '.$pch_tgl_surat[2];
		$data['tanggal_selesai'] = $pch_tgl_selesai[0].' '.$bulan_selesai.' '.$pch_tgl_selesai[2];
		$data['tanggal_kembali'] = $pch_tgl_kembali[0].' '.$bulan_kembali.' '.$pch_tgl_kembali[2];
		$data['user'] = $this->db->get_where('user', ['id_user' => $data['disposisi']->asal ])->row();
		$this->load->view('halaman/surat_masuk/v_cetak_disposisi', $data);
	}



	/* 
	===================[CRUD Surat Keluar]===================
	*/
	public function surat_keluar(){
		$data['surat_keluar'] = $this->Transaksi_surat_model->get_data_surat_keluar('surat')->result();

		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/surat_keluar/v_surat_keluar', $data);
		$this->load->view('template/footer');
	}

	public function surat_keluar_eksternal(){
		$data['surat_keluar'] = $this->Transaksi_surat_model->get_data_surat_keluar_eksternal('surat')->result();

		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/surat_keluar/v_surat_keluar_eks', $data);
		$this->load->view('template/footer');
	}

	public function tambah_surat_keluar(){
		$id_user = $this->session->userdata('id_user');
		$jabatan = $this->session->userdata('jabatan');
		$data['user'] = $this->user_model->edit_data_user($this->session->userdata('id_user'),'user')->row();
		$data['instalasi'] = $this->db->get_where('instalasi', ['id_jabatan' => $data['user']->id_jabatan])->row();
		$data['jabatan']= $this->jabatan_model->get_data('jabatan')->result();
		$pch_tgl =explode('-', date('d-F-Y'));
		$data['bulan'] = $this->bulan_romawi($pch_tgl[1]);
      	$data['tahun'] = $pch_tgl[2];
      	$get_idsurat = $this->db->query("SELECT max(id_surat) as id_surat from surat group by asal having asal='$jabatan'")->row();
      	if(empty($get_idsurat)){
      		$data['no_surat'] = '001';
      	}else{
      		$get_surat = $this->db->query("SELECT * from surat where id_surat='$get_idsurat->id_surat'")->row();
			$no = explode('/', $get_surat->no_surat);
			$no1 =  $no[0] + 1;
			if ($no1 < 10 ){
				$data['no_surat'] = '00'.$no1;
			} elseif($no1 > 9){
				$data['no_surat'] = '0'.$no1;
			} elseif($no1 > 99){
				$data['no_surat'] = $no1;
			}
      	}

      	
		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/surat_keluar/v_tambah_surat_keluar', $data);
		$this->load->view('template/footer');
	}

	public function tambah_surat_keluar_eks($asal=''){
		$id_user = $this->session->userdata('id_user');
		$jabatan = $this->session->userdata('jabatan');
		$data['user'] = $this->user_model->edit_data_user($this->session->userdata('id_user'),'user')->row();
		$data['instalasi'] = $this->db->get_where('instalasi', ['id_jabatan' => $data['user']->id_jabatan])->row();
		$data['jabatan']= $this->jabatan_model->get_data('jabatan')->result();
		$pch_tgl =explode('-', date('d-F-Y'));
		$data['bulan'] = $this->bulan_romawi($pch_tgl[1]);
      	$data['tahun'] = $pch_tgl[2];
      	$data['tujuan'] = urldecode($asal);
      	$get_idsurat = $this->db->query("SELECT max(id_surat) as id_surat from surat group by asal having asal='$jabatan'")->row();
      	if(empty($get_idsurat)){
      		$data['no_surat'] = '001';
      	}else{
      		$get_surat = $this->db->query("SELECT * from surat where id_surat='$get_idsurat->id_surat'")->row();
			$no = explode('/', $get_surat->no_surat);
			$no1 =  $no[0] + 1;
			if ($no1 < 10 ){
				$data['no_surat'] = '00'.$no1;
			} elseif($no1 > 9){
				$data['no_surat'] = '0'.$no1;
			} elseif($no1 > 99){
				$data['no_surat'] = $no1;
			}
      	}
      	
		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/surat_keluar/v_tambah_surat_keluar_eks', $data);
		$this->load->view('template/footer');
	}

	public function aksi_tambah_surat_keluar(){
		$judul   = $this->input->post('judul'); 

		$no_surat  = $this->input->post('no_surat');
		$tujuan     = $this->input->post('tujuan');
		$asal   = $this->input->post('asal');
		$jenis   = $this->input->post('jenis');
		$sifat        = $this->input->post('sifat');
		$tanggal       = $this->input->post('tanggal');
		$perihal  = $this->input->post('perihal');
		$isi  = $this->input->post('isi');
		$status = '0';

		if (!empty($_FILES['lampiran']['name'])){
			$lampiran = $this->upload_lampiran();
		} else {
			$lampiran = '';
		}

		$data = array(
			'judul' 		=> $judul,

			'no_surat' 	=> $no_surat,
			'tujuan'    	=> $tujuan,
			'asal'		=> $asal,
			'jenis_surat'		=> $jenis,
			'sifat'			=> $sifat,
			'tanggal'			=> $tanggal,
			'perihal'		=> $perihal,
			'isi'	=> nl2br($isi),
			'lampiran' => $lampiran,
			'status'			=> $status
		);
		$this->Transaksi_surat_model->insert_data_surat('surat',$data);
		$this->session->set_flashdata('sukses', 'Surat Keluar Berhasil Di Tambahkan !');
		redirect('transaksi_surat/surat_keluar','refresh');
	}

	public function aksi_tambah_surat_keluar_eks($masuk = null){
		$judul   = $this->input->post('judul'); 

		$no_surat  = $this->input->post('no_surat');
		$tujuan     = $this->input->post('tujuan');
		$asal   = $this->input->post('asal');
		$jenis   = $this->input->post('jenis');
		$sifat        = $this->input->post('sifat');
		$tanggal       = $this->input->post('tanggal');
		$perihal  = $this->input->post('perihal');
		$isi  = $this->input->post('isi');
		$status = '0';

		if (!empty($_FILES['lampiran']['name'])){
			$lampiran = $this->upload_lampiran();
		} else {
			$lampiran = '';
		}

		$data = array(
			'judul' 		=> $judul,

			'no_surat' 	=> $no_surat,
			'tujuan'    	=> $tujuan,
			'asal'		=> $asal,
			'jenis_surat'		=> $jenis,
			'sifat'			=> $sifat,
			'tanggal'			=> $tanggal,
			'perihal'		=> $perihal,
			'isi'	=> nl2br($isi),
			'lampiran' => $lampiran,
			'status'			=> $status
		);
		$this->Transaksi_surat_model->insert_data_surat('surat',$data);
		$this->session->set_flashdata('sukses', 'Surat Keluar Berhasil Di Tambahkan !');
		if($masuk != null){
			redirect('transaksi_surat/surat_masuk_eksternal','refresh');
		}else{
			redirect('transaksi_surat/surat_keluar_eksternal','refresh');
		}
		
	}

	public function edit_surat_keluar($id_surat){
		$id_surat = $id_surat;
		$data['surat_keluar'] = $this->Transaksi_surat_model->get_data_surat_by_id($id_surat,'surat')->row();
		$data['instalasi'] = $this->db->get_where('instalasi', ['id_jabatan' => $data['surat_keluar']->id_jabatan])->row();
		$data['jabatan']= $this->jabatan_model->get_data('jabatan')->result();
		$pch_tgl =explode('-', date('d-F-Y'));
		$data['bulan'] = $this->bulan_romawi($pch_tgl[1]);
      	$data['tahun'] = $pch_tgl[2];

		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/surat_keluar/v_edit_surat_keluar', $data);
		$this->load->view('template/footer');
	}

	public function edit_surat_keluar_eks($id_surat){
		$id_surat = $id_surat;
		$data['surat_keluar'] = $this->Transaksi_surat_model->get_data_surat_eks_by_id($id_surat,'surat')->row();
		$data['jabatan']= $this->jabatan_model->get_data('jabatan')->result();
		$pch_tgl =explode('-', date('d-F-Y'));
		$data['bulan'] = $this->bulan_romawi($pch_tgl[1]);
      	$data['tahun'] = $pch_tgl[2];

		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/surat_keluar/v_edit_surat_keluar_eks', $data);
		$this->load->view('template/footer');
	}

	public function aksi_edit_surat_keluar($keluar = null){
		$id_surat   = $this->input->post('id_surat'); 
		$judul   = $this->input->post('judul');
		$no_surat  = $this->input->post('no_surat');
		$tujuan     = $this->input->post('tujuan');
		$asal   = $this->input->post('asal');
		$sifat        = $this->input->post('sifat');
		$tanggal       = $this->input->post('tanggal');
		$perihal  = $this->input->post('perihal');
		$lampiran_lama  = $this->input->post('lampiran_lama');
		$isi  = $this->input->post('isi');
		$status = '0';

		if (!empty($_FILES['lampiran']['name'])){
			$lampiran = $this->upload_lampiran();
		} else {
			$lampiran = $lampiran_lama;
		}
		$data = array(
			'judul' 		=> $judul,

			'no_surat' 	=> $no_surat,
			'tujuan'    	=> $tujuan,
			'asal'		=> $asal,
			'sifat'			=> $sifat,
			'tanggal'			=> $tanggal,
			'perihal'		=> $perihal,
			'isi'	=> nl2br($isi),
			'lampiran' => $lampiran,
			'status'			=> $status
		);
		$this->Transaksi_surat_model->update_data_surat('surat',$data,['id_surat'=>$id_surat]);
		$this->session->set_flashdata('sukses', 'Surat Keluar Berhasil Di Tambahkan !');
		if($keluar != null){
			redirect('transaksi_surat/surat_keluar','refresh');
		}else{
			redirect('transaksi_surat/surat_keluar','refresh');
		}
		
	}

	public function hapus_surat_keluar(){
		$id_surat['id_surat'] = $this->uri->segment(3);
		$this->Transaksi_surat_model->delete_data_surat('surat',$id_surat);
		$this->session->set_flashdata('sukses', 'Surat Berhasil Di Hapus');
		redirect('transaksi_surat/surat_keluar','refresh');
	}

	public function cek_surat_keluar($id_surat){
		$where = $id_surat;
		$data['surat_keluar'] = $this->Transaksi_surat_model->get_data_surat_by_id($where,'surat')->row();
		$pch_tgl = explode('-', date('d-F-Y', strtotime($data['surat_keluar']->tanggal)));
		$bulan = $this->bulan_indo($pch_tgl[1]);
		$data['tanggal'] = $pch_tgl[0].' '.$bulan.' '.$pch_tgl[2];
		$data['user'] = $this->db->get_where('user', ['jabatan' => $data['surat_keluar']->asal ])->row();
		$this->load->view('halaman/surat_keluar/v_cek_surat_keluar', $data);
	}

	public function cek_surat_keluar_eks($id_surat){
		$where = $id_surat;
		$data['surat_keluar'] = $this->db->get_where('surat',['id_surat' => $where])->row();
		$pch_tgl = explode('-', date('d-F-Y', strtotime($data['surat_keluar']->tanggal)));
		$bulan = $this->bulan_indo($pch_tgl[1]);
		$data['tanggal'] = $pch_tgl[0].' '.$bulan.' '.$pch_tgl[2];
		$data['user'] = $this->db->get_where('user', ['jabatan' => $data['surat_keluar']->asal ])->row();
		$this->load->view('halaman/surat_keluar/v_cek_surat_keluar_eks', $data);
	}

	public function cek_kartu_register($id_surat){
		$where = $id_surat;
		$data['surat_keluar'] = $this->Transaksi_surat_model->get_data_surat_register_by_id($where,'surat')->row();
		$pch_tgl = explode('-', date('d-F-Y', strtotime($data['surat_keluar']->tanggal)));
		$bulan = $this->bulan_indo($pch_tgl[1]);
		$pch_tgl1 = explode('-', date('d-F-Y', strtotime($data['surat_keluar']->tgl_diteruskan)));
		$bulan1 = $this->bulan_indo($pch_tgl1[1]);
		$data['tanggal'] = $pch_tgl[0].' '.$bulan.' '.$pch_tgl[2];
		$data['tgl_diteruskan'] = $pch_tgl1[0].' '.$bulan1.' '.$pch_tgl1[2];
		$data['user'] = $this->db->get_where('user', ['jabatan' => $data['surat_keluar']->asal ])->row();
		$data['pengolah'] = $this->db->get_where('user', ['id_user' => $data['surat_keluar']->pengolah ])->row();
		$this->load->view('halaman/surat_keluar/v_cek_kartu_register', $data);
	}

	/* 
	===================[Galeri Surat Masuk]===================
	*/
	public function surat_eksternal(){
		if($this->session->userdata('level') == 'Bagian Umum'){
			$data['surat_eksternal'] = $this->db->get('surat_eksternal')->result();

			$this->load->view('template/header');
			$this->load->view('template/nav');
			$this->load->view('halaman/surat_eksternal/v_surat_eksternal', $data);
			$this->load->view('template/footer');
		}elseif ($this->session->userdata('level') == 'Instalasi'){
			$id_user = $this->session->userdata('id_user'); 
			$data['surat_keluar'] = $this->Transaksi_surat_model->get_surat_by_instalasi('surat')->result();
			if(empty($data['surat_keluar'])){
				$data['surat_keluar'] = $this->Transaksi_surat_model->get_surat_by_instruksi('surat')->result();
			} else {
				$data['surat_keluar'] = $this->Transaksi_surat_model->get_surat_by_instalasi('surat')->result();
			}
			$this->load->view('template/header');
			$this->load->view('template/nav');
			$this->load->view('halaman/surat_masuk/v_surat_masuk', $data);
			$this->load->view('template/footer');
		}
		
	}

	function download_lampiran($nama_file)
    {
        force_download('assets/upload/lampiran/'.$nama_file , NULL);
    }

	private function bulan_romawi($bulan)
	{
	    $bulan=$bulan;
	    switch ($bulan) {
	      case 'January':
	        $bulan= "I";
	        break;
	      case 'February':
	        $bulan= "II";
	        break;
	      case 'March':
	        $bulan= "III";
	        break;
	      case 'April':
	        $bulan= "IV";
	        break;
	      case 'May':
	        $bulan= "V";
	        break;
	      case 'June':
	        $bulan= "VI";
	        break;
	      case 'July':
	        $bulan= "VII";
	        break;
	      case 'August':
	        $bulan= "VIII";
	        break;
	      case 'September':
	        $bulan= "IX";
	        break;
	      case 'October':
	        $bulan= "X";
	        break;
	      case 'November':
	        $bulan= "XI";
	        break;
	      case 'December':
	        $bulan= "XII";
	        break;
	      default:
	        $bulan= "Isi variabel tidak di temukan";
	        break;
	    }
	    return $bulan;
	}

	private function bulan_indo($bulan)
	{
	    $bulan=$bulan;
	    switch ($bulan) {
	      case 'January':
	        $bulan= "Januari";
	        break;
	      case 'February':
	        $bulan= "Februari";
	        break;
	      case 'March':
	        $bulan= "Maret";
	        break;
	      case 'April':
	        $bulan= "April";
	        break;
	      case 'May':
	        $bulan= "Mei";
	        break;
	      case 'June':
	        $bulan= "Juni";
	        break;
	      case 'July':
	        $bulan= "Juli";
	        break;
	      case 'August':
	        $bulan= "Agustus";
	        break;
	      case 'September':
	        $bulan= "September";
	        break;
	      case 'October':
	        $bulan= "Oktober";
	        break;
	      case 'November':
	        $bulan= "November";
	        break;
	      case 'December':
	        $bulan= "Desember";
	        break;
	      default:
	        $bulan= "Isi variabel tidak di temukan";
	        break;
	    }
	    return $bulan;
	}	

}

/* End of file Transaksi_surat.php */
/* Location: ./application/controllers/Transaksi_surat.php */