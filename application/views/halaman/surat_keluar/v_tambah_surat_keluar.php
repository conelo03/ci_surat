<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-envelope-open fa-sm"></i> Surat Keluar Internal</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Surat Keluar Internal</a></div>
        <div class="breadcrumb-item">Tambah Surat Keluar</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form method="POST" action="<?php echo site_url('transaksi_surat/aksi_tambah_surat_keluar') ?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-12">

                    <div class="form-group">
                      <label><i class="fas fa-quote-left"></i> Judul</label>
                      <input type="text" name="judul" class="form-control" value="NOTA DINAS">
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-indent"></i> Nomor Surat</label>
                      <input type="text" name="no_surat" class="form-control" value="<?php echo $no_surat.'/'.$instalasi->kode_surat.'/'.$bulan.'/'.$tahun; ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-list-alt"></i> Tujuan</label>
                      <select name="tujuan" class="form-control selectric">
                        <option value="">-Pilih Tujuan-</option>
                        <?php foreach($jabatan as $j): ?>
                        <option value="<?php echo $j->id_jabatan?>"><?php echo $j->id_jabatan?> - <?php echo $j->jabatan?></option>
                        <?php endforeach; ?>
                      </select>
                    </div> 

                    <div class="form-group">
                      <label><i class="fas fa-file-alt"></i> Asal Surat</label>
                      <input type="hidden" name="" class="form-control" value="<?php echo $user->id_user?>">
                      <input type="text" name="asal" class="form-control" value="<?php echo $user->jabatan?>" readonly>
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-list-alt"></i> Jenis</label>
                      <select name="jenis" class="form-control selectric">
                        <option value="">-Pilih Sifat-</option>
                        <option value="Internal" selected>Internal</option>
                        <option value="Eksternal">Eksternal</option>
                      </select>
                    </div> 

                    <div class="form-group">
                      <label><i class="fas fa-list-alt"></i> Sifat</label>
                      <select name="sifat" class="form-control selectric">
                        <option value="">-Pilih Sifat-</option>
                        <option value="Segera">Segera</option>
                        <option value="Biasa">Biasa</option>
                      </select>
                    </div> 

                    <div class="form-group">
                      <label><i class="fas fa-calendar-alt"></i> Tanggal Surat</label>
                      <input type="date" name="tanggal" class="form-control">
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-quote-left"></i> Perihal</label>
                      <input type="text" name="perihal" class="form-control">
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-file-alt"></i> Isi Surat</label>
                      <textarea name="isi" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-calendar-alt"></i> Lampiran</label>
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
                          <a href="<?php echo site_url('transaksi_surat/surat_keluar') ?>" class="btn btn-light btn-block"><i class="fas fa-times"></i> Batal</a>
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