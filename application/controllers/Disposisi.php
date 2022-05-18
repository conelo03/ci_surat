<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('status_login') != TRUE){
			$this->session->set_flashdata('notif', 'AKSES GAGAL HARAP LOGIN');
			redirect('');
		};
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('User_model');
		$this->load->model('Disposisi_model');
		$this->load->model('Transaksi_surat_model');
	}

	public function index(){
		$data['surat_keluar'] = $this->Disposisi_model->get_data_disposisi('surat')->result();

		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/disposisi/v_surat_disposisi', $data);
		$this->load->view('template/footer');
	}

	public function kelola_disposisi($id_surat){
		$data['surat_keluar'] = $this->Transaksi_surat_model->get_data_surat_register_by_id($id_surat,'surat')->row();
		$data['disposisi'] = $this->Disposisi_model->get_data_disposisi_by_id($id_surat)->row();
		if(empty($data['disposisi'])){
			$data['id_disposisi'] = "";
			$data['instruksi'] = "";
		}else{
			$data['id_disposisi'] = $data['disposisi']->id_disposisi;
			$data['instruksi'] = $this->Disposisi_model->get_data_instruksi_by_id($data['disposisi']->id_disposisi)->result();
		}
		$data['user'] = $this->User_model->get_data_user('user')->result();
      	$data['no_index'] = $data['surat_keluar']->index_disposisi;
      	$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/disposisi/v_kelola_disposisi', $data);
		$this->load->view('template/footer');
  
		
	}

	public function aksi_tambah_surat_disposisi(){
		$id_surat  	   = $this->input->post('id_surat');
		$index_disposisi  	   = $this->input->post('index_disposisi');
		$tgl_penyelesaian 	   = $this->input->post('tgl_penyelesaian');

		$kembali_kepada   	   = $this->input->post('kembali_kepada');
		$tgl_kembali = $this->input->post('tgl_penyelesaian');

		$data = array(
			'id_surat' 		=> $id_surat,
			'index_disposisi' 		=> $index_disposisi,

			'tgl_penyelesaian' 	=> $tgl_penyelesaian,
			'kembali_kepada'    	=> $kembali_kepada,
			'tgl_kembali'		=> $tgl_kembali
		);
		$this->Disposisi_model->insert_surat_disposisi('disposisi_surat',$data);
		$this->session->set_flashdata('sukses', 'Surat Disposisi Berhasil Di Tambahkan !');
		redirect('disposisi/kelola_disposisi/'.$id_surat);
	}

	public function aksi_edit_surat_disposisi(){

		$id_disposisi  = $this->input->post('id_disposisi');
		$id_surat  	   = $this->input->post('id_surat');
		$index_disposisi  	   = $this->input->post('index_disposisi');
		$tgl_penyelesaian 	   = $this->input->post('tgl_penyelesaian');

		$kembali_kepada   	   = $this->input->post('kembali_kepada');
		$tgl_kembali = $this->input->post('tgl_penyelesaian');

		$data = array(
			'id_surat' 		=> $id_surat,
			'index_disposisi' 		=> $index_disposisi,

			'tgl_penyelesaian' 	=> $tgl_penyelesaian,
			'kembali_kepada'    	=> $kembali_kepada,
			'tgl_kembali'		=> $tgl_kembali
		);
		
		$id_disposisi = array('id_disposisi' => $id_disposisi );
		
		$this->Disposisi_model->update_surat_disposisi('disposisi_surat',$data,$id_disposisi);
		$this->session->set_flashdata('sukses', 'Surat Disposisi Berhasil Di Edit !');
		redirect('disposisi/kelola_disposisi/'.$id_surat);
		
	}

	public function hapus_surat_disposisi(){
		$id_disposisi['id_disposisi'] = $this->uri->segment(3);
		$this->Disposisi_model->delete_surat_disposisi('disposisi',$id_disposisi);
		$this->session->set_flashdata('sukses', 'Surat Disposisi Berhasil Di Hapus');
		redirect('disposisi','refresh');
	}

	public function tambah_instruksi($id_disposisi, $id_surat){
		$data = array(
			'user'=> $this->User_model->get_data_user('user')->result(),
			'id_disposisi' => $id_disposisi,
			'id_surat' => $id_surat
		);
		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/disposisi/v_tambah_instruksi',$data);
		$this->load->view('template/footer');
	}

	public function edit_instruksi($id_instruksi, $id_surat){
		$data = array(
			'user'=> $this->User_model->get_data_user('user')->result(),
			'instruksi' => $this->Disposisi_model->get_data_instruksi_by_id_instruksi($id_instruksi)->row(),
			'id_surat' => $id_surat
		);
		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/disposisi/v_edit_instruksi',$data);
		$this->load->view('template/footer');
	}

	public function hapus_instruksi($id_instruksi, $id_surat){
		$this->db->where('id_instruksi', $id_instruksi);
		$this->db->delete('instruksi');
		$this->session->set_flashdata('sukses', 'Instruksi Berhasil Di Hapus !');
		redirect('disposisi/kelola_disposisi/'.$id_surat);
	}

	public function aksi_tambah_instruksi(){
		$id_surat  	   = $this->input->post('id_surat');
		$id_disposisi  	   = $this->input->post('id_disposisi');
		$instruksi  	   = $this->input->post('instruksi');
		$terusan 	   = $this->input->post('terusan');

		$data = array(
			'id_disposisi' 		=> $id_disposisi,
			'instruksi' 		=> $instruksi,
			'terusan' 	=> $terusan
		);
		$this->Disposisi_model->insert_surat_disposisi('instruksi',$data);
		$this->session->set_flashdata('sukses', 'Instruksi Berhasil Di Tambahkan !');
		redirect('disposisi/kelola_disposisi/'.$id_surat);
	}

	public function aksi_edit_instruksi(){
		$id_surat  	   = $this->input->post('id_surat');
		$id_instruksi = $this->input->post('id_instruksi');
		$instruksi  	   = $this->input->post('instruksi');
		$terusan 	   = $this->input->post('terusan');

		$data = array(
			'instruksi' 		=> $instruksi,
			'terusan' 	=> $terusan
		);
		$this->db->update('instruksi',$data, ['id_instruksi' => $id_instruksi]);
		$this->session->set_flashdata('sukses', 'Instruksi Berhasil Di Edit !');
		redirect('disposisi/kelola_disposisi/'.$id_surat);
	}

	public function forward_surat($id_surat){
		$where = array('id_surat' => $id_surat );
		$data = array(
			'status' => '2'
		);
		$this->Transaksi_surat_model->update_data_surat('surat',$data, $where);
		$this->session->set_flashdata('sukses', 'Surat Berhasil diforward ke Bagian Umum !');
		redirect('Disposisi','refresh');
	}

	public function laporan(){
		$data['surat_keluar'] = $this->db->select('*')
                                         ->join('disposisi_surat', 'surat.id_surat=disposisi_surat.id_surat')
                                         ->where('jenis_surat', 'Internal')
                                         ->get('surat');

		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/disposisi/v_laporan_surat', $data);
		$this->load->view('template/footer');
	}

	public function laporan_sort(){
		$data['surat_sort'] = "";
		$tanggal_mulai = $this->input->post('tgl_mulai');
		$tanggal_selesai = $this->input->post('tgl_selesai');
		$status = $this->input->post('status');

		if($status == '0'){
			$data['surat_keluar'] = $this->db->select('*')
                                         ->join('disposisi_surat', 'surat.id_surat=disposisi_surat.id_surat','left')
                                         ->where('jenis_surat', 'Internal')
                                         ->where('tanggal' . ' >=', $tanggal_mulai)
            							 ->where('tanggal' . ' <=', $tanggal_selesai)
                                         ->get('surat');
        } elseif ($status == '1'){
        	$data['surat_keluar'] = $this->db->select('*')
                                         ->join('disposisi_surat', 'surat.id_surat=disposisi_surat.id_surat')
                                         ->where('jenis_surat', 'Internal')
                                         ->where('status', '4')
                                         ->where('tanggal' . ' >=', $tanggal_mulai)
            							 ->where('tanggal' . ' <=', $tanggal_selesai)
                                         ->get('surat');
            $data['status'] = 'Selesai';
        } else {
        	$data['surat_keluar'] = $this->db->select('*')
                                         ->join('disposisi_surat', 'surat.id_surat=disposisi_surat.id_surat','left')
                                         ->where('jenis_surat', 'Internal')
                                         ->where_not_in('status', '4')
                                         ->where('tanggal' . ' >=', $tanggal_mulai)
            							 ->where('tanggal' . ' <=', $tanggal_selesai)
                                         ->get('surat');
            $data['status'] = ' Belum Selesai';
        }
		

		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/disposisi/v_laporan_surat', $data);
		$this->load->view('template/footer');
	}

	public function cetak_laporan(){
		$data['surat_sort'] = "";
		$tanggal_mulai = $this->input->post('tgl_mulai');
		$tanggal_selesai = $this->input->post('tgl_selesai');
		$status = $this->input->post('status');

		if($status == '0'){
			$data['surat_keluar'] = $this->db->select('*')
                                         ->join('disposisi_surat', 'surat.id_surat=disposisi_surat.id_surat','left')
                                         ->where('jenis_surat', 'Internal')
                                         ->where('tanggal' . ' >=', $tanggal_mulai)
            							 ->where('tanggal' . ' <=', $tanggal_selesai)
                                         ->get('surat');
        } elseif ($status == '1'){
        	$data['surat_keluar'] = $this->db->select('*')
                                         ->join('disposisi_surat', 'surat.id_surat=disposisi_surat.id_surat')
                                         ->where('jenis_surat', 'Internal')
                                         ->where('status', '4')
                                         ->where('tanggal' . ' >=', $tanggal_mulai)
            							 ->where('tanggal' . ' <=', $tanggal_selesai)
                                         ->get('surat');
            $data['status'] = 'Selesai';
        } else {
        	$data['surat_keluar'] = $this->db->select('*')
                                         ->join('disposisi_surat', 'surat.id_surat=disposisi_surat.id_surat','left')
                                         ->where('jenis_surat', 'Internal')
                                         ->where_not_in('status', '4')
                                         ->where('tanggal' . ' >=', $tanggal_mulai)
            							 ->where('tanggal' . ' <=', $tanggal_selesai)
                                         ->get('surat');
            $data['status'] = ' Belum Selesai';
        }

		$this->load->view('halaman/disposisi/v_cetak_laporan_surat', $data);
	}

	public function laporan_eksternal(){
		$data['surat_keluar'] = $this->db->select('*')
                                         ->join('disposisi_surat', 'surat.id_surat=disposisi_surat.id_surat','left')
                                         ->where('jenis_surat', 'Eksternal')
                                         ->get('surat');
		

		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/disposisi/v_laporan_surat_eks', $data);
		$this->load->view('template/footer');
	}

	public function laporan_eks_sort(){
		$data['surat_sort'] = "";
		$tanggal_mulai = $this->input->post('tgl_mulai');
		$tanggal_selesai = $this->input->post('tgl_selesai');
		$status = $this->input->post('status');

		if($status == '0'){
			$data['surat_keluar'] = $this->db->select('*')
                                         ->join('disposisi_surat', 'surat.id_surat=disposisi_surat.id_surat','left')
                                         ->where('jenis_surat', 'Eksternal')
                                         ->where('tanggal' . ' >=', $tanggal_mulai)
            							 ->where('tanggal' . ' <=', $tanggal_selesai)
                                         ->get('surat');
        } elseif ($status == '1'){
        	$data['surat_keluar'] = $this->db->select('*')
                                         ->join('disposisi_surat', 'surat.id_surat=disposisi_surat.id_surat')
                                         ->where('jenis_surat', 'Eksternal')
                                         ->where('status', '4')
                                         ->where('tanggal' . ' >=', $tanggal_mulai)
            							 ->where('tanggal' . ' <=', $tanggal_selesai)
                                         ->get('surat');
            $data['status'] = 'Selesai';
        } else {
        	$data['surat_keluar'] = $this->db->select('*')
                                         ->join('disposisi_surat', 'surat.id_surat=disposisi_surat.id_surat','left')
                                         ->where('jenis_surat', 'Eksternal')
                                         ->where_not_in('status', '4')
                                         ->where('tanggal' . ' >=', $tanggal_mulai)
            							 ->where('tanggal' . ' <=', $tanggal_selesai)
                                         ->get('surat');
            $data['status'] = ' Belum Selesai';
        }

		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/disposisi/v_laporan_surat_eks', $data);
		$this->load->view('template/footer');
	}

	public function cetak_laporan_eks(){
		$data['surat_sort'] = "";
		$tanggal_mulai = $this->input->post('tgl_mulai');
		$tanggal_selesai = $this->input->post('tgl_selesai');
		$status = $this->input->post('status');

		if($status == '0'){
			$data['surat_keluar'] = $this->db->select('*')
                                         ->join('disposisi_surat', 'surat.id_surat=disposisi_surat.id_surat','left')
                                         ->where('jenis_surat', 'Eksternal')
                                         ->where('tanggal' . ' >=', $tanggal_mulai)
            							 ->where('tanggal' . ' <=', $tanggal_selesai)
                                         ->get('surat');
        } elseif ($status == '1'){
        	$data['surat_keluar'] = $this->db->select('*')
                                         ->join('disposisi_surat', 'surat.id_surat=disposisi_surat.id_surat')
                                         ->where('jenis_surat', 'Eksternal')
                                         ->where('status', '4')
                                         ->where('tanggal' . ' >=', $tanggal_mulai)
            							 ->where('tanggal' . ' <=', $tanggal_selesai)
                                         ->get('surat');
            $data['status'] = 'Selesai';
        } else {
        	$data['surat_keluar'] = $this->db->select('*')
                                         ->join('disposisi_surat', 'surat.id_surat=disposisi_surat.id_surat','left')
                                         ->where('jenis_surat', 'Eksternal')
                                         ->where_not_in('status', '4')
                                         ->where('tanggal' . ' >=', $tanggal_mulai)
            							 ->where('tanggal' . ' <=', $tanggal_selesai)
                                         ->get('surat');
            $data['status'] = ' Belum Selesai';
        }

		$this->load->view('halaman/disposisi/v_cetak_laporan_surat_eks', $data);
	}

	public function laporan_eksternal_keluar(){
		$data['surat_keluar'] = $this->db->select('*')
                                         ->where('jenis_surat', 'Eksternal Keluar')
                                         ->get('surat');
		

		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/disposisi/v_laporan_surat_eks_keluar', $data);
		$this->load->view('template/footer');
	}

	public function laporan_eks_keluar_sort(){
		$data['surat_sort'] = "";
		$tanggal_mulai = $this->input->post('tgl_mulai');
		$tanggal_selesai = $this->input->post('tgl_selesai');
		$data['surat_keluar'] = $this->db->select('*')
                                         ->where('jenis_surat', 'Eksternal Keluar')
                                         ->where('tanggal' . ' >=', $tanggal_mulai)
            							 ->where('tanggal' . ' <=', $tanggal_selesai)
                                         ->get('surat');

		$this->load->view('template/header');
		$this->load->view('template/nav');
		$this->load->view('halaman/disposisi/v_laporan_surat_eks_keluar', $data);
		$this->load->view('template/footer');
	}

	public function cetak_laporan_eks_keluar(){
		$data['surat_sort'] = "";
		$tanggal_mulai = $this->input->post('tgl_mulai');
		$tanggal_selesai = $this->input->post('tgl_selesai');
		$data['surat_keluar'] = $this->db->select('*')
                                         ->where('jenis_surat', 'Eksternal Keluar')
                                         ->where('tanggal' . ' >=', $tanggal_mulai)
            							 ->where('tanggal' . ' <=', $tanggal_selesai)
                                         ->get('surat');

		$this->load->view('halaman/disposisi/v_cetak_laporan_surat_eks_keluar', $data);
	}
}

/* End of file Disposisi.php */
/* Location: ./application/controllers/Disposisi.php */