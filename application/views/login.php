
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="icon" type="image/png" href="<?php echo base_url('aassets/img/logo/logo.png')?>" sizes="32x32" />
  <title>Aplikasi Manajemen Surat - RSUD Sumedang</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/fontawesome/css/all.min.css')?>">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/components.css')?>">
</head>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <span class="text-primary">MANAJEMEN SURAT<br/>RSUD SUMEDANG</span><br>
            </div>
            <!-- NOTIF LOGIN DAN LOGOUT -->
            <?php
                if($this->session->flashdata('notif')){
                    echo '<p class="alert alert-success text-center"><i class="fas fa-times fa-2x"></i> '.$this->session->flashdata('notif') .'</p>';
                }elseif($this->session->flashdata('error')){
                    echo '<p class="alert alert-danger text-center"><i class="fas fa-times fa-2x"></i> '.$this->session->flashdata('error') .'</p>';
                }
            ?>
            <div class="card">
              <div style="margin: auto;">
                <img src="<?php echo base_url('assets/img/logo/logo.png') ?>" alt="logo" width="120">
              </div>
              <div class="card-body">
                <form method="POST" action="<?php echo site_url('auth/cek_auth')?>">
                  <div class="form-group">
                    <div class="d-block">  
                      <label><i class="fas fa-fingerprint text-primary"></i> Username</label>
                    </div>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username" tabindex="1" autocomplete="off" autofocus>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label><i class="fas fa-key text-primary"></i> Password</label>
                    </div>
                    <input type="password" class="form-control" placeholder="Masukan Password" name="password" id="password" tabindex="2">
                  </div>

                  <div class="form-group">
                    <button type="submit" onclick="return login();" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      <i class="fas fa-sign-in-alt"></i> LOGIN
                    </button>
                  </div>

                </form>
              </div>
            </div>
            <div class="simple-footer">
             Copyright@2020 by Reizky
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <!-- General JS Scripts -->
  <script src="<?php echo base_url('assets/modules/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/popper.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/tooltip.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/nicescroll/jquery.nicescroll.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/moment.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/stisla.js')?>"></script>
  <script src="<?php echo base_url('assets/sweetalert2/sweetalert2.all.min.js') ?>"></script>
  
  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/js/scripts.js')?>"></script>
  <script src="<?php echo base_url('assets/js/custom.js')?>"></script>

  <script type="text/javascript">
    function login() {
      var username = document.getElementById("username");
      if (username.value.length == 0) {
        Swal({
          type: 'error',
          title: 'PERINGATAN',
          text: 'Masukan Username !'
        });
        return false;
      }

      var password = document.getElementById("password");
      if (password.value.length == 0){
        Swal({
          type: 'error',
          title: 'PERINGATAN',
          text: 'Masukan Password !'
        });
        return false;
      } 
    }
  </script>
</body>
</html>