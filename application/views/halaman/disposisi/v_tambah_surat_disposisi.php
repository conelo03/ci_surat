<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-file-alt fa-sm"></i> Tambah Disposisi Surat</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Disposisi Surat</a></div>
        <div class="breadcrumb-item active">Tambah Disposisi Surat</div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="<?php echo site_url('disposisi/aksi_tambah_surat_disposisi') ?>">
            <div class="row">
              <div class="col-12">
                <div class="form-group" style="display: none;">
                  <label>User</label>
                  <input type="text" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user'); ?>">
                </div>

                <div class="form-group">
                  <label><i class="fas fa-file-alt"></i> Perihal Surat</label>
                  <select name="id_surat" class="form-control select2" style="width: 100%;">
                    <option value="">-Pilih Surat-</option>
                    <?php foreach ($surat_masuk as $surat_masuk){ ?>
                    <option value="<?php echo $surat_masuk->id_surat ?>">
                      <?php echo $surat_masuk->isi ?>
                    </option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-map-marker-alt"></i> Tujuan Surat</label>
                  <input type="text" name="tujuan" class="form-control">
                  <span class="text-danger"><?php echo form_error('tujuan'); ?></span>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-list-alt"></i> Isi Disposisi</label>
                  <input type="text" name="isi_disposisi" class="form-control">
                </div>

                <div class="form-group">
                  <label><i class="fas fa-clock"></i> Batas Waktu</label>
                  <input type="date" name="batas_waktu" class="form-control">
                </div>

                <div class="form-group">
                  <label><i class="fas fa-edit"></i> Catatan</label>
                  <textarea name="catatan" class="form-control"></textarea>
                </div>

                <div class="form-group" style="width: 100%;">
                  <label><i class="fas fa-info-circle"></i> Sifat Disposisi</label>
                  <select name="sifat" class="form-control selectric">
                    <option value="">-Pilih Sifat Disposisi-</option>
                    <option value="biasa">Biasa</option>
                    <option value="penting">Penting</option>
                    <option value="segera">Segera</option>
                    <option value="rahasia">Rahasia</option>
                  </select>
                </div>

                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <button type="submit" class="btn btn-dark btn-block"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <a href="<?php echo site_url('disposisi') ?>" class="btn btn-dark btn-block"><i class="fas fa-times"></i> Batal</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Main Content -->