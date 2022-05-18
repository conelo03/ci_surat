<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <?php foreach ($surat_disposisi as $surat_disposisi){ ?>
    <div class="section-header">
      <h1><i class="fa fa-file-alt fa-sm"></i> Edit Disposisi Surat</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Disposisi Surat</a></div>
        <div class="breadcrumb-item active">Edit Disposisi Surat</div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="<?php echo site_url('disposisi/aksi_edit_surat_disposisi') ?>">
            <input type="hidden" name="id_disposisi" value="<?php echo $surat_disposisi->id_disposisi ?>">
            <div class="row">
              <div class="col-12">
                <div class="form-group" style="display: none;">
                  <label>User</label>
                  <input type="text" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user'); ?>">
                </div>

                <div class="form-group" style="width: 100%;">
                  <label><i class="fas fa-file-alt"></i> Perihal Surat</label>
                  <select class="form-control select2" name="id_surat" style="width: 100%;">
                    <?php foreach ($surat_masuk as $surat_masuk) { ?>
                      <option value="<?php echo $surat_masuk->id_surat ?>"
                        <?php if($surat_disposisi->id_surat == $surat_masuk->id_surat){ echo "selected"; } 
                    ?>>
                    <?php echo $surat_masuk->isi ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-map-marker-alt"></i> Tujuan Surat</label>
                  <input type="text" name="tujuan" class="form-control" value="<?php echo $surat_disposisi->tujuan ?>">
                  <span class="text-danger"><?php echo form_error('tujuan'); ?></span>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-list-alt-alt"></i> Isi Disposisi</label>
                  <input type="text" name="isi_disposisi" class="form-control" value="<?php echo $surat_disposisi->isi_disposisi?>">
                </div>

                <div class="form-group">
                  <label><i class="fas fa-clock"></i> Batas Waktu</label>
                  <input type="date" name="batas_waktu" class="form-control" value="<?php echo $surat_disposisi->batas_waktu ?>">
                </div>

                <div class="form-group">
                  <label><i class="fas fa-edit"></i> Catatan</label>
                  <textarea name="catatan" class="form-control"><?php echo $surat_disposisi->catatan ?></textarea>
                </div>

                <div class="form-group" style="width: 100%;">
                  <label><i class="fas fa-info-circle"></i> Sifat Disposisi</label>
                  <select name="sifat" class="form-control selectric">
                    <option value="">-Pilih Sifat Disposisi-</option>
                    <option value="biasa"   <?php if($surat_disposisi->sifat == 'biasa'){echo "selected";} ?>>Biasa</option>
                    <option value="penting" <?php if($surat_disposisi->sifat == 'penting'){echo "selected";} ?>>Penting</option>
                    <option value="segera"  <?php if($surat_disposisi->sifat == 'segera'){echo "selected";} ?>>Segera</option>
                    <option value="rahasia" <?php if($surat_disposisi->sifat == 'rahasia'){echo "selected";} ?>>Rahasia</option>
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
                      <a href="<?php echo site_url('disposisi') ?>" class="btn btn-dark btn-block"> Batal</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php } ?>
  </section>
</div>
<!-- Main Content -->