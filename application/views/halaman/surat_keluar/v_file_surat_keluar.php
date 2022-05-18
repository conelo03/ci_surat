<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <?php foreach ($file_surat_keluar as $file_surat_keluar) { ?>
    <div class="section-header">
      <h1><i class="fa fa-file fa-sm"></i> File Surat : <?php echo strtoupper($file_surat_keluar->isi); ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Surat Masuk</a></div>
        <div class="breadcrumb-item">File Surat</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <div id="accordion">
                <div class="accordion">
                  <div class="accordion-header bg-dark text-white" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                    <h4><i class="fas fa-arrow-down"></i> Tampilkan Detail Data Surat</h4>
                  </div>
                  <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                    <table class="p">
                        <tbody class="mb-0">
                            <tr>
                                <td width="20%">No. Agenda</td>
                                <td width="1%">:</td>
                                <td width="86%"><?php echo $file_surat_keluar->no_agenda ?></td>
                            </tr>
                            <tr>
                                <td width="25%">Kode Klasifikasi</td>
                                <td width="1%">:</td>
                                <td width="86%"><?php echo $file_surat_keluar->kode ?></td>
                            </tr>
                            <tr>
                            <td width="13%">Isi Ringkas</td>
                            <td width="1%">:</td>
                            <td width="86%"><?php echo $file_surat_keluar->isi ?></td>
                            </tr>
                            <tr>
                                <td width="13%">Tujuan Surat</td>
                                <td width="1%">:</td>
                                <td width="86%"><?php echo $file_surat_keluar->tujuan ?></td>
                            </tr>
                            <tr>
                                <td width="13%">No. Surat</td>
                                <td width="1%">:</td>
                                <td width="86%"><?php echo $file_surat_keluar->no_surat ?></td>
                            </tr>
                            <tr>
                                <td width="13%">Tanggal Surat</td>
                                <td width="1%">:</td>
                                <td width="86%"><?php echo $file_surat_keluar->tgl_surat ?></td>
                            </tr>
                            <tr>
                                <td width="13%">Keterangan</td>
                                <td width="1%">:</td>
                                <td width="86%"><?php echo $file_surat_keluar->keterangan ?></td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h4><i class="fa fa-image fa-sm"></i> Foto File Surat</h4>
            </div>
            <div class="card-body">
              <img src="<?php echo base_url('assets/upload/surat_keluar/'.$file_surat_keluar->file) ?>" width="100%">
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </section>
</div>
<!-- End Main Content -->