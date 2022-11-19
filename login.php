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
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <!-- <img src="images/logo-dark.svg" alt="logo"> -->
                รอใส่โลโก้
              </div>
              <h4>ยินดีต้อนรับเข้าสู่หน้า ล็อดอิน เข้าสู่ระบบการใช้งาน</h4>
              <h6 class="font-weight-light">..</h6>
              <form class="pt-3" name="formlogin" action="api/login_process.php" method="POST">
                <div class="form-group">
                  <input type="text" name="Emp_id" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="รหัสพนักงาน">
                </div>
                <div class="form-group">
                  <input type="password" name="Emp_pass" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="รหัสผ่าน">
                </div>
                <div class="mt-3">
                 <!--  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">เข้าสู่ระบบ</a> -->
                  <button type="submit"class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >
                  เข้าสู่ระบบ
                  </button>

                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      หากผิดรหัสผ่านติดต่อู้บริหาร
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">..</a>
                </div>
                <div class="mb-2">
                  <!--  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="typcn typcn-social-facebook mr-2"></i>Connect using facebook
                  </button> -->
                </div>
                <div class="text-center mt-4 font-weight-light">
                  <!--     Don't have an account? <a href="register.html" class="text-primary">Create</a> -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>