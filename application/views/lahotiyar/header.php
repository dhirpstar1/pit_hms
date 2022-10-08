  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  ?><!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome to HMS</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?=base_url('/assets/css/material-dashboard.css');?>" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?=base_url('/assets/demo/demo.css');?>" rel="stylesheet" />
    <link href="<?=base_url('/assets/css/datepicker.min.css');?>" rel="stylesheet" media="screen">
    <script src="<?=base_url('/assets/js/core/jquery.min.js');?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?=base_url('/assets/js/datepicker.min.js');?>" charset="UTF-8"></script>
  </head>
  <body>

  <div class="wrapper ">
      <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo">
          <a href="<?=base_url('/');?>" class="simple-text logo-normal">
          <img src="<?=base_url('/assets/img/logo.png');?>" width="100" class="img-responsive"> (HMS)
          </a>
        </div>


        <div class="sidebar-wrapper">


        
          <ul class="nav">
            <li class="nav-item active  ">
              <a class="nav-link" href="<?=base_url('/');?>">
                <i class="material-icons">Dashboard</i>
                <p style="color:#ffffff;">Dashboard</p>
              </a>
            </li>
          
            <li class="nav-item ">
              <a class="nav-link" href="<?=base_url('/master/index/tbl_opd_patient');?>">
                <i class="material-icons">O</i>
                <p>OPD Register</p>
              </a>
            </li>
           <!-- <li class="nav-item ">
              <a class="nav-link" href="<?=base_url('/master/index/tbl_opd_treatment');?>">
                <i class="material-icons">O</i>
                <p>OPD Treatment</p>
              </a>
            </li>
            !-->
            <hr>
            <li class="nav-item ">
              <a class="nav-link" href="<?=base_url('/master/index/tbl_ipd_patient');?>">
                <i class="material-icons">I</i>
                <p>All Admited Patient</p>
              </a>
            </li>
            <!-- 
            <li class="nav-item ">
              <a class="nav-link" href="<?=base_url('/master/index/tbl_ipd_treatment');?>">
                <i class="material-icons">I</i>
                <p>IPD Treatment</p>
              </a>
            </li>
            -->
            <li class="nav-item ">
              <a class="nav-link" href="<?=base_url('/master/index/tbl_diet');?>">
                <i class="material-icons">D</i>
                <p>Diet</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="<?=base_url('/master/index/tbl_surgery');?>">
                <i class="material-icons">S</i>
                <p>Surgery</p>
              </a>
            </li>
            <hr>
            <li class="nav-item ">
              <a class="nav-link" href="<?=base_url('/master/index/tbl_anc_register');?>">
                <i class="material-icons">A</i>
                <p>Anc Register</p>
              </a>

            </li>
            <hr>
            <li class="nav-item ">
              <a class="nav-link" href="<?=base_url('/master/index/tbl_discharge_patient');?>">
                <i class="material-icons">D</i>
                <p>Discharge</p>
              </a>

            </li>
            <li class="nav-item " style="visibility:hidden;">
              <a class="nav-link" href="<?=base_url('/master/index/tbl_discharge_patient');?>">
                <i class="material-icons">D</i>
                <p>Discharge</p>
              </a>

            </li>
          
          </ul>
        </div>
      </div>
      <div class="main-panel">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a href="<?=base_url('/');?>" class="dropdown-toggle btn btn-primary"> Home </a>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-toggle btn btn-primary" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Panchkarma
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_gynec');?>">Gynec Entry</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_panchkarma');?>">Panchkarama Entry</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_physio');?>">Physiotherapy Entry</a></li>

          </ul>
        </li>
    
        
        <li class="nav-item dropdown">
          <a class="dropdown-toggle btn btn-primary" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Receipts
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_receipt');?>">Receipts</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-toggle btn btn-primary" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Reports
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?=base_url('/master/report/tbl_ipd_patient');?>">IPD Report</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/report/tbl_opd_patient');?>">OPD Report</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/report/tbl_discharge_patient');?>">Discharge Report</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-toggle btn btn-primary" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Masters
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?=base_url('/master');?>">Doctors</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_departmentmaster');?>">Department</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_wardmaster');?>">Ward</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_bedmaster');?>">Bed</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_mst_employee');?>">Employee</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_stocktype');?>">Stock Type</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_stock_item');?>">Stock Item</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_procedure');?>">Procedure Gynac Type</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_karama');?>">Karma</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_therapy');?>">Therapy</a></li>

          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="dropdown-toggle btn btn-primary" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Certificates
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_cert_birth');?>">Birth Certificate</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_cert_death');?>">Death Certificate</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-toggle btn btn-primary" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Settings
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_settings');?>">Setting</a></li>
          <li><a class="dropdown-item" href="<?=base_url('/auth');?>">Users</a></li>
          </ul>
        </li>
      <li class="nav-item">
      <a class="btn btn-primary" href="<?=base_url('/auth/logout');?>">Logout</a>
                
        </li>
      </ul>
    </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
              <form class="navbar-form">              
              </form>
              
            </div>
          </div>
        </nav>
        <!-- End Navbar -->

        <!-- Navbar -->
      