<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <?php foreach ($jabatan as $jabatan) { ?>
    <div class="section-header">
      <h1><i class="fa fa-suitcase fa-sm"></i> Edit Jabatan</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?php echo site_url('jabatan') ?>">Jabatan</a></div>
        <div class="breadcrumb-item">Edit Jabatan</div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="<?php echo site_url('jabatan/aksi_edit_jabatan') ?>">
            <input type="hidden" name="id_jabatan" value="<?php echo $jabatan->id_jabatan ?>">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label><i class="fas fa-suitcase"></i> Jabatan</label>
                  <input type="text" name="jabatan" class="form-control" value="<?php echo $jabatan->jabatan ?>">
                  <span class="text-danger"><?php echo form_error('jabatan') ?></span>
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-check"></i> Simpan</button>
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <a href="<?php echo site_url('jabatan') ?>" class="btn btn-light btn-block"><i class="fas fa-times"></i> Batal</a>
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