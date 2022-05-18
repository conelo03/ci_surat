<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-building fa-sm"></i> Tambah Instalasi</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?php echo site_url('instalasi') ?>">Instalasi</a></div>
        <div class="breadcrumb-item">Tambah Instalasi</div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="<?php echo site_url('instalasi/aksi_tambah_instalasi') ?>">
            <div class="row">

              <div class="col-6">
                <div class="form-group">
                  <label><i class="fas fa-suitcase"></i> Pilih Jabatan</label>
                  <select name="id_jabatan" class="form-control selectric">
                    <option value="">-Pilih Jabatan-</option>
                    <?php foreach($jabatan as $j): ?>
                    <option value="<?php echo $j->id_jabatan?>"><?php echo $j->jabatan?></option>
                    <?php endforeach; ?>
                  </select>
                  <span class="text-danger"><?php echo form_error('id_jabatan') ?></span>
                </div> 
              </div>
              
              <div class="col-6">
                <div class="form-group">
                  <label><i class="fas fa-envelope"></i> Kode Surat</label>
                  <input type="text" name="kode_surat" class="form-control">
                  <span class="text-danger"><?php echo form_error('kode_surat') ?></span>
                </div>
              </div>

              <div class="col-12"> 
                <div class="form-group">
                  <label><i class="fas fa-building"></i> Nama Instalasi</label>
                  <input type="text" name="nama_instalasi" class="form-control">
                  <span class="text-danger"><?php echo form_error('nama_instalasi') ?></span>
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-check"></i> Simpan</button>
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <a href="<?php echo site_url('instalasi') ?>" class="btn btn-light btn-block"><i class="fas fa-times"></i> Batal</a>
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