<script type="text/javascript">window.print()</script>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cetak Kartu Registrasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <!-- Bootstrap 3.3.6 -->
  <style type="text/css">
        .separator1 {
            border-bottom: 4px solid #616161;
            margin: -1.3rem 0 1.5rem;
            width: 842px;
        }
        .judul {
            writing-mode:tb-rl;
            -webkit-transform:rotate(-90deg);
            -moz-transform:rotate(-90deg);
            -o-transform: rotate(-90deg);
            -ms-transform:rotate(-90deg);
            transform: rotate(180deg);
            background-color: black;
            color: white;
        }
  </style>

  

</head>
<body>
    <center>
        <table border="1" style="font-size:10pt;width: 600px; height: 300px;font-family: arial;">
            <tr>
                <td style="text-align: center; padding-left: 12px; width: 68px; font-weight: bold; background-color: black;" rowspan="6">
                    <div class="judul">
                        <font style="font-size: 9pt;">PEMERINTAH KABUPATEN SUMEDANG</font><br/>
                        <font style="font-size: 12pt;">RUMAH SAKIT UMUM DAERAH</font><br/>
                        <font style="font-size: 14pt;">KARTU SURAT MASUK</font>
                    </div>
                </td>
                <td style="text-align: left; padding-left: 12px; height: 40px;" colspan="3">Index : <br/><?php echo $surat_keluar->index_disposisi?></td>
            </tr>
            <tr>
                <td style="text-align: left; padding-left: 12px; padding-top: 12px; vertical-align: text-top;height: 60px;" colspan="3">Perihal : <br/><?php echo $surat_keluar->perihal?> </td>
            </tr>
            <tr>
                <td style="text-align: left; padding-left: 12px; padding-top: 12px; vertical-align: text-top;height: 60px;" colspan="3">Isi Ringkas : <br/><?php echo $surat_keluar->isi_ringkas?> </td>
            </tr>
            <tr>
                <td style="text-align: left; padding-left: 12px; height: 40px;" colspan="3">Dari : <?php echo $surat_keluar->asal?></td>
            </tr>
            <tr>
                <td style="text-align: left; padding-left: 12px; height: 30px;">Tgl. Surat :<br/> <?php echo $tanggal?></td>
                <td style="text-align: left; padding-left: 12px; height: 30px;">No. Surat :<br/> <?php echo $surat_keluar->no_surat?></td>
                <td style="text-align: left; padding-left: 12px; height: 30px;">Lampiran :<br/> <i>(terlampir)</i></td>

            </tr>
            <tr>
                <td style="text-align: left; padding-left: 12px; height: 40px; width: 100px;">Pengolah :<br/> <?php echo $pengolah->jabatan?></td>
                <td style="text-align: left; padding-left: 12px; height: 40px;">Tgl. diteruskan :<br/> <?php echo $tgl_diteruskan?></td>
                <td style="text-align: left; padding-left: 12px; height: 40px; width: 60px;">Tanda Terima :<br/> <i> </i></td>

            </tr>
        </table>
        
    </center>

</body>
</html>