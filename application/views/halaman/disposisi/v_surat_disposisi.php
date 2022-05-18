<!-- Main Content -->
<div class="main-content">
  <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('sukses'); ?>">
  <?php if ($this->session->flashdata('sukses')): ?>
  <?php endif; ?>
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-file fa-sm"></i> Disposisi Surat</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Disposisi Surat</div>
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
                        }
                        ?>
                          
                      </td>
                      <td class="text-center" nowrap="nowrap">
                        <?php if($surat_keluar->jenis_surat=='Internal'):?>
                        <a href="<?php echo site_url('transaksi_surat/cek_surat_keluar/'.$surat_keluar->id_surat) ?>" class="btn btn-warning btn-sm" target="_blank" title='Lihat Surat'><i class="fas fa-envelope"></i></a>
                        <?php else:
                          $get_lampiran = $this->db->get_where('register',['id_surat' => $surat_keluar->id_surat])->row();
                        ?>

                        <a href="<?php echo site_url('assets/upload/lampiran/'.$get_lampiran->lampiran) ?>" class="btn btn-warning btn-sm" target="_blank" title='Lihat Surat'><i class="fas fa-envelope"></i></a>
                        <?php endif; ?>
                        
                        <a href="<?php echo site_url('transaksi_surat/cek_kartu_register/'.$surat_keluar->id_surat) ?>" class="btn btn-warning btn-sm" target="_blank" title='Lihat Kartu Register'><i class="fas fa-file"></i></a>

                        <a href="<?php echo site_url('Disposisi/kelola_disposisi/'.$surat_keluar->id_surat) ?>" class="btn btn-info btn-sm" title='Kelola Disposisi'><i class="fa fa-edit"></i></a>
                        <a href="<?php echo site_url('Disposisi/forward_surat/'.$surat_keluar->id_surat) ?>" class="btn btn-info btn-sm tombol-a" title='Konfirmasi Disposisi'><i class="fa fa-forward"></i></a>
                        
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