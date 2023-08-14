<!-- Sidebar scroll-->
<div class="scroll-sidebar">
  <!-- Sidebar navigation-->
  <nav class="sidebar-nav">
    <ul id="sidebarnav">
      <li>
        <a class="waves-effect waves-dark" href="admin/home" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Trang chủ</span></a>
      </li>
      <li>
        <!-- / $user['id']  -->
        <a class="waves-effect waves-dark" href="admin/user/profile/<?= session()->get('account_login')['id'] ?>" aria-expanded="false"><i class="fa fa-user-circle-o"></i><span class="hide-menu">Tài khoản</span></a>
      </li>
      <li>
        <a class="waves-effect waves-dark" href="admin/register/list" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">Danh sách đơn</span></a>
      </li>
      <li>
        <a class="waves-effect waves-dark" href="admin/complete/list" aria-expanded="false"><i class="fa fa-database"></i><span class="hide-menu">Đơn đã xử lý</span></a>
      </li>
      <li>
        <a class="waves-effect waves-dark" href="admin/archive/list" aria-expanded="false"><i class="fa fa-recycle"></i><span class="hide-menu">Đơn lưu trữ</span></a>
      </li>
    </ul>

    <div class="text-center mt-4">
      <a href="admin/logout" class="btn waves-effect waves-light btn-info hidden-md-down text-white">
        Đăng xuất</a>
    </div>
  </nav>
  <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->