<script type="text/javascript">window.print()</script>
<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
<style>
  @media print {
    .no-print,.no-print * {
      display:none!important
    }
  }
  body, table {
    font-family: Arial, Helvetica;
    font-size: 13px !important;
  }
  @font-face {
    font-family: 'Loved by the King';
    font-style: normal;
    font-weight: 400;
    src: url('.ttf');?>') format('truetype');
  }
  .kop-surat {
    font-size: 22px;
  }
  .title {
    font-size: 18px;
  }
  .eng {
    font-family: Arial, Helvetica;
    font-size:9px; font-style:italic;
  }
  .signature {
    font-family: 'Loved by the King';
    font-size: 30px;
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
                <text style="font-size: 12pt">SUMEDANG 45312</td></text>

                 <td style="text-align: center;width: 10px;">
                  <img src="<?php echo base_url()?>/assets/img/logo/logo1.png" width='150px'>
                </td>
              </tr>
               <tr>
            <td colspan="3">
             <hr size="6" align="center" width="100%" color="#000000"/>
          </tr>
        </table>
        <br>
        <table border="1" width="100%">
          <text style="font-size: 14pt"><b>LAPORAN SURAT KELUAR EKSTERNAL RSUD SUMEDANG</text></b>
          <p><br>
                  <thead>                                 
                    <tr>
                      <th>No.</th>
                      <th>Tanggal / No Surat</th>
                      <th>Tanggal Disposisi</th>
                      <th>Dari</th>
                      <th>Perihal</th>    
                      <th>Tindak Lanjut</th>                 
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $no = 1;
                      foreach ($surat_keluar->result() as $s) { ?>
                      
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $s->tanggal.' / '.$s->no_surat ?></td>
                        <td><?php if(isset($s->tgl_penyelesaian)){ echo $s->tgl_penyelesaian; } ?></td>
                        <td><?php echo $s->asal ?></td> 
                        <td><?php echo $s->perihal ?></td>
                         <td></td>
                      </tr>
                    
                  <?php } ?>
                  </tbody>
                </table>
                </center>
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
</body>
</html>