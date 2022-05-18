<script type="text/javascript">window.print()</script>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cetak Disposisi Surat</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <!-- Bootstrap 3.3.6 -->
  <style type="text/css">
        .separator1 {
            border-bottom: 4px solid #616161;
            margin: -1.3rem 0 1.5rem;
            width: 800px;
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
    <div>
        <table border="0" style="font-size:12pt;width: 800px;">
            <tr>
                <td style="text-align: center;font-size: 16pt"><b>KARTU PENERUS - DISPOSISI</b></td>
            </tr>
        </table>
        <br>
        <div class="separator1"></div>
        <table border="1" style="font-size:12pt;width: 800px;">
            <tr>
                <td style="text-align: left;font-size: 12pt;padding-left: 10px; width: 380px;">INDEX : <br/><br/><?php echo $disposisi->index_disposisi?></td>
                <td style="text-align: left;font-size: 12pt;padding-left: 10px;">TANGGAL PENYELESAIAN : <br/><br/><?php echo $tanggal_selesai?></td>
            </tr>
        </table>
        <br/>
        <table border="0" style="font-size:12pt;width: 800px;">
            <tr>
                <td style="text-align: left;width: 110px;padding-left: 10px;">DARI</td>
                <td style="text-align: left;">: <?php echo $disposisi->asal?> </td>
            </tr>
            <tr>
                <td style="text-align: left;width: 110px;padding-left: 10px;">PERIHAL</td>
                <td style="text-align: left;">: <?php echo $disposisi->perihal?> </td>
            </tr>
            <tr>
                <td style="text-align: left;width: 110px;padding-left: 10px;">TGL. SURAT</td>
                <td style="text-align: left;">: <?php echo $tanggal_surat?></td>
            </tr>
            <tr>
                <td style="text-align: left;width: 110px;padding-left: 10px;">NO. SURAT</td>
                <td style="text-align: left;">: <?php echo $disposisi->no_surat?> </td>
            </tr>
        </table>
        <br>
        <table border="1" style="font-size:12pt;width: 800px;">
            <tr>
                <td style="text-align: center;font-size: 12pt;padding-left: 10px; width: 380px;">INSTRUKSI / INFORMASI</td>
                <td style="text-align: center;font-size: 12pt;padding-left: 10px;">DITERUSKAN KEPADA</td>
            </tr>
            <?php 
            $no=1;
            foreach($instruksi as $i): ?>
            <tr>
                <td style="text-align: left;font-size: 12pt;padding-left: 10px; width: 380px;"><?php echo $i->instruksi?></td>
                <td style="text-align: left;font-size: 12pt;padding-left: 10px;"><?php echo $no++.' Yth. '.$i->jabatan?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br/>
        <table border="0" style="font-size:12pt;width: 800px;">
            <tr>
                <td style="text-align: left;padding-left: 10px;">1. Kepada bawahan "instruksi" dan atau "informasi"</td>
            </tr>
            <tr>
                <td style="text-align: left;padding-left: 10px;">2. Kepada atasan "informasi" coret instruksi</td>
            </tr>
        </table>
        <br/>
        <br/>
        <div class="separator2"></div>
        <table border="0" style="font-size:12pt;width: 800px;">
            <tr>
                <td style="text-align: left;padding-left: 10px;">Sesudah digunakan harap segera dikembalikan</td>
            </tr>
            <tr>
                <td style="text-align: left;padding-left: 10px;">kepada : <?php echo $disposisi->kembali_kepada?></td>
            </tr>
            <tr>
                <td style="text-align: left;padding-left: 10px;">tanggal : <?php if($tanggal_kembali != '01 Januari 1970'){ echo $tanggal_kembali; } else {}?></td>
            </tr>
        </table>
    </div>
        
    </center>

</body>
</html>