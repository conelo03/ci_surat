<!-- Main Content -->
<div class="main-content">
  <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('sukses'); ?>">
  <?php if ($this->session->flashdata('sukses')): ?>
  <?php endif; ?>
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-building fa-sm"></i> Data Instalasi</h1>
      <a href="<?php echo site_url('instalasi/tambah_instalasi') ?>" class="btn btn-primary btn-sm ml-3"><i class="fas fa-plus"></i> Tambah Instalasi</a>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Instalasi</a></div>
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
                  <th>Instalasi</th>
                  <th>Kode Surat</th>
                  <th class="text-center" width="10%">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php  
                $no = 1;
                foreach ($instalasi as $instalasi){
              ?>
              
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $instalasi->jabatan ?></td>
                  <td><?php echo $instalasi->nama_instalasi ?></td>
                  <td><?php echo $instalasi->kode_surat ?></td>
                  <td class="text-center">
                    <a href="<?php echo site_url('instalasi/edit_instalasi/'.$instalasi->id_instalasi) ?>" class="btn btn-info btn-sm"><i class="fas fa-edit" title="Edit"></i></a>
                    <a href="<?php echo site_url('instalasi/hapus_instalasi/'.$instalasi->id_instalasi) ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash" title="Hapus"></i></a>
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