<div class="container-fluid">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-themecolor">Thông tin tài khoản</h3>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="javascript:void(0)">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Tài khoản</li>
      </ol>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- End Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Start Page Content -->
  <!-- ============================================================== -->
  <!-- Row -->
  <div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
      <div class="card">
        <div class="card-body">
          <center class="mt-4">
            <img src="/assets/images/user.png" class="img-circle" width="150" />
            <h4 class="card-title mt-2"><?= session()->get('account_login')['name'] ?></h4>
          </center>
        </div>
      </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
      <div class="card">
        <!-- Tab panes -->
        <div class="card-body">
          <form action="admin/user/update" class="form-horizontal form-material mx-2" method="post">
            <input type="text" name="id" value="<?= session()->get('account_login')['id'] ?>" hidden>
            <?= view('messages/message') ?>
            <div class="form-group">
              <label class="col-md-12" for='name'>Họ và tên: </label>
              <div class="col-md-12">
                <input type="text" name="name" value="<?= session()->get('account_login')['name'] ?>" class="form-control form-control-line" />
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-md-12">Email:
              </label>
              <div class="col-md-12">
                <input type="email" class="form-control form-control-line" name="email" id="email" value="<?= session()->get('account_login')['email'] ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12" for="password">Mật khẩu: </label>
              <div class="col-md-12">
                <input type="password" name="password" id="password" value="" class="form-control form-control-line" readonly />
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12" for="password_confirm">Nhập lại mật khẩu: </label>
              <div class="col-md-12">
                <input type="password" name="password_confirm" id="password-confirm" value="" class="form-control form-control-line" readonly />
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12" for="phone">Số điện thoại:</label>
              <div class="col-md-12">
                <input type="text" name="phone" value="<?= session()->get('account_login')['phone'] ?>" class="form-control form-control-line" />
              </div>
            </div>
            <div class="form-check form-group">
              <input class="form-check-input" name="change_password" type="checkbox" id="change_password">
              <label class="form-check-label" for="change_password">
                Thay đổi mật khẩu
              </label>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <button class="btn waves-effect waves-light btn-info hidden-md-down text-white">
                  Cập nhật
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Column -->
  </div>
  <!-- Row -->
  <!-- ============================================================== -->
  <!-- End PAge Content -->
  <!-- ============================================================== -->
</div>