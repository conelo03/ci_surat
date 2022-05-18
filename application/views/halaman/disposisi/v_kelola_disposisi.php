<!-- Main Content -->
<?php if(empty($disposisi)): ?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-file fa-sm"></i> Kartu Register</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?php echo site_url('Disposisi') ?>">Disposisi Surat</a></div>
        <div class="breadcrumb-item">Kartu Register</div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
            <div class="row">

              <div class="col-6">
                <div class="form-group">
                  <label><i class="fas fa-list-alt"></i> Index</label>
                  <input type="hidden" name="id_surat" value="<?php echo $surat_keluar->id_surat?>" class="form-control">
                  <input type="text" name="index_disposisi" value="<?php echo $no_index?>" class="form-control" readonly>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-file-alt"></i> Isi Ringkas</label>
                  <input type="text" name="" class="form-control" value="<?php echo $surat_keluar->isi_ringkas?>" readonly>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-user-alt"></i> Pengolah</label>
                  <?php $get_pengolah = $this->db->query("SELECT * FROM user where id_user='$surat_keluar->pengolah'")->row();?>
                  <input type="text" name="" class="form-control" value="<?php echo $get_pengolah->jabatan?>" readonly>
                </div>

              </div>

              <div class="col-6">
                <div class="form-group">
                  <label><i class="fas fa-file-alt"></i> Perihal</label>
                  <input type="text" name="" class="form-control" value="<?php echo $surat_keluar->perihal?>" readonly>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-file-alt"></i> Catatan</label>
                  <input type="text" name="perihal" class="form-control" value="<?php echo $surat_keluar->catatan?>" readonly>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-calendar-alt"></i> Tanggal Diteruskan</label>
                  <input type="text" name="tanggal" class="form-control"  value="<?php echo date('d F Y', strtotime($surat_keluar->tgl_diteruskan))?>" readonly>
                </div>
              </div>

            </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-file fa-sm"></i> Kelola Disposisi</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?php echo site_url('Disposisi') ?>">Disposisi Surat</a></div>
        <div class="breadcrumb-item">Kelola Disposisi</div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="<?php echo site_url('disposisi/aksi_tambah_surat_disposisi') ?>">
            <div class="row">

              <div class="col-6">
                <div class="form-group">
                  <label><i class="fas fa-list-alt"></i> Index</label>
                  <input type="hidden" name="id_surat" value="<?php echo $surat_keluar->id_surat?>" class="form-control">
                  <input type="text" name="index_disposisi" value="<?php echo $no_index?>" class="form-control" readonly>
                  <span class="text-danger"><?php echo form_error('index_disposisi') ?></span>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-user-alt"></i> Dari</label>
                  <input type="text" name="" class="form-control" value="<?php echo $surat_keluar->asal?>" readonly>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-list-alt"></i> Nomor Surat</label>
                  <input type="text" name="no_surat" class="form-control" value="<?php echo $surat_keluar->no_surat?>" readonly>
                </div>

                
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label><i class="fas fa-calendar-alt"></i> Tanggal Penyelesaian</label>
                  <input type="date" name="tgl_penyelesaian" class="form-control">
                  <span class="text-danger"><?php echo form_error('tgl_penyelesaian') ?></span>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-file"></i> Perihal</label>
                  <input type="text" name="perihal" class="form-control" value="<?php echo $surat_keluar->perihal?>" readonly>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-calendar-alt-alt"></i> Tanggal Surat</label>
                  <input type="text" name="tanggal" class="form-control"  value="<?php echo date('d F Y', strtotime($surat_keluar->tanggal))?>" readonly>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group">
                  <label><i class="fas fa-list-alt"></i> Kembali Kepada</label>
                  <select name="kembali_kepada" class="form-control selectric">
                    <option value="">-Pilih Tujuan-</option>
                    <?php foreach($user as $j): ?>
                    <option value="<?php echo $j->jabatan?>"><?php echo $j->id_jabatan?> - <?php echo $j->jabatan?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <a href="<?php echo site_url('Disposisi/') ?>" class="btn btn-light btn-block"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
                
              </div>

              <div class="col-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-check"></i> Simpan</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

