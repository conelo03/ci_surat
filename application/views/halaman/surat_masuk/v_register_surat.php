<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-envelope-open fa-sm"></i> Registrasi Surat</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Register</a></div>
        <div class="breadcrumb-item">Register</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form method="POST" action="<?php echo site_url('transaksi_surat/aksi_register_surat') ?>" enctype="multipart/form-data">
                <input type="hidden" name="id_surat" value="<?php echo $surat_keluar->id_surat ?>">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label><i class="fas fa-quote-left"></i> Index</label>
                      <input type="text" name="index_disposisi" class="form-control"  value="<?php echo $no_index.'/RSUD/'.$tahun?>">
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-quote-left"></i> Perihal</label>
                      <input type="text" name="perihal" class="form-control"  value="<?php echo $surat_keluar->perihal?>" readonly>
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-file-alt"></i> Isi Ringkas</label>
                      <textarea name="isi_ringkas" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-file-alt"></i> Dari</label>
                      <input type="text" name="dari" class="form-control" value="<?php echo $surat_keluar->asal?>" readonly>
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-indent"></i> Nomor Surat</label>
                      <input type="text" name="no_surat" class="form-control" value="<?php echo $surat_keluar->no_surat?>" readonly>
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-calendar-alt"></i> Tanggal Surat</label>
                      <input type="date" name="tanggal" class="form-control"  value="<?php echo $surat_keluar->tanggal?>" readonly>
                    </div>

                    <!-- <div class="form-group">
                      <label><i class="fas fa-calendar-alt"></i> Lampiran</label>
                      <input type="file" name="lampiran" class="form-control" >
                    </div> -->

                    <div class="form-group">
                      <label><i class="fas fa-file-alt"></i> Pengolah</label>
                      <input type="hidden" name="pengolah" class="form-control" value="<?php echo $this->session->userdata('id_user');?>">
                      <?php 
                      $id_user = $this->session->userdata('id_user');
                      $get_user = $this->db->query("SELECT * FROM user where id_user='$id_user'")->row();?>
                      <input type="text" name="" class="form-control" value="<?php echo $get_user->jabatan?>" readonly>
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-calendar-alt"></i> Tanggal Diteruskan</label>
                      <input type="date" name="tgl_diteruskan" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label><i class="fas fa-file-alt"></i> Catatan</label>
                      <textarea name="catatan" class="form-control"></textarea>
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