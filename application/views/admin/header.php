<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>King Profit | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  
  <link rel="icon" type="image/png" href="<?php echo base_url()?>admin_assets/dist/img/favicon1.png" sizes="32x32" />
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('admin/Home') ?>" class="brand-link">
      <img src="<?php echo base_url() ?>admin_assets/dist/img/login_img.png" alt="logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-dark">KPVA Dashboard</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url('admin/Home') ?>" class="nav-link">
              <!--<i class="far fa-circle nav-icon"></i>-->
              <i class="fas fa-columns"></i>&nbsp;&nbsp;
              <p>
                Home
              </p>
            </a>
          </li>
          <!--User Nav-->
          <li class="nav-item">
            <a href="<?php echo base_url('admin/Users') ?>" class="nav-link">
              <i class="fas fa-users"></i>&nbsp;&nbsp;
              <p>
                 Users
              </p>
            </a>
          </li>
          <!--Add PKG Nav-->
          <li class="nav-item">
            <a href="<?php echo base_url('admin/Packages') ?>" class="nav-link">
              <i class="fab fa-simplybuilt"></i>&nbsp;&nbsp;
              <p>
                 Packages
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/Transaction/recharge') ?>" class="nav-link">
              <i class="fab fa-simplybuilt"></i>&nbsp;&nbsp;
              <p>
                 Recharge
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/Transaction/withdraw') ?>" class="nav-link">
              <i class="fab fa-simplybuilt"></i>&nbsp;&nbsp;
              <p>
                 Withdraw
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/Bank') ?>" class="nav-link">
              <i class="fab fa-simplybuilt"></i>&nbsp;&nbsp;
              <p>
                 Bank Account
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>