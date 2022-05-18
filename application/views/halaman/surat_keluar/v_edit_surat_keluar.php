<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-envelope-open fa-sm"></i> Edit Surat Keluar</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Surat Keluar</a></div>
        <div class="breadcrumb-item">Edit Surat Keluar</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form method="POST" action="<?php echo site_url('transaksi_surat/aksi_edit_surat_keluar') ?>" enctype="multipart/form-data">
                <input type="hidden" name="id_surat" value="<?php echo $surat_keluar->id_surat ?>">
                <div class="row">
                  <div class="col-12">
                    <?php if(is_null($surat_keluar->komentar) || $surat_keluar->status == '0'):?>
                    <?php else:?>
                    <div class="form-group">
                      <label><i class="fas fa-file-alt"></i> Komentar</label>
                      <textarea name="komentar" class="form-control" readonly><?= $surat_keluar->komentar ?></textarea>
                    </div>
                    <?php endif;?>
                    

                    <div class="form-group">
                      <label><i class="fas fa-quote-left"></i> Judul</label>
                      <input type="text" name="judul" class="form-control"  value="<?php echo $surat_keluar->judul?>">
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-indent"></i> Nomor Surat</label>
                      <input type="text" name="no_surat" class="form-control" value="<?php echo $surat_keluar->no_surat?>">
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-list-alt"></i> Tujuan</label>
                      <select name="tujuan" class="form-control selectric">
                        <?php foreach($jabatan as $j): ?>
                        <option value="<?php echo $j->id_jabatan?>" <?php if ($surat_keluar->tujuan == $j->id_jabatan){echo "selected";} ?>><?php echo $j->jabatan?></option>
                        <?php endforeach; ?>
                      </select>
                    </div> 

                    <div class="form-group">
                      <label><i class="fas fa-file-alt"></i> Asal Surat</label>
                      <input type="text" name="asal" class="form-control" value="<?php echo $surat_keluar->asal?>">
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-list-alt"></i> Sifat</label>
                      <select name="sifat" class="form-control selectric">
                        <option value="<?php echo $surat_keluar->sifat ?>" selected><?php echo $surat_keluar->sifat ?></option>
                        <option value="Segera">Segera</option>
                        <option value="Biasa">Biasa</option>
                      </select>
                    </div> 

                    <div class="form-group">
                      <label><i class="fas fa-calendar-alt"></i> Tanggal Surat</label>
                      <input type="date" name="tanggal" class="form-control"  value="<?php echo $surat_keluar->tanggal?>">
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-quote-left"></i> Perihal</label>
                      <input type="text" name="perihal" class="form-control"  value="<?php echo $surat_keluar->perihal?>">
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-file-alt"></i> Isi Surat</label>
                      <textarea name="isi" class="form-control"><?php echo $surat_keluar->isi?></textarea>
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-calendar-alt"></i> Lampiran</label>
                      <input type="hidden" name="lampiran_lama" value="<?php if(isset($surat_keluar->lampiran)){ echo $surat_keluar->lampiran; }?>" class="form-control" >
                      <input type="file" name="lampiran" class="form-control" >
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-check"></i> Simpan</button>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <a href="<?php echo site_url('transaksi_surat/surat_keluar')  ?>" class="btn btn-light btn-block"><i class="fas fa-times"></i> Batal</a>
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