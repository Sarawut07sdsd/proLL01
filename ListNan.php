<?php
@$leavefd = "SELECT * FROM `leave` WHERE  Leave_status = 1 ORDER BY Leave_date DESC;   ";
@$Sqlleavefd = mysqli_query($con, $leavefd) or die("Error in query: $leavefd ");
@$numd = mysqli_num_rows($Sqlleavefd);
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="typcn typcn-device-desktop menu-icon"></i>
        <span class="menu-title">สถิติการลางาน</span>
        <div class="badge badge-danger">new</div>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="typcn typcn-user-add-outline menu-icon"></i>
        <span class="menu-title">จัดการข้อมูลพื้นฐาน</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <?php
          if ($_SESSION['Pos_id'] == 'POS1254') { ?>
            <li class="nav-item"> <a class="nav-link" href="index.php?p=constant"> ข้อมูลบริษัท </a></li>
          <?php  }  ?>

          <li class="nav-item"> <a class="nav-link" href="index.php?p=department"> ข้อมูลแผนก </a></li>
          <li class="nav-item"> <a class="nav-link" href="index.php?p=position"> ข้อมูลตำแหน่ง </a></li>
          <li class="nav-item"> <a class="nav-link" href="index.php?p=peleave1"> ข้อมูลประเภทการลางาน </a></li>
          <li class="nav-item"> <a class="nav-link" href="index.php?p=peleave"> ข้อมูลสิทธิ์การลา </a></li>

          <?php
          if ($_SESSION['Pos_id'] == 'POS1254') { ?>
            <li class="nav-item"> <a class="nav-link" href="index.php?p=employeeCEO"> ข้อมูลผู้บริหาร </a></li>
          <?php  }  ?>


          <li class="nav-item"> <a class="nav-link" href="index.php?p=employeeHR"> ข้อมูลหัวหน้าฝ่าย (HR) </a></li>
          <li class="nav-item"> <a class="nav-link" href="index.php?p=employeeEmp"> ข้อมูลพนักงาน </a></li>
        </ul>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="index.php?p=timetable">
        <i class="typcn typcn-chart-pie-outline menu-icon"></i>
        <span class="menu-title">ข้อมูลการลงเวลา</span>
      </a>

    </li>

    <li class="nav-item">
      <a class="nav-link" href="index.php?p=leave1">
        <i class="typcn typcn-chart-pie-outline menu-icon"></i>
        <span class="menu-title">อนุมัติลางาน</span>
        <div class="badge badge-danger"><?php echo $numd ?></div>
      </a>



    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="typcn typcn-th-small-outline menu-icon"></i>
        <span class="menu-title">ข้อมูลการลางาน</span>
        <i class="menu-arrow"></i>
      </a>

      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="index.php?p=leave2">รายการขอลางานที่อนุมัติ</a></li>
          <li class="nav-item"> <a class="nav-link" href="index.php?p=leave3">รายการที่ไม่อนุมัติ</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
        <i class="typcn typcn-compass menu-icon"></i>
        <span class="menu-title">สรุปข้อมูลรายงาน</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="icons">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#">รายงานพนักงาน</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">รายงานการลางาน</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">รายงานการเข้าออกงาน</a></li>
        </ul>
      </div>
    </li>


  </ul>
</nav>