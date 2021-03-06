<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tazkia - <?php echo $page_title ?></title>
  

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
<!--   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.js"></script> -->


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav  bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">


      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-pen"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Tazkia IIBS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <?php if($page_title == 'Dashboard'){?>
      <li class="nav-item active">
      <?php }elseif($page_title != 'Dashboard') { ?>
        <li class="nav-item">
        <?php } ?>
        <a class="nav-link" href="<?php echo base_url('dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Data Santri & Paket
        </div>

        <!-- Nav Item - Admin -->
    
      
              <!-- Nav Item - Soal Menu -->
        <?php 
          if( $this->uri->segment('1') == 'santri' ){?>
          <li class="nav-item active">
          <?php }elseif($this->uri->segment('2') != 'santri' ) { 
          ?>
          <li class="nav-item">
          <?php  
          }
          ?>
          <a class="nav-link" href="<?php echo base_url('santri') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Santri</span></a>
          </li>
                  <?php 
          if( $this->uri->segment('1') == 'paket' ){?>
          <li class="nav-item active">
          <?php }elseif($this->uri->segment('2') != 'paket' ) { 
          ?>
          <li class="nav-item">
          <?php  
          }
          ?>
          <a class="nav-link" href="<?php echo base_url('paket') ?>">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Data Paket</span></a>
          </li>
 
              <!-- Divider -->
              <hr class="sidebar-divider">

              <!-- Heading -->
              <div class="sidebar-heading">
                Laporan
              </div>
              <!-- Nav Item - Jawaban -->
        <?php 
          if( $this->uri->segment('2') == 'laporandatapaket' ){?>
          <li class="nav-item active">
          <?php }elseif($this->uri->segment('2') != 'laporandatapaket' ) { 
          ?>
          <li class="nav-item">
          <?php  
          }
          ?>
          <a class="nav-link" href="<?php echo base_url('laporan/laporandatapaket') ?>">
            <i class="fas fa-fw fa-reply"></i>
            <span>Laporan Data Paket</span></a>
          </li>

                 <?php   if( $this->uri->segment('2') == 'laporan_kategori_dan_sita' ||  $this->uri->segment('2') == 'laporankategori' ||  $this->uri->segment('2') == 'laporanpaketsita' ){?>
          <li class="nav-item active">
          <?php }elseif($this->uri->segment('2') != 'laporan_kategori_dan_sita' ||  $this->uri->segment('2') == 'laporankategori' ||  $this->uri->segment('2') == 'laporanpaketsita ' ) { 
          ?>
          <li class="nav-item">
          <?php  
          }
          ?>
                <a class="nav-link" href="<?php echo base_url('laporan/laporan_kategori_dan_sita') ?>">
                  <i class="fas fa-fw fa-eye"></i>
                  <span>Laporan Kategori dan Paket Disita</span></a>
                </li>





                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

       <?php 
    if( $this->uri->segment('1') == 'user' ){?>
      <li class="nav-item active">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-database"></i>
          <span>User & Role</span>
        </a>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
    <?php }elseif($this->uri->segment('1') != 'user' ) { ?>
      <li class="nav-item ">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-database"></i>
          <span>User & Role</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
    <?php  
       }
    ?>
            <?php 
            if( $this->uri->segment('2') == 'data_user' ){?>
            <a class="collapse-item active" href="<?php echo base_url('user/data_user') ?>">Data User</a>
            <?php }elseif($this->uri->segment('2') != 'data_user' ) { ?>
            <a class="collapse-item" href="<?php echo base_url('user/data_user') ?>">Data User</a>
            <?php  
               }
            ?>

            <?php 
            if( $this->uri->segment('2') == 'role' ){?>
            <a class="collapse-item active" href="<?php echo base_url('user/role') ?>">Data Role</a>
            <?php }elseif($this->uri->segment('2') != 'role' ) { ?>
            <a class="collapse-item" href="<?php echo base_url('user/role') ?>">Data Role</a>
            <?php  
               }
            ?>
          </div>
        </div>
      </li>



                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                 <?php   if( $this->uri->segment('1') == 'setting' ){?>
          <li class="nav-item active">
          <?php }elseif($this->uri->segment('1') != 'setting' ) { 
          ?>
          <li class="nav-item">
          <?php  
          }
          ?>
                <a class="nav-link" href="<?php echo base_url('setting') ?>">
                  <i class="fas fa-fw fa-cog"></i>
                  <span>Setting</span></a>
                </li>

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                  <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

              </ul>
              <!-- End of Sidebar -->

              <!-- Content Wrapper -->
              <div id="content-wrapper" class="d-flex flex-column ">

                <!-- Main Content -->
                <div id="content">

                  <!-- Topbar -->
                  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                      <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                     
                      <div class="topbar-divider d-none d-sm-block"></div>

                      <!-- Nav Item - User Information -->
                      <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('username') ?></span>
                          <img class="img-profile rounded-circle" src="<?php echo base_url()."assets/img/default-user.png"?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                          <a class="dropdown-item" href="<?php echo base_url('admin/user'); ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                          </a>
                          <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                          </a>
                          <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                          </a>
                        </div>
                      </li>

                    </ul>

                  </nav>
                  <!-- End of Topbar -->

                  <!-- Begin Page Content -->
                  <div class="container-fluid ">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between ">
                      <h1 class="h3 mb-3 text-gray-800"><?php echo $page_title ?></h1>

                      <!-- TUTUP HEADER DI BODY -->
