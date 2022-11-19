  <!-- partial:partials/_navbar.html -->
  <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
      <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
        <a class="navbar-brand brand-logo" href="#"><img src="images/logo-dark11.svg" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="images/logo-dark11.svg" alt="logo" /></a>
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <ul class="navbar-nav mr-lg-2">
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="images/faces/face5.jpg" alt="profile" />
            <span class="nav-profile-name">
              สวัสดีคุณ : <?php echo $_SESSION['Emp_name']; ?>
              รหัสสมาชิก :<?php echo $_SESSION['Emp_id']; ?>
              รหัสตำแหน่ง: <?php echo $_SESSION['Pos_id']; ?> </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <!--     <a class="dropdown-item">
                <i class="typcn typcn-cog-outline text-primary"></i>
                Settings
              </a> -->
            <a class="dropdown-item" href="./api/Logout.php">
              <i class="typcn typcn-eject text-primary"></i>
              ออกจากระบบ
            </a>
          </div>
        </li>
        <li class="nav-item nav-user-status dropdown">
          <p class="mb-0"></p>
        </li>
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-date dropdown">
          <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
            <h6 class="date mb-0"> <?php echo "Today is " . date("Y-m-d") ?>;</h6>
            <i class="typcn typcn-calendar"></i>
          </a>
        </li>


      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="typcn typcn-th-menu"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->
  <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
    <div class="navbar-links-wrapper d-flex align-items-stretch">
      <div class="nav-link">
        <a href="javascript:;"><i class="typcn typcn-calendar-outline"></i></a>
      </div>
      <div class="nav-link">
        <a href="javascript:;"><i class="typcn typcn-mail"></i></a>
      </div>
      <div class="nav-link">
        <a href="javascript:;"><i class="typcn typcn-folder"></i></a>
      </div>
      <div class="nav-link">
        <a href="javascript:;"><i class="typcn typcn-document-text"></i></a>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <ul class="navbar-nav mr-lg-2">
        <li class="nav-item ml-0">
          <h4 class="mb-0">ระบบบันทึกเวลาเข้าออกงาน </h4>
        </li>
        <li class="nav-item">
          <div class="d-flex align-items-baseline">

          </div>
        </li>
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-search d-none d-md-block mr-0">
          <div class="input-group">

            <div class="input-group-prepend">


              </span>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_settings-panel.html -->
    <div class="theme-setting-wrapper">
      <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
      <div id="theme-settings" class="settings-panel">
        <i class="settings-close typcn typcn-times"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-light-theme">
          <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
        </div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme">
          <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
        </div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
          <div class="tiles success"></div>
          <div class="tiles warning"></div>
          <div class="tiles danger"></div>
          <div class="tiles info"></div>
          <div class="tiles dark"></div>
          <div class="tiles default"></div>
        </div>
      </div>
    </div>
    <div id="right-sidebar" class="settings-panel">
      <i class="settings-close typcn typcn-times"></i>
      <ul class="nav nav-tabs" id="setting-panel" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
        </li>
      </ul>
      <div class="tab-content" id="setting-content">

        <!-- To do section tab ends -->

        <!-- chat tab ends -->
      </div>
    </div>