<?php 
  $id_user = $this->session->userdata('id_user'); 
  $id_jabatan = $this->session->userdata('id_jabatan'); 
  $jabatan = $this->session->userdata('jabatan'); 
  $jml_kembali=$this->db->query("SELECT * from surat where status='5' and jenis_surat='Internal' and asal='$jabatan'")->num_rows();
  $get_jml_pesan=$this->db->query("SELECT * from surat where status='0' and jenis_surat='Internal'")->num_rows();
  $jml_verifikasi_disposisi=$this->db->query("SELECT * from surat where status='2' and jenis_surat='Internal'")->num_rows();
  $get_jml_pesan_eks=$this->db->query("SELECT * from surat where status='0' and jenis_surat='Eksternal'")->num_rows();
  $jml_verifikasi_disposisi_eks=$this->db->query("SELECT * from surat where status='2' and jenis_surat='Eksternal'")->num_rows();
  $jml_pesan_disposisi=$this->db->query("SELECT * from surat where status='1'")->num_rows();
  
  
  $jml_disposisi=$this->db->query("SELECT * from surat join disposisi_surat join instruksi on surat.id_surat=disposisi_surat.id_surat and disposisi_surat.id_disposisi=instruksi.id_disposisi and instruksi.terusan='$id_jabatan' and surat.status='3' and surat.jenis_surat='Internal'")->num_rows();
  $jml_disposisi_eks=$this->db->query("SELECT * from surat join disposisi_surat join instruksi on surat.id_surat=disposisi_surat.id_surat and disposisi_surat.id_disposisi=instruksi.id_disposisi and instruksi.terusan='$id_jabatan' and surat.status='3' and surat.jenis_surat='Eksternal'")->num_rows();

  if ($this->session->userdata('level') == 'Bagian Umum') {
?>
<nav class="navbar navbar-secondary navbar-expand-lg">
  <div class="container">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="<?php echo site_url('dashboard') ?>" class="nav-link"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      </li>
      <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>Master Data</span></a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a href="<?php echo site_url('user') ?>" class="nav-link">Data User</a></li>
          <li class="nav-item"><a href="<?php echo site_url('jabatan') ?>" class="nav-link">Data Jabatan</a></li>
          <li class="nav-item"><a href="<?php echo site_url('instalasi') ?>" class="nav-link">Data Instalasi</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-retweet"></i><span>Transaksi Surat Internal</span></a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a href="<?php echo site_url('transaksi_surat') ?>" class="nav-link"><span>Surat Masuk 
            <span style="background-color: #ffc107;padding: 3px;border-radius: 40px; color: white;"><?php echo $get_jml_pesan ?></span> 
            <span style="background-color: #6777ef;padding: 3px;border-radius: 40px; color: white;"><?php echo $jml_verifikasi_disposisi ?></span>
          </span></a></li>
          <li class="nav-item"><a href="<?php echo site_url('transaksi_surat/surat_keluar') ?>" class="nav-link">Surat Keluar</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-retweet"></i><span>Transaksi Surat Eksternal</span></a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a href="<?php echo site_url('transaksi_surat/surat_masuk_eksternal') ?>" class="nav-link"><span>Surat Masuk 
            <span style="background-color: #ffc107;padding: 3px;border-radius: 40px; color: white;"><?php echo $get_jml_pesan_eks ?></span> 
            <span style="background-color: #6777ef;padding: 3px;border-radius: 40px; color: white;"><?php echo $jml_verifikasi_disposisi_eks ?></span>
          </span></a></li>
          <li class="nav-item"><a href="<?php echo site_url('transaksi_surat/surat_keluar_eksternal') ?>" class="nav-link">Surat Keluar</a></li>
        </ul>
      <!-- </li>
      <li class="nav-item">
        <a href="<?php echo site_url('disposisi') ?>" class="nav-link"><i class="fas fa-file"></i><span>Disposisi Surat</span></a>
      </li> -->
    </ul>
  </div>
</nav>
<?php }elseif ($this->session->userdata('level') == 'Instalasi'){ ?>
<nav class="navbar navbar-secondary navbar-expand-lg">
  <div class="container">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="<?php echo site_url('dashboard') ?>" class="nav-link"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      </li>
      <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-retweet"></i><span>Transaksi Surat Internal</span></a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a href="<?php echo site_url('transaksi_surat') ?>" class="nav-link">Surat Masuk <span style="background-color: #6777ef;padding: 3px;border-radius: 40px; color: white;"><?php echo $jml_disposisi ?></span></a></li>
          <li class="nav-item"><a href="<?php echo site_url('transaksi_surat/surat_keluar') ?>" class="nav-link">Surat Keluar <span style="background-color: red;padding: 3px;border-radius: 40px; color: white;"><?php echo $jml_kembali ?></span></a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-retweet"></i><span>Transaksi Surat Eksternal</span></a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a href="<?php echo site_url('transaksi_surat/surat_masuk_eksternal') ?>" class="nav-link">Surat Masuk <span style="background-color: #ffc107;padding: 3px;border-radius: 40px; color: white;"><?php echo $jml_disposisi_eks ?></span></a></li>
          <li class="nav-item"><a href="<?php echo site_url('transaksi_surat/surat_keluar_eksternal') ?>" class="nav-link">Surat Keluar</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
<?php }else{ ?>
<nav class="navbar navbar-secondary navbar-expand-lg">
  <div class="container">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="<?php echo site_url('dashboard') ?>" class="nav-link"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a href="<?php echo site_url('disposisi') ?>" class="nav-link"><i class="fas fa-file"></i><span>Disposisi Surat <span style="background-color: #3abaf4;padding: 3px;border-radius: 40px; color: white;"><?php echo $jml_pesan_disposisi ?></span></span></a>
      </li>
      <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Laporan</span></a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a href="<?php echo site_url('disposisi/laporan') ?>" class="nav-link"><i class="fas fa-book"></i><span>Laporan Surat Internal</span></a></li>
          <li class="nav-item"><a href="<?php echo site_url('disposisi/laporan_eksternal') ?>" class="nav-link"><i class="fas fa-book"></i><span>Laporan Surat Eksternal (Masuk)</span></a></li>
          <li class="nav-item"><a href="<?php echo site_url('disposisi/laporan_eksternal_keluar') ?>" class="nav-link"><i class="fas fa-book"></i><span>Laporan Surat Eksternal (Keluar)</span></a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
<?php } ?>