<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="Fiqisulaiman">
  <link rel="icon" type="image/png" href="<?php echo base_url('aassets/img/logo/logo.png')?>" sizes="32x32" />
  <title>Aplikasi Manajemen Surat - RSUD Sumedang</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/fontawesome/css/all.min.css')?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/datatables.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/select2/dist/css/select2.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/jquery-selectric/selectric.css')?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/components.css')?>">

  <!-- My CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/mycss.css')?>">
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg bg-primary"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
      	<div class="container">
	        <a href="<?php echo site_url('dashboard') ?>" class="navbar-brand sidebar-gone-hide mt-1">
            <img width="50" src="<?php echo base_url('assets/img/logo/logo.png') ?>">
            MANAJEMEN SURAT RSUD SUMEDANG
          </a>
	        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars mt-3"></i></a>
	        <form class="form-inline ml-auto">
	        </form>
	        <ul class="navbar-nav navbar-right">
	          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
	            <img alt="image" src="<?php echo base_url('assets/img/avatar/avatar-3.png') ?>" class="rounded-circle mr-1">
	            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('nama'); ?></div></a>
	            <div class="dropdown-menu dropdown-menu-right">
	              <a href="<?php echo site_url('auth/logout') ?>" class="dropdown-item has-icon text-primary">
	                <i class="fas fa-sign-out-alt"></i> Logout
	              </a>
	            </div>
	          </li>
	        </ul>
    	  </div>
      </nav>