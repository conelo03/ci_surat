<!-- Main Content -->
<div class="main-content">
  <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('sukses'); ?>">
  <?php if ($this->session->flashdata('sukses')): ?>
  <?php endif; ?>
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-suitcase fa-sm"></i> Data Jabatan</h1>
      <a href="<?php echo site_url('jabatan/tambah_jabatan') ?>" class="btn btn-primary btn-sm ml-3"><i class="fas fa-plus"></i> Tambah Jabatan</a>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Jabatan</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jabatan</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php  
                $no = 1;
                foreach ($jabatan as $jabatan){
              ?>
              
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $jabatan->jabatan ?></td>
                  <td class="text-center">
                    <a href="<?php echo site_url('jabatan/edit_jabatan/'.$jabatan->id_jabatan) ?>" class="btn btn-info btn-sm"><i class="fas fa-edit" title="Edit"></i></a>
                    <a href="<?php echo site_url('jabatan/hapus_jabatan/'.$jabatan->id_jabatan) ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash" title="Hpaus"></i></a>
                  </td>
                </tr>
              
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Main Content -->