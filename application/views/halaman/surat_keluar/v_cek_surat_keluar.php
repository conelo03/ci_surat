<script type="text/javascript">window.print()</script>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cetak Surat</title>
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
        .separator2 {
            border-bottom: 2px solid #616161;
            margin: -1.3rem 0 1.5rem;
            width: 800px;
        }
  </style>

  
</head>
<body>
    <center>
        <table border="0" style="font-size:12pt;width:900px;">
            <tr>
                <td style="text-align: center;width: 10px;">
                  <img src="<?php echo base_url()?>/assets/img/logo/logo2.png" width='110px'>
                </td>

                <td style="text-align: center;font-size: 14pt"><b>PEMERINTAH KABUPATEN SUMEDANG</b>
                <br>
                RUMAH SAKIT UMUM DAERAH
                <br>
                <text style="font-size: 12pt">Jln. P. Geusan Ulun No. 41 - Jln. Palasari No. 80</text>
                <br>
                <text style="font-size: 12pt">Telp. (0261) 201021 Fax. 204970</text>
                <br>
                <text style="font-size: 12pt"><b>SUMEDANG 45312</b></td></text>
                 <td style="text-align: center;width: 10px;">
                  <img src="<?php echo base_url()?>/assets/img/logo/logo1.png" width='150px'>
                </td>
              </tr>
               <tr>
                <td colspan="3">
                    <hr size="6" align="center" width="100%" color="#000000"/>
                </tr>
            </table>
        <h3><u>NOTA SURAT</u></h3>
        <table border="0" style="font-size:12pt;width: 850px;">
            <tr>
                <td style="text-align: left;width: 110px;">Kepada</td>
                <td style="text-align: left;">: Yth. <?php echo $surat_keluar->jabatan_tujuan?></td>
            </tr>
            <tr>
                <td style="text-align: left;width: 110px;">Dari</td>
                <td style="text-align: left;">: <?php echo $surat_keluar->asal?> </td>
            </tr>
            <tr>
                <td style="text-align: left;width: 110px;">Sifat</td>
                <td style="text-align: left;">: <?php echo $surat_keluar->sifat?> </td>
            </tr>
            <tr>
                <td style="text-align: left;width: 110px;">Tanggal</td>
                <td style="text-align: left;">: <?php echo $tanggal?></td>
            </tr>
            <tr>
                <td style="text-align: left;width: 110px;">Nomor</td>
                <td style="text-align: left;">: <?php echo $surat_keluar->no_surat?> </td>
            </tr>
            <tr>
                <td style="text-align: left;width: 110px;">Perihal</td>
                <td style="text-align: left;">: <?php echo $surat_keluar->perihal?> </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr size="2" align="center" width="100%" color="#000000"/>
                </tr>
        </table>
        <br>
        <table border="0" style="font-size:12pt;width: 850px;">
            <tr>
                <td style="text-align: justify;"> <?php echo $surat_keluar->isi?> </td>
            </tr>
        </table>
        <br/>
        <br/>
        <br/>
        <table border="0" style="font-size:12pt;width: 850px;">
            <tr>
                <td style="text-align: left;"> </td>
                <td style="text-align: center;width: 280px;">
                    <?php echo 'Sumedang, '.$tanggal?>
                    <br>
                    <?php echo $surat_keluar->asal?>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <b><u><?php echo $user->nama?></u></b>
                    <br>
                    NIP. <?php echo $user->nip?>
                </td>
            </tr>
        </table>
        
    </center>

</body>
</html>