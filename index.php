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
      include './Head.php';
      include './ListNan.php';
    }


    ?>


    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">

        <div class="row">
          <div class="col-xl-6 grid-margin stretch-card flex-column">
            <h5 class="mb-2 text-titlecase mb-4">ระบบจัดการหลังบ้านระบบบันทึกเวลาเข้าออก</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="table-responsive pt-3">
                <table class="table table-striped project-orders-table">
                  <thead>
                    <tr>
                      <th class="ml-5">รหัสพนักงาน</th>
                      <th>ชื่อพนักงาน</th>
                      <th>เบอร์โทรศัพท์</th>
                      <th>ที่อยู่</th>
                      <th>รหัสแผนก</th>
                      <th>รหัสตำแหน่ง</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1234567890123</td>
                      <td>ใจดี ดีนะ</td>
                      <td>0877218287</td>
                      <td>381 ขอนแก่น</td>
                      <td>1111</td>
                      <td>1112</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                            แก้ไข
                            <i class="typcn typcn-edit btn-icon-append"></i>
                          </button>
                          <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                            ลบ
                            <i class="typcn typcn-delete-outline btn-icon-append"></i>
                          </button>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>1234567890123</td>
                      <td>ใจดี ดีนะ</td>
                      <td>0877218287</td>
                      <td>381 ขอนแก่น</td>
                      <td>1111</td>
                      <td>1112</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                            แก้ไข
                            <i class="typcn typcn-edit btn-icon-append"></i>
                          </button>
                          <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                            ลบ
                            <i class="typcn typcn-delete-outline btn-icon-append"></i>
                          </button>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>1234567890123</td>
                      <td>ใจดี ดีนะ</td>
                      <td>0877218287</td>
                      <td>381 ขอนแก่น</td>
                      <td>1111</td>
                      <td>1112</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                            แก้ไข
                            <i class="typcn typcn-edit btn-icon-append"></i>
                          </button>
                          <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                            ลบ
                            <i class="typcn typcn-delete-outline btn-icon-append"></i>
                          </button>
                        </div>
                      </td>
                    </tr>


                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>



      <footer class="footer">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <!--  <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 <a href="https://www.bootstrapdash.com/" class="text-muted" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">Free <a href="https://www.bootstrapdash.com/" class="text-muted" target="_blank">Bootstrap dashboard</a> templates from Bootstrapdash.com</span> -->
            </div>
          </div>
        </div>
      </footer>
    </div>

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