<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-envelope-open fa-sm"></i> Komentar Surat</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Komentar</a></div>
        <div class="breadcrumb-item">Surat</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form method="POST" action="<?php echo site_url('transaksi_surat/aksi_kembalikan_surat') ?>" enctype="multipart/form-data">
                <input type="hidden" name="id_surat" value="<?php echo $id_surat ?>">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label><i class="fas fa-file-alt"></i> Komentar</label>
                      <?php 
                        $get_surat = $this->db->get_where('surat', ['id_surat' => $id_surat])->row_array();
                      ?>
                      <textarea name="komentar" class="form-control"><?= $get_surat['komentar'] ?></textarea>
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-check"></i> Simpan</button>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <a href="<?php echo site_url('transaksi_surat')  ?>" class="btn btn-light btn-block"><i class="fas fa-times"></i> Batal</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- End Main Content -->