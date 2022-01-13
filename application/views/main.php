<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- <title><?= $title_name ?></title> -->
  <title>Car rental system with blockchain technology</title>


  <!-- Page level plugins -->
  <script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

      <!-- Nav Item - Dashboard -->
      <!-- <li class="nav-item active">
        <a class="nav-link" href="<?= base_url() ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading" style="font-size: 13px;">
        รายการ
      </div>

      <li class="nav-item active">
        <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>" aria-expanded="false">
          <i class="fas fa-home" style='font-size:20px'></i>
          <span>หน้าแรก</span></a>
      </li>

      <?php
      $usertype = 'lessor';
        if($usertype == 'lessor'){
      ?>
        <li class="nav-item active">
          <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Record/record" aria-expanded="false">
            <i class="fa fa-search" style='font-size:20px'></i>
            <span>ตรวจสอบการเช่า</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Record/profile" aria-expanded="false">
            <i class="far fa-address-card" style='font-size:20px'></i>
            <span>แก้ไขบัญชีผู้ใช้</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Car/car" aria-expanded="false">
            <i class="fas fa-car" style='font-size:20px'></i>
            <span>จัดการรถเช่า</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Car/carBrand" aria-expanded="false">
            <i class="fas fa-car-side" style='font-size:20px'></i>
            <span>จัดการยี่ห้อรถยนต์</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Car/carModel" aria-expanded="false">
            <i class="fas fa-car-crash" style='font-size:20px'></i>
            <span>จัดการรุ่นรถยนต์</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Place/place" aria-expanded="false">
            <i class="fas fa-warehouse" style='font-size:20px'></i>
            <span>จัดการสถานที่</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Record/record" aria-expanded="false">
            <i class="fas fa-user-friends" style='font-size:20px'></i>
            <span>จัดการสมาชิก</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Record/report" aria-expanded="false">
            <i class="fas fa-scroll" style='font-size:20px'></i>
            <span>ประวัติการเช่า</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Record/search" aria-expanded="false">
            <i class="fa fa-search" style='font-size:20px'></i>
            <span>ตรวจสอบการฝากเช่า</span></a>
        </li>
      <?php
        }
      ?>
      
      <li class="nav-item active">
        <a class="nav-link collapsed waves-effect waves-dark" href="<?= base_url() ?>Login/logout" aria-expanded="false">
          <i class="fas fa-sign-out-alt" style='font-size:20px'></i>
          <span>ออกจากระบบ</span></a>
      </li>

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
            <span>Copyright &copy; Your Website 2020</span>
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
  <script src="<?= base_url() ?>assets/js/demo/chart-pie-demo.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url() ?>assets/js/demo/datatables-demo.js"></script>


</body>

</html>