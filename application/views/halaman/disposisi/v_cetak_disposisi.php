<script type="text/javascript">window.print()</script>
<!DOCTYPE html>
<html>
<head>
	<title>Cetak Lembar Disposisi</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/surat_disposisi.css') ?>">
</head>
<body onload="window.print()" style="margin: auto;">
<?php foreach ($surat_disposisi as $surat_disposisi){ ?>
<div id="colres">
	<div class="disp">
		<?php foreach($instansi as $instansi){ ?>
		<img class="logodisp" src="<?php echo base_url('assets/upload/instansi_logo/'.$instansi->logo) ?>">
		<p class="up"><?php echo $instansi->institusi ?></p>
		<p class="up" id="nama"><?php echo $instansi->nama ?></p>
		<br>
		<p class="status"><?php echo $instansi->status ?></p>
		<span id="alamat">Jalan Condet Raya Gg. Pangeran Jakarta Timur</span>
		<?php } ?>
	</div>
	<div class="separator"></div>
	<table class="table-data">
    <tbody>
        <tr>
            <td class="tgh" id="lbr" colspan="5">LEMBAR DISPOSISI</td>
        </tr>
        <tr>
            <td id="right" width="18%"><strong>Indeks Berkas</strong></td>
            <td id="left" style="border-right: none;" width="57%">: <?php echo $surat_disposisi->indeks ?></td>
            <td id="left" width="25"><strong>Kode</strong> : <?php echo $surat_disposisi->kode ?></td>
        </tr>
        <tr><td id="right"><strong>Tanggal Surat</strong></td>
            <td id="left" colspan="2">: <?php echo $surat_disposisi->tgl_surat ?></td>
        </tr>
        <tr>
            <td id="right"><strong>Nomor Surat</strong></td>
            <td id="left" colspan="2">: <?php echo $surat_disposisi->no_surat ?></td>
        </tr>
        <tr>
            <td id="right"><strong>Asal Surat</strong></td>
            <td id="left" colspan="2">: <?php echo $surat_disposisi->asal_surat ?></td>
        </tr>
        <tr>
            <td id="right"><strong>Isi Ringkas</strong></td>
            <td id="left" colspan="2">: <?php echo $surat_disposisi->isi ?></td>
        </tr>
        <tr>
            <td id="right"><strong>Diterima Tanggal</strong></td>
            <td id="left" style="border-right: none;">: <?php echo $surat_disposisi->tgl_diterima ?></td>
            <td id="left"><strong>No. Agenda</strong> : <?php echo $surat_disposisi->no_agenda ?></td>
        </tr>
        <tr>
            <td id="right"><strong>Tanggal Penyelesaian</strong></td>
            <td id="left" colspan="2">: </td>
        </tr>
        <tr class="isi">
            <td colspan="2">
                <strong>Isi Disposisi :</strong><br/> <?php echo $surat_disposisi->isi_disposisi ?>
                <div style="height: 50px;"></div>
                <strong>Batas Waktu</strong> : <?php echo $surat_disposisi->batas_waktu ?><br/>
                <strong>Sifat</strong> : <?php echo $surat_disposisi->sifat ?><br/>
                <strong>Catatan</strong> : <?php echo $surat_disposisi->catatan ?><br/> 
                <div style="height: 25px;"></div>
            </td>
            <td><strong>Diteruskan Kepada</strong> : <br/> <?php echo $surat_disposisi->tujuan ?></td>
        </tr>
	</tbody>
</table>
</div>
<div id="lead">
	<p>Kepala Sekolah</p>
	<div style="height: 50px"></div>
	<p class="lead"><?php echo $instansi->kepsek ?></p>
	<p>NIP <?php echo $instansi->nip ?></p>
</div>
<div class="jarak2"></div>
</div>
<?php } ?>
</body>
</html>