<?php else : ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-file fa-sm"></i> Kartu Register</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?php echo site_url('Disposisi') ?>">Disposisi Surat</a></div>
        <div class="breadcrumb-item">Kartu Register</div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
            <div class="row">

              <div class="col-6">
                <div class="form-group">
                  <label><i class="fas fa-list-alt"></i> Index</label>
                  <input type="hidden" name="id_surat" value="<?php echo $surat_keluar->id_surat?>" class="form-control">
                  <input type="text" name="index_disposisi" value="<?php echo $no_index?>" class="form-control" readonly>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-file-alt"></i> Isi Ringkas</label>
                  <input type="text" name="" class="form-control" value="<?php echo $surat_keluar->isi_ringkas?>" readonly>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-user-alt"></i> Pengolah</label>
                  <?php $get_pengolah = $this->db->query("SELECT * FROM user where id_user='$surat_keluar->pengolah'")->row();?>
                  <input type="text" name="" class="form-control" value="<?php echo $get_pengolah->jabatan?>" readonly>
                </div>

              </div>

              <div class="col-6">
                <div class="form-group">
                  <label><i class="fas fa-file-alt"></i> Perihal</label>
                  <input type="text" name="" class="form-control" value="<?php echo $surat_keluar->perihal?>" readonly>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-file-alt"></i> Catatan</label>
                  <input type="text" name="perihal" class="form-control" value="<?php echo $surat_keluar->catatan?>" readonly>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-calendar-alt"></i> Tanggal Diteruskan</label>
                  <input type="text" name="tanggal" class="form-control"  value="<?php echo date('d F Y', strtotime($surat_keluar->tgl_diteruskan))?>" readonly>
                </div>
              </div>

            </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-file fa-sm"></i> Kelola Disposisi</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?php echo site_url('Disposisi') ?>">Disposisi Surat</a></div>
        <div class="breadcrumb-item">Kelola Disposisi</div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="<?php echo site_url('disposisi/aksi_edit_surat_disposisi') ?>">
            <div class="row">

              <div class="col-6">
                <div class="form-group">
                  <label><i class="fas fa-list-alt"></i> Index</label>
                  <input type="hidden" name="id_surat" value="<?php echo $surat_keluar->id_surat?>" class="form-control">
                  <input type="hidden" name="id_disposisi" value="<?php echo $disposisi->id_disposisi?>" class="form-control">
                  <input type="text" name="index_disposisi" value="<?php echo $disposisi->index_disposisi?>" class="form-control">
                  <span class="text-danger"><?php echo form_error('index_disposisi') ?></span>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-user-alt"></i> Dari</label>
                  <input type="text" name="" class="form-control" value="<?php echo $surat_keluar->asal?>" readonly>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-list-alt"></i> Nomor Surat</label>
                  <input type="text" name="no_surat" class="form-control" value="<?php echo $surat_keluar->no_surat?>" readonly>
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label><i class="fas fa-calendar-alt"></i> Tanggal Penyelesaian</label>
                  <input type="date" name="tgl_penyelesaian" class="form-control" value="<?php echo $disposisi->tgl_penyelesaian?>">
                  <span class="text-danger"><?php echo form_error('tgl_penyelesaian') ?></span>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-file"></i> Perihal</label>
                  <input type="text" name="perihal" class="form-control" value="<?php echo $surat_keluar->perihal?>" readonly>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-calendar-alt-alt"></i> Tanggal Surat</label>
                  <input type="text" name="tanggal" class="form-control"  value="<?php echo date('d F Y', strtotime($surat_keluar->tanggal))?>" readonly>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group">
                  <label><i class="fas fa-list-alt"></i> Kembali Kepada</label>
                  <select name="kembali_kepada" class="form-control selectric">
                    <option value="">-Pilih Tujuan-</option>
                    <?php foreach($user as $j): ?>
                    <option value="<?php echo $j->jabatan?>" <?php if($disposisi->kembali_kepada == $j->jabatan){ echo 'selected';}?>><?php echo $j->id_jabatan?> - <?php echo $j->jabatan?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <a href="<?php echo site_url('Disposisi/') ?>" class="btn btn-light btn-block"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
              </div>
              <div class="col-6">              
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-check"></i> Update</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

<!-- Main Content -->

  <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('sukses'); ?>">
  <?php if ($this->session->flashdata('sukses')): ?>
  <?php endif; ?>
  <section class="section">
    <div class="section-header">
      <h1><i class="fa fa-users fa-sm"></i> Kelola Instruksi</h1>
      <a href="<?php echo site_url('disposisi/tambah_instruksi/'.$disposisi->id_disposisi.'/'.$surat_keluar->id_surat) ?>" class="btn btn-primary btn-sm ml-3"><i class="fas fa-plus"></i> Tambah Instruksi</a>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Disposisi</a></div>
        <div class="breadcrumb-item">Kelola Instruksi</div>
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
                      <th>#</th>
                      <th>Instruksi</th> 
                      <th>Terusan</th>                     
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody> 
                  <?php
                    $no=1;  
                    foreach ($instruksi as $i) {
                  ?>
                                                 
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $i->instruksi ?></td>
                      <td><?php echo $i->jabatan ?></td>
                      <td class="text-center" nowrap="nowrap">
                        <a href="<?php echo site_url('disposisi/edit_instruksi/'.$i->id_instruksi.'/'.$surat_keluar->id_surat) ?>" class="btn btn-info btn-sm"><i class="fas fa-edit" title="Edit"></i></a>
                        <a href="<?php echo site_url('disposisi/hapus_instruksi/'.$i->id_instruksi.'/'.$surat_keluar->id_surat) ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash" title="Hapus"></i></a>
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
<?php endif; ?>