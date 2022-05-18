<!-- Main Content -->
<div class="main-content">
  <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('sukses'); ?>">
  <?php if ($this->session->flashdata('sukses')): ?>
  <?php endif; ?>
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-desktop fa-sm"></i> Dashboard</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="hero bg-primary text-white">
            <div class="hero-inner">
              <?php if($this->session->userdata('level') == "Instalasi"):?>
                <h5><?php echo strtoupper("Selamat datang ".$this->session->userdata('nama')); ?></h5>
                <p class="lead"><?php echo strtoupper("Anda Login Sebagai : ".$user->jabatan); ?></p>
              <?php else:?>
                <h5><?php echo strtoupper("Selamat datang ".$this->session->userdata('nama')); ?></h5>
                <p class="lead"><?php echo strtoupper("Anda Login Sebagai : ".$this->session->userdata('level')); ?></p>
              <?php endif;?>
              
            </div>
          </div>
        </div>

        <?php if($this->session->userdata('level') == "Direktur"):?>
        <div class="col-lg-6">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="far fa-envelope-open"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header text-center">
                <h4 class="text-dark">Jumlah Surat yang belum di Disposisi</h4>
              </div>
              <div class="card-body text-center">
                <?php echo $jml_pesan_disposisi=$this->db->query("SELECT * from surat where status='1'")->num_rows(); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-bookmark"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header text-center">
                <h4 class="text-dark">Jumlah Disposisi Surat</h4>
              </div>
              <div class="card-body text-center">
                <?php echo $this->db->get('disposisi_surat')->num_rows(); ?>
              </div>
            </div>
          </div>
        </div>

        <?php elseif($this->session->userdata('level') == "Bagian Umum"):?>
        <div class="col-lg-3">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i style="color: white;"  class="fa fa-plus"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header text-center">
                <h4 class="text-dark">Menunggu Verifikasi Bagian Umum</h4>
              </div>
              <div class="card-body text-center">
                <?php echo $get_jml_pesan=$this->db->query("SELECT * from surat where status='0' and jenis_surat='Internal'")->num_rows(); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i style="color: white;" class="fa fa-forward"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header text-center">
                <h4 class="text-dark">Menunggu diteruskan Bagian Umum</h4>
              </div>
              <div class="card-body text-center">
                <?php echo $this->db->query("SELECT * from surat where status='2' and jenis_surat='Internal'")->num_rows(); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-envelope-open"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header text-center">
                <h4 class="text-dark">Menunggu Konfirmasi oleh Instalasi</h4>
              </div>
              <div class="card-body text-center">
                <?php echo $this->db->query("SELECT * from surat where status='3' and jenis_surat='Internal'")->num_rows(); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-bookmark"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header text-center">
                <h4 class="text-dark">Jumlah Surat dikembalikan</h4>
              </div>
              <div class="card-body text-center">
                <?php echo $this->db->query("SELECT * from surat where status='5' and jenis_surat='Internal'")->num_rows(); ?>
              </div>
            </div>
          </div>
        </div>
        <?php else:
          $id_user = $this->session->userdata('id_user'); 
          $id_jabatan = $this->session->userdata('id_jabatan'); 
          $jabatan = $this->session->userdata('jabatan');
          $get_jml_pesan=$this->db->query("SELECT * from surat where status='0' and jenis_surat='Internal' and asal='$jabatan'")->num_rows(); 
          $jml_konfir=$this->db->query("SELECT * from surat join disposisi_surat join instruksi on surat.id_surat=disposisi_surat.id_surat and disposisi_surat.id_disposisi=instruksi.id_disposisi and instruksi.terusan='$id_jabatan' and surat.status='3' and surat.jenis_surat='Internal'")->num_rows();
        ?>
        <div class="col-lg-3">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i style="color: white;"  class="fa fa-plus"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header text-center">
                <h4 class="text-dark">Menunggu Verifikasi Bagian Umum</h4>
              </div>
              <div class="card-body text-center">
                <?php echo $get_jml_pesan; ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i style="color: white;" class="fa fa-forward"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header text-center">
                <h4 class="text-dark">Menunggu diteruskan Bagian Umum</h4>
              </div>
              <div class="card-body text-center">
                <?php echo $this->db->query("SELECT * from surat where status='2' and jenis_surat='Internal' and asal='$jabatan'")->num_rows(); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-envelope-open"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header text-center">
                <h4 class="text-dark">Menunggu Konfirmasi oleh Instalasi</h4>
              </div>
              <div class="card-body text-center">
                <?php echo $jml_konfir; ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-bookmark"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header text-center">
                <h4 class="text-dark">Jumlah Surat dikembalikan</h4>
              </div>
              <div class="card-body text-center">
                <?php echo $this->db->query("SELECT * from surat where status='5' and jenis_surat='Internal' and asal='$jabatan'")->num_rows(); ?>
              </div>
            </div>
          </div>
        </div>
        <?php endif;?>
      </div>
    </div>
  </section>
</div>
<!-- Main Content -->