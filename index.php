<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ระบบจัดการหลังบ้านระบบบันทึกเวลาเข้าออก</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>

  <div class="container-scroller">
    <?php
    include './confix/DB.php';
    session_start();

    if ($_SESSION['Emp_id'] == null) {
      header("location: ./login.php");
    } else if ($_SESSION['Emp_id'] != null) {
      include './api/showData.php';
      include './Head.php';
      include './ListNan.php';


      @$p = (isset($_GET['p']) ? $_GET['p'] : '');
      if ($p == 'constant') {
        include('./pages/system/constant.php');
      } elseif ($p == 'department') {
        include('./pages/system/department.php');
      } elseif ($p == 'position') {
        include('./pages/system/position.php');
      } elseif ($p == 'peleave') {
        include('./pages/system/peleave.php');
      } elseif ($p == 'employeeHR') {
        include('./pages/system/employeeHR.php');
      } elseif ($p == 'employeeCEO') {
        include('./pages/system/employeeCEO.php');
      } elseif ($p == 'employeeEmp') {
        include('./pages/system/employeeEmp.php');
      } elseif ($p == 'timetable') {
        include('./pages/system/timetable.php');
      } elseif ($p == 'leave1') {
        include('./pages/system/leave1.php');
      } elseif ($p == 'leave2') {
        include('./pages/system/leave2.php');
      } elseif ($p == 'leave3') {
        include('./pages/system/leave3.php');
      } elseif ($p == 'peleave1') {
        include('./pages/system/peleave1.php');
      } elseif ($p == 'showleave') {
        include('./pages/system/showleave.php');
      } elseif ($p == 'ReportEmp') {
        include('./pages/system/ReportEmp.php');
      } elseif ($p == 'ReportLeave') {
        include('./pages/system/ReportLeave.php');
      } elseif ($p == 'Reporttimetable') {
        include('./pages/system/Reporttimetable.php');
      } elseif ($p == 'Home') {
        include('./pages/system/Home.php');
      } elseif ($p == 'Reporttimetable2') {
        include('./pages/system/Reporttimetable2.php');
      } elseif ($p == 'ReportLeave2') {
        include('./pages/system/ReportLeave2.php');
      } elseif ($p == 'ReportEmp1') {

        @$str = $_GET['str'];
        include('./pages/system/ReportEmp1.php');
      } else {
        include('./pages/system/Home.php');
      }
    }


    ?>


    <!-- ****************************************************************************** -->


    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>