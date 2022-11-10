  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  ?><!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome to HMS Dispensary</title>
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="<?=base_url('/assets/js/datepicker.js');?>" charset="UTF-8"></script>
    <link rel="apple-touch-icon" sizes="57x57" href="<?=base_url('/assets/favicon/apple-icon-57x57.png');?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url('/assets/favicon/apple-icon-60x60.png');?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('/assets/favicon/apple-icon-72x72.png');?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('/assets/favicon/apple-icon-76x76.png');?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('/assets/favicon/apple-icon-114x114.png');?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url('/assets/favicon/apple-icon-120x120.png');?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?=base_url('/assets/favicon/apple-icon-144x144.png');?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url('/assets/favicon/apple-icon-152x152.png');?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('/assets/favicon/apple-icon-180x180.png');?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url('/assets/favicon/android-icon-192x192.png');?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('/assets/favicon/favicon-32x32.png');?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=base_url('/assets/favicon/favicon-96x96.png');?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('/assets/favicon/favicon-16x16.png');?>">
    <link rel="manifest" href="<?=base_url('/assets/favicon/manifest.json');?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
  </head>
  <body>
  <div class="wrapper ">
      <!-- <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?=base_url('/assets/img/sidebar-1.jpg');?>"> -->
      <div class="sidebar" data-color="purple" data-background-color="white">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo">
          <a href="<?=base_url('/');?>" class="simple-text logo-normal">
          <!-- <h3><b>HMS</b> </h3> -->
		   <img src="<?=base_url('/assets/img/hms_logo.png');?>" width="100" class="img-responsive"> 
          </a>
          
          <span class="crossLink"><img src="<?php echo base_url('/assets/img/close.png'); ?>" width="15" alt="" title="" /></span>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item">
              <a title="Dashboard" class="nav-link" href="<?=base_url('/');?>">
                <i class="fa fa-dashboard" style="color:orange ;" aria-hidden="true"></i>
                <p>Dashboard</p>
              </a>
            </li>
          
            <li class="nav-item ">
              <a title="OPD Register" class="nav-link" href="<?=base_url('/master/index/tbl_opd_patient');?>">
                <i class="fa fa-users" style="color:orange ;" aria-hidden="true"></i>
                <p>OPD Register</p>
              </a>
            </li>
          
            <li class="nav-item ">
              <a title="Only Admited Patient List" class="nav-link" href="<?=base_url('/master/index/tbl_ipd_patient');?>">
                <i class="fa fa-bed" style="color:orange ;" aria-hidden="true"></i>
                <p>All Admited Patient</p>
              </a>
            </li>

           <li class="nav-item ">
              <a title="Discharge Patient" class="nav-link" href="<?=base_url('/master/index/tbl_discharge_patient');?>">
                <i class="fa fa-blind" style="color:orange ;" aria-hidden="true"></i>
                <p>Discharge Patient</p>
              </a>
            </li>

			    <li class="nav-item ">
              <hr>
            </li>
            <li class="nav-item ">
              <a title="Diet Report" class="nav-link" href="<?=base_url('/master/index/tbl_diet');?>">
                <i class="fa fa-stethoscope" style="color:orange ;" aria-hidden="true"></i>
                <p>Diet</p>
              </a>
            </li>
            <li class="nav-item ">
              <a title="Surgery Report" class="nav-link" href="<?=base_url('/master/index/tbl_surgery');?>">
                <i class="fa fa-scissors" style="color:orange ;" aria-hidden="true"></i>
                <p>Surgery</p>
              </a>
            </li>
            <li class="nav-item ">
              <a title="Anc Register Report" class="nav-link" href="<?=base_url('/master/index/tbl_anc_register');?>">
                <i class="fa fa-medkit" style="color:orange;" aria-hidden="true"></i>
                <p>Anc Register</p>
              </a>
            </li>			
            
            <li class="nav-item ">
              <a title="Lab Report" class="nav-link" href="<?=base_url('/master/index/n_report_testm');?>">
                <i class="fa fa-flask" style="color:orange;" aria-hidden="true"></i>
                <p>Lab</p>
              </a>
            </li>
            <li class="nav-item ">
              <a title="X-Ray Report" class="nav-link" href="<?=base_url('/master/index/tbl_x_ray');?>">
              
              <i class="fa fa-odnoklassniki-square" style="color:orange;" aria-hidden="true"></i>
                <p>X-Ray</p>
              </a>
            </li>			
          </ul>
        </div>
      </div>
      <div class="main-panel">
          <div class="customToggleMenu" style="position: fixed; z-index: 10000; width:27px; cursor: pointer;"><span style="display:block; margin-top:7px; margin-left:12px;"><img src="<?php echo base_url('/assets/img/hamberg-menu.png'); ?>" /></span></div>
        <!-- Navbar -->
        <br><br>
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
       
        <li class="nav-item dropdown">
          <a class="dropdown-toggle btn btn-primary" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          All Therapy
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_gynec');?>">Gynec Entry Therapy</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_panchkarma');?>">Panchkarama Therapy</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/index/tbl_physio');?>">Physio Therapy </a></li>
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
            <li><a class="dropdown-item" href="<?=base_url('/dispensaries/report/tbl_medicine_master_stock');?>">Medicine Stock report</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/dispensaries/report/tbl_medicine_dispencing_sales');?>">Medicine Sales report</a></li> 
            <li><a class="dropdown-item" href="<?=base_url('/dispensaries/report/tbl_medicine_add_puchase');?>">Medicine Purchase report</a></li>
          <!--  <li><a class="dropdown-item" href="<?=base_url('/dispensaries/report/tbl_medicine_dispencing_sales');?>">Opd dispencing report</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/dispensaries/report/tbl_medicine_dispencing_sales');?>">Ipd dispencing report</a></li> -->
          </ul>
        </li>
		<li class="nav-item dropdown">
          <a class="dropdown-toggle btn btn-primary" href="<?=base_url('/master/downloads');?>">
            Download
          </a>
          
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
          Investigations
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?=base_url('/master/index/n_master_head');?>">Main Test Head</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/index/n_master_testunderhead');?>">Sub Test Head</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/master/index/n_master_fields');?>">Last Test Head</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-toggle btn btn-primary" href="#" id="navbarDispensaries" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pharmacy
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDispensaries">
            <li><a class="dropdown-item" href="<?=base_url('/dispensaries/index/tbl_medicine_master_stock');?>">Medicine Master Stock</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/dispensaries/index/tbl_medicine_add_puchase');?>">Add/Purchase Medicine</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/dispensaries/index/tbl_medicine_dispencing_sales');?>">Dispencing/Sale Medicine</a></li>
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
		
        
     
	  <li class="nav-item"><a class="btn btn-primary" href="#" style=""><?php echo get_current_user(); ?></a></li>
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
    			  <div class="logo logoMobile">
              <a href="<?=base_url('/');?>" class="simple-text logo-normal">
              <img src="<?=base_url('/assets/img/logo.jpg');?>" width="100" class="img-responsive"> 
              </a>              
            </div>
          </div>
		  
        </nav>
        <!-- End Navbar -->

        <!-- Navbar -->
      