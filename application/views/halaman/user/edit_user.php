<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <?php foreach ($user as $user) { ?>
    <div class="section-header">
      <h1><i class="fa fa-users fa-sm"></i> Edit User</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?php echo site_url('user') ?>">User</a></div>
        <div class="breadcrumb-item">Edit User</div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="<?php echo site_url('user/aksi_edit_user') ?>">
            <input type="hidden" name="id_user" value="<?php echo $user->id_user ?>">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label><i class="fas fa-fax"></i> NIP</label>
                  <input type="text" name="nip" class="form-control" value="<?php echo $user->nip ?>">
                  <span class="text-danger"><?php echo form_error('nip') ?></span>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-id-card"></i> Nama</label>
                  <input type="text" name="nama" class="form-control" value="<?php echo $user->nama ?>">
                  <span class="text-danger"><?php echo form_error('nama') ?></span>
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label><i class="fas fa-user"></i> Username</label>
                  <input type="text" name="username" class="form-control" value="<?php echo $user->username ?>">
                  <span class="text-danger"><?php echo form_error('username') ?></span>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-list-alt"></i> Pilih Level User</label>
                  <select name="level" class="form-control selectric">
                    <option value="" disabled selected>-Pilih Level User-</option>
                    <option value="Bagian Umum" <?php if ($user->level == "Bagian Umum"){echo "selected";} ?>>Bagian Umum</option>
                    <option value="Direktur" <?php if ($user->level == "Direktur"){echo "selected";} ?>>Direktur</option>
                    <option value="Instalasi" <?php if($user->level == "Instalasi"){echo "selected";} ?>>Instalasi</option>
                  </select>
                  <span class="text-danger"><?php echo form_error('level') ?></span>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group">
                  <label><i class="fas fa-list-alt"></i> Pilih Jabatan</label>
                  <select name="jabatan" class="form-control selectric">
                    <option value="" disabled selected>-Pilih Jabatan-</option>
                    <?php foreach($jabatan as $j): ?>
                    <option value="<?php echo $j->id_jabatan?>-<?php echo $j->jabatan?>" <?php if ($user->id_jabatan == $j->id_jabatan){echo "selected";} ?>><?php echo $j->jabatan?></option>
                    <?php endforeach; ?>
                  </select>
                  <span class="text-danger"><?php echo form_error('id_jabatan') ?></span>
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
    <?php } ?>
  </section>
</div>
<!-- Main Content -->