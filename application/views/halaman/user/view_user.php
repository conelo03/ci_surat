<!-- Main Content -->
<div class="main-content">
  <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('sukses'); ?>">
  <?php if ($this->session->flashdata('sukses')): ?>
  <?php endif; ?>
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-users fa-sm"></i> Data User</h1>
      <a href="<?php echo site_url('user/tambah_user') ?>" class="btn btn-primary btn-sm ml-3"><i class="fas fa-user-plus"></i> Tambah User</a>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">User</a></div>
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
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php  
                $no = 1;
                foreach ($user as $user){
              ?>
              
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $user->nip ?></td>
                  <td><?php echo $user->nama ?></td>
                  <td><?php echo $user->jabatan ?></td>
                  <td><?php echo $user->username ?></td>
                  <td><?php echo $user->level ?></td>
                  <td class="text-center">
                    <a href="<?php echo site_url('user/edit_user/'.$user->id_user) ?>" class="btn btn-info btn-sm"><i class="fas fa-edit" title="Edit"></i></a>
                    <a href="<?php echo site_url('user/hapus_user/'.$user->id_user) ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash" title="Hapus"></i></a>
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