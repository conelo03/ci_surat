<!-- Main Content -->
<div class="main-content">
  <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('sukses'); ?>">
  <?php if ($this->session->flashdata('sukses')): ?>
  <?php endif; ?>
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-download fa-sm"></i> Backup Database</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Backup Database</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              Lakukan backup database secara berkala untuk membuat cadangan database yang bisa direstore kapan saja ketika dibutuhkan. Silakan klik tombol "Backup" untuk memulai proses backup data. Setelah proses backup selesai, silakan download file backup database tersebut dan simpan di lokasi yang aman.*
              <br><span class="text-danger">* Tidak disarankan menyimpan file backup database dalam my documents / Local Disk C.</span><br>
              <a href="<?php echo site_url('backup/backup') ?>" class="btn btn-success btn-sm mt-5"><i class="fas fa-download"></i> Backup Database</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Main Content -->