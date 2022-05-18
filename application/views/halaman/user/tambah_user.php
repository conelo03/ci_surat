<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-users fa-sm"></i> Tambah User</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?php echo site_url('user') ?>">User</a></div>
        <div class="breadcrumb-item">Tambah User</div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="<?php echo site_url('user/aksi_tambah_user') ?>">
            <div class="row">

              <div class="col-6">
                <div class="form-group">
                  <label><i class="fas fa-fax"></i> NIP</label>
                  <input type="text" name="nip" class="form-control">
                  <span class="text-danger"><?php echo form_error('nip') ?></span>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-id-card"></i> Nama</label>
                  <input type="text" name="nama" class="form-control">
                  <span class="text-danger"><?php echo form_error('nama') ?></span>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-list-alt"></i> Pilih Jabatan</label>
                  <select name="jabatan" class="form-control selectric">
                    <option value="">-Pilih Jabatan-</option>
                    <?php foreach($jabatan as $j): ?>
                    <option value="<?php echo $j->id_jabatan?>-<?php echo $j->jabatan?>"><?php echo $j->jabatan?></option>
                    <?php endforeach; ?>
                  </select>
                  <span class="text-danger"><?php echo form_error('id_jabatan') ?></span>
                </div>   
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label><i class="fas fa-user"></i> Username</label>
                  <input type="text" name="username" class="form-control">
                  <span class="text-danger"><?php echo form_error('username') ?></span>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-key"></i> Password</label>
                  <input type="password" name="password" class="form-control">
                  <span class="text-danger"><?php echo form_error('password') ?></span>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-list-alt"></i> Pilih Level User</label>
                  <select name="level" class="form-control selectric">
                    <option value="">-Pilih Level User-</option>
                    <option value="Bagian Umum">Bagian Umum</option>
                    <option value="Direktur">Direktur</option>
                    <option value="Instalasi">Instalasi</option>
                  </select>
                  <span class="text-danger"><?php echo form_error('level') ?></span>
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-check"></i> Simpan</button>
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <a href="<?php echo site_url('user') ?>" class="btn btn-light btn-block"><i class="fas fa-times"></i> Batal</a>
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