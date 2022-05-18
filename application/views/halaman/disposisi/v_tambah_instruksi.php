<!-- Main Content -->
<div class="main-content">
  <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('sukses'); ?>">
  <?php if ($this->session->flashdata('sukses')): ?>
  <?php endif; ?>
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-users fa-sm"></i> Tambah Instruksi </h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Kelola Disposisi</a></div>
        <div class="breadcrumb-item">Tambah Instruksi</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form method="POST" action="<?php echo site_url('disposisi/aksi_tambah_instruksi') ?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-12">

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label><i class="fas fa-quote-left"></i> Instruksi / Informasi</label>
                          <input type="hidden" name="id_surat" class="form-control" value="<?php echo $id_surat?>">
                          <input type="hidden" name="id_disposisi" class="form-control" value="<?php echo $id_disposisi?>">
                          <input type="text" name="instruksi" class="form-control" value="">
                        </div>
                      </div>

                      <div class="col-6">
                        <div class="form-group">
                          <label><i class="fas fa-list-alt"></i> Terusan</label>
                          <select name="terusan" class="form-control selectric">
                            <option value="">-Pilih Tujuan-</option>
                            <?php foreach($user as $j): ?>
                            <option value="<?php echo $j->id_jabatan?>"><?php echo $j->id_jabatan?> - <?php echo $j->jabatan?></option>
                            <?php endforeach; ?>
                          </select>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <a href="<?php echo site_url('Disposisi/kelola_disposisi/'.$id_surat) ?>" class="btn btn-light btn-block"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                      </div>
                      <div class="col-6">
                        
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-check"></i> Simpan</button>
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