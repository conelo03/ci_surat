<!-- Main Content -->
<div class="main-content">
  <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('sukses'); ?>">
  <?php if ($this->session->flashdata('sukses')): ?>
  <?php endif; ?>
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-file fa-sm"></i> Laporan Surat Internal</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Laporan Surat</div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
            <div class="row">

              <div class="col-6">
                <form method="POST" action="<?php echo site_url('Disposisi/laporan_sort') ?>" enctype="multipart/form-data">
                <div class="form-group">
                  <label><i class="fas fa-calendar"></i> Tanggal Mulai</label>
                  <input type="date" name="tgl_mulai" value="" class="form-control" required>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-calendar"></i> Tanggal Selesai</label>
                  <input type="date" name="tgl_selesai" value="" class="form-control" required>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-list"></i> Status</label>
                  <select name="status" class="form-control">
                    <option value="0" selected>Semua</option>
                    <option value="1">Selesai</option>
                    <option value="2">Belum Selesai</option>
                  </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sort"></i> Filter</button>
                </div>
                </form>
              </div>

              <div class="col-6">
                <form method="POST" action="<?php echo site_url('Disposisi/cetak_laporan') ?>" enctype="multipart/form-data">
                <div class="form-group">
                  <label><i class="fas fa-calendar"></i> Tanggal Mulai</label>
                  <input type="date" name="tgl_mulai" value="" class="form-control" required>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-calendar"></i> Tanggal Selesai</label>
                  <input type="date" name="tgl_selesai" value="" class="form-control" required>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-list"></i> Status</label>
                  <select name="status" class="form-control">
                    <option value="0" selected>Semua</option>
                    <option value="1">Selesai</option>
                    <option value="2">Belum Selesai</option>
                  </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-print"></i> Cetak</button>
                </div>
                </form>
              </div>

            </div>
        </div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-1">
                  <thead align="center">                                 
                    <tr>
                      <th>No.</th>
                      <th>Tanggal / No Surat</th>
                      <th>Tanggal Disposisi</th>
                      <th>Dari</th>
                      <th>Perihal</th>    
                      <th>Status</th>                 
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $no = 1;
                    foreach ($surat_keluar->result() as $s) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $s->tanggal.' / '.$s->no_surat ?></td>
                      <td><?php echo $s->tgl_penyelesaian ?></td>
                      <td><?php echo $s->asal ?></td> 
                      <td><?php echo $s->perihal ?></td>
                      <td>
                        <?php if($s->status=='0'){
                          echo 'Menunggu Verifikasi';
                        } elseif ($s->status=='1') {
                          echo 'Menunggu Disposisi';
                        } elseif ($s->status=='2') {
                          echo 'Verifikasi Disposisi';
                        } elseif ($s->status=='3') {
                          echo 'Menunggu Konfirmasi Instalasi';
                        } elseif ($s->status=='4') {
                          echo 'Selesai';
                        } elseif ($s->status=='5') {
                          echo 'Surat Dikembalikan';
                        }
                        ?>
                          
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
<?php function bulan_indo($bulan)
  {
      $bulan=$bulan;
      switch ($bulan) {
        case '01':
          $bulan= "Januari";
          break;
        case '02':
          $bulan= "Februari";
          break;
        case '03':
          $bulan= "Maret";
          break;
        case '04':
          $bulan= "April";
          break;
        case '05':
          $bulan= "Mei";
          break;
        case '06':
          $bulan= "Juni";
          break;
        case '07':
          $bulan= "Juli";
          break;
        case '08':
          $bulan= "Agustus";
          break;
        case '09':
          $bulan= "September";
          break;
        case '10':
          $bulan= "Oktober";
          break;
        case '11':
          $bulan= "November";
          break;
        case '12':
          $bulan= "Desember";
          break;
        default:
          $bulan= "Isi variabel tidak di temukan";
          break;
      }
      return $bulan;
  } 
  ?>
<!-- End Main Content -->