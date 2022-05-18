<!-- Main Content -->
<div class="main-content">
  <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('sukses'); ?>">
  <?php if ($this->session->flashdata('sukses')): ?>
  <?php endif; ?>
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-server fa-sm"></i> Restore Database</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Restore Database</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              Silakan pilih file database lalu klik tombol "Restore" untuk melakukan restore database dari hasil backup yang telah dibuat sebelumnya. Jika belum ada file database hasil backup, silakan lakukan backup terlebih dahulu melalui menu "Backup Database"<br>
              <form method="POST" action="<?php echo site_url('restore/restore') ?>" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Upload File Backup SQL</label>
                  <input type="file" name="datafile" class="form-control">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-upload"></i> Upload</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Main Content -->