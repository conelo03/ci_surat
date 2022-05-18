<!-- Main Content -->
<div class="main-content">
  <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('sukses'); ?>">
  <?php if ($this->session->flashdata('sukses')): ?>
  <?php endif; ?>
  <section class="section">
    <div class="section-header">
          <h1><i class="fa fa-envelope-open fa-sm"></i> Surat Keluar Eksternal</h1>    
          <a href="<?php echo site_url('transaksi_surat/tambah_surat_keluar_eks') ?>" class="btn btn-primary btn-sm ml-3"><i class="fas fa-plus"></i> Tambah Surat</a>
      
      
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Surat Keluar</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-1">
                  <thead>                                 
                    <tr>
                      <th>No Surat</th>
                      <th>Asal</th>
                      <th>Jenis</th>
                      <th>Sifat</th>
                      <th>Perihal</th>
                      <th>Tanggal</th>                      
                      <th>Status</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php  
                    foreach ($surat_keluar as $surat_keluar) {
                  ?>
                                                  
                    <tr>
                      <td><?php echo $surat_keluar->no_surat ?></td>
                      <td><?php echo $surat_keluar->asal ?></td>
                      <td><?php echo $surat_keluar->jenis_surat ?></td>
                      <td><?php echo $surat_keluar->sifat ?></td>  
                      <td><?php echo $surat_keluar->perihal ?></td>
                      <td><?php echo date('d F Y',strtotime($surat_keluar->tanggal)) ?></td>
                      <td>
                        <?php if($surat_keluar->status=='0'){
                          echo '<span class="badge badge-warning">Menunggu Verifikasi</span>';
                        } elseif ($surat_keluar->status=='1') {
                          echo '<span class="badge badge-info">Menunggu Disposisi</span>';
                        } elseif ($surat_keluar->status=='2') {
                          echo '<span class="badge badge-primary">Verifikasi Disposisi</span>';
                        } elseif ($surat_keluar->status=='3') {
                          echo '<span class="badge badge-success">Sudah Tervifikasi</span>';
                        }
                        ?>
                          
                      </td>
                      <td class="text-center" nowrap="nowrap">
                      <?php if($surat_keluar->status=='3'):
                        $get_disposisi = $this->db->get_where('disposisi_surat', ['id_surat' => $surat_keluar->id_surat])->row();
                      ?>
                        <a href="<?php echo site_url('transaksi_surat/cek_surat_disposisi/'.$surat_keluar->id_surat.'/'.$get_disposisi->id_disposisi) ?>" class="btn btn-warning btn-sm" target="_blank"><i class="fas fa-eye"></i> Cek</a>
                      <?php else :?>
                        <?php if($surat_keluar->jenis_surat=='Internal'):?>
                        <a href="<?php echo site_url('transaksi_surat/cek_surat_keluar/'.$surat_keluar->id_surat) ?>" class="btn btn-warning btn-sm" target="_blank"><i class="fas fa-eye"></i> Cek</a>
                        <?php else:?>

                        <?php endif; ?>
                      <?php endif; ?>
                        <a href="<?php echo site_url('transaksi_surat/cek_surat_keluar_eks/'.$surat_keluar->id_surat) ?>" class="btn btn-warning btn-sm" target="_blank"><i class="fas fa-envelope-open" title="Lihat Surat"></i></a>
                        <a href="<?php echo site_url('transaksi_surat/edit_surat_keluar_eks/'.$surat_keluar->id_surat) ?>" class="btn btn-info btn-sm"><i class="fas fa-edit" title="Edit"></i> </a>
                        <a href="<?php echo site_url('transaksi_surat/hapus_surat_keluar/'.$surat_keluar->id_surat) ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash" title="Hapus"></i></a>
                      </td>
                    </tr>
                  
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- End Main Content -->