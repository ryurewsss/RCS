<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Car rental system with blockchain technology</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Date Range Picker -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <!-- Date Range Picker -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <!-- Time Picker -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

  <!-- Page level plugins -->
  <!-- <script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script> -->

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <!-- <script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="<?= base_url() ?>assets/js/demo/chart-area-demo.js"></script> -->
  <!-- <script src="<?= base_url() ?>assets/js/demo/chart-pie-demo.js"></script> -->

  <!-- Page level plugins -->
  <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url() ?>assets/js/demo/datatables-demo.js"></script>
  
  <!-- Date Range Picker -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  
  <!-- Date Picker -->
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- Time Picker -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

  <!-- sweetalert2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav  sidebar sidebar-dark accordion" style='background-color: #48AAAD;' id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <!-- <i class="fas fa-car" style='font-size:40px'></i> -->
          <img src="<?= base_url() ?>assets/img/iconcar.png" width="50px" height="50px">
        </div>
        <div class="sidebar-brand-text mx-3" style="font-size: 28px;">CRS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <?php
        if($_SESSION['type'] != 0){
      ?>
      <li class="nav-item active">
        <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>User/profile" aria-expanded="false">
          <img class="img-profile rounded-circle" src="<?php echo isset( $_SESSION['user_img']) ? base_url('img/user_img').'/'. $_SESSION['user_img'] : base_url('img/user_img').'/'. 'profile.png'; ?>">
          <span class="mr-2 d-none d-lg-inline text-center"><?php echo $_SESSION['name'];?></span>
        </a>
      </li>
      <?php
        }else{
      ?>
      <li class="nav-item active">
        <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Login" aria-expanded="false">
        <i class="fas fa-sign-in-alt" style='font-size:20px'></i>
          <span>เข้าสู่ระบบ</span></a>
      </li>
      <?php
        }
      ?>

      <hr class="sidebar-divider">

      <!-- Heading -->
      <!-- <div class="sidebar-heading" style="font-size: 13px;">
        รายการ
      </div> -->

      <li class="nav-item active">
        <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>" aria-expanded="false">
          <i class="fas fa-home" style='font-size:20px'></i>
          <span>หน้าแรก</span></a>
      </li>

      <?php
        if($_SESSION['type'] == 1){
      ?>
        <li class="nav-item active">
          <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Transaction/transaction" aria-expanded="false">
            <i class="fa fa-search" style='font-size:20px'></i>
            <span>ตรวจสอบการเช่า</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Car/carDepositTable" aria-expanded="false">
            <i class="fa fa-search" style='font-size:20px'></i>
            <span>ตรวจสอบการฝากเช่า</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link collapsed waves-effect waves-dark" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder" style='font-size:20px'></i>
            <span>จัดการข้อมูล</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h5 class="collapse-header">ข้อมูลรถเช่า:</h5>

              <a class="collapse-item" href="<?= base_url() ?>Car/car" aria-expanded="false">
                <i class="fas fa-car" style='font-size:20px'></i>
                &ensp;<span>จัดการรถเช่า</span>
              </a>

              <a class="collapse-item" href="<?= base_url() ?>Car/carBrand" aria-expanded="false">
                <i class="fas fa-car-side" style='font-size:20px'></i>
                &ensp;<span>จัดการยี่ห้อรถยนต์</span>
              </a>
              
              <a class="collapse-item" href="<?= base_url() ?>Car/carModel" aria-expanded="false">
                <i class="fas fa-car-crash" style='font-size:20px'></i>
                &ensp;<span>จัดการรุ่นรถยนต์</span>
              </a>

              <div class="collapse-divider"></div>
              <h5 class="collapse-header">ข้อมูลอื่นๆ:</h5>

              <a class="collapse-item" href="<?= base_url() ?>Place/place" aria-expanded="false">
                <i class="fas fa-warehouse" style='font-size:20px'></i>
                &ensp;<span>จัดการสถานที่</span>
              </a>

              <a class="collapse-item" href="<?= base_url() ?>User/user" aria-expanded="false">
                <i class="fas fa-user-friends" style='font-size:20px'></i>
                &ensp;<span>จัดการสมาชิก</span>
              </a>

            </div>
          </div>
        </li>
        
      <?php
        }
      ?>

      <li class="nav-item active">
        <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Car/carSearch" aria-expanded="false">
          <i class="fa fa-search" style='font-size:20px'></i>
          <span>ค้นหารถเช่า</span></a>
      </li>

      <?php
        if($_SESSION['type'] != 0){
      ?>
      <li class="nav-item active">
        <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Car/carDeposit" aria-expanded="false">
          <i class="fas fa-car-alt" style='font-size:20px'></i>
          <span>ฝากเช่า</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Transaction/transactionRecord" aria-expanded="false">
          <i class="fas fa-scroll" style='font-size:20px'></i>
          <span>ดูประวัติการเช่า</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Car/carDepositRecord" aria-expanded="false">
          <i class="fas fa-scroll" style='font-size:20px'></i>
          <span>ดูประวัติการฝากเช่า</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>User/profile" aria-expanded="false">
          <i class="far fa-address-card" style='font-size:20px'></i>
          <span>แก้ไขบัญชีผู้ใช้</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Login/logout" aria-expanded="false">
          <i class="fas fa-sign-out-alt" style='font-size:20px'></i>
          <span>ออกจากระบบ</span></a>
      </li>

      <?php
        }
      ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar UNDO AGAIN -->
        <nav class="navbar">

        </nav>
        <!-- End of Topbar UNDO AGAIN -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div> -->

          <!-- Content Row -->
          <?= $page_content ?>
          <!-- End Content Row -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2022</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

</body>

</html>

<script>
  $("#sidebarToggle").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });
</script>