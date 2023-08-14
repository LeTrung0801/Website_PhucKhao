<nav class="navbar top-navbar navbar-expand-md navbar-light">
  <div class="navbar-header">
    <a class="navbar-brand" href="admin/home">
      <img src="/assets/images/logo.png" alt="homepage" class="dark-logo" style="width: 35px; height: 35px" />
      <span>Đại học Sài Gòn</span>
    </a>
  </div>
  <!-- ============================================================== -->
  <!-- End Logo -->
  <!-- ============================================================== -->
  <div class="navbar-collapse">
    <!-- ============================================================== -->
    <!-- toggle and nav items -->
    <!-- ============================================================== -->
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
      </li>
      <!-- ============================================================== -->
      <!-- Search -->
      <!-- ============================================================== -->
      <li class="nav-item hidden-xs-down search-box">
        <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-search"></i></a>
        <form class="app-search" method="get" action="admin/register/list">
          <input type="text" name="search" class="form-control" id="search" placeholder="Search & enter" />
          <a class="srh-btn"><i class="fa fa-times"></i></a>
        </form>
      </li>
    </ul>
    <!-- ============================================================== -->
    <!-- User profile and search -->
    <!-- ============================================================== -->
    <ul class="navbar-nav my-lg-0">
      <!-- ============================================================== -->
      <!-- Profile -->
      <!-- ============================================================== -->
      <li class="nav-item dropdown u-pro">
        <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="admin/user/profile/<?= session()->get('account_login')['id'] ?>"><img src="/assets/images/user.png" alt="user" class="" />
          <span class="hidden-md-down"><?= session()->get('account_login')['name'] ?> &nbsp;</span>
        </a>
      </li>
    </ul>
  </div>
</nav>