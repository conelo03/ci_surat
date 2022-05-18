<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-envelope fa-sm"></i> Tambah Surat Masuk</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Surat Masuk</a></div>
        <div class="breadcrumb-item">Tambah Surat Masuk</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form method="POST" action="<?php echo site_url('transaksi_surat/aksi_tambah_surat_masuk') ?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group" style="display: none;">
                      <label>User</label>
                      <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">
                    </div>
                    
                    <div class="form-group">
                      <label><i class="fas fa-quote-left"></i> Nomor Agenda</label>
                      <input type="number" name="no_agenda" class="form-control" value="<?php echo $no_agenda_masuk ?>">
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-map-marker-alt"></i> Asal Surat</label>
                      <input type="text" name="asal_surat" class="form-control">
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-indent"></i> No Surat</label>
                      <input type="text" name="no_surat" class="form-control">
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-file-alt"></i> Isi Ringkas</label>
                      <textarea name="isi" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-bookmark"></i> Kode Klasifikasi</label>
                      <input type="text" name="kode" class="form-control">
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-list-alt"></i> Indeks Berkas</label>
                      <input type="text" name="indeks" class="form-control">
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-calendar-alt"></i> Tanggal Surat</label>
                      <input type="date" name="tgl_surat" class="form-control">
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-pencil-alt"></i> Keterangan</label>
                      <textarea name="keterangan" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-image"></i> Upload File / Scan Surat Masuk</label>
                      <span class="text-danger">*Format file yang diperbolehkan *.JPG, *.PNG, *.DOC, *.DOCX, *.PDF dan ukuran maksimal file 2 MB!</span>
                      <input type="file" name="file" class="form-control">
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-check"></i> Simpan</button>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <a href="#" class="btn btn-primary btn-block"><i class="fas fa-times"></i> Batal</a>
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