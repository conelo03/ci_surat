<!-- Main Content -->

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-envelope-open fa-sm"></i> Edit Surat Masuk Eksternal</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Surat Masuk Eksternal</a></div>
        <div class="breadcrumb-item">Edit Surat Masuk Eksternal</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form method="POST" action="<?php echo site_url('transaksi_surat/aksi_edit_surat_masuk_eks/keluar') ?>" enctype="multipart/form-data">
                <input type="hidden" name="id_surat" value="<?php echo $surat_keluar->id_surat ?>">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label><i class="fas fa-quote-left"></i> Judul</label>
                      <input type="text" name="judul" class="form-control"  value="<?php echo $surat_keluar->judul?>">
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-indent"></i> Nomor Surat</label>
                      <input type="text" name="no_surat" class="form-control" value="<?php echo $surat_keluar->no_surat?>">
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-file-alt"></i> Tujuan Surat</label>
                      <input type="text" name="tujuan" class="form-control" value="<?php echo $surat_keluar->tujuan?>">
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

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-check"></i> Simpan</button>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <a href="<?php echo site_url('transaksi_surat/surat_masuk_eksternal')  ?>" class="btn btn-light btn-block"><i class="fas fa-times"></i> Batal</a>
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