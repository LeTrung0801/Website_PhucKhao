<div class="main-wrapper container">
  <!-- Title -->
  <div class="main-header">
    <div class="main-header__title">
      <h3>Trang đăng ký thông tin phúc khảo</h3>
    </div>
    <div class="main-header__name ">
      <h6>Xin chào, <span class="text-success"><?= session()->get('user_login')['user_fullname'] ?> </span></h6>

    </div>
    <div class="main-header__name mt-5 ">
      <a href="user/register/list"> <span class="text-dark text-uppercase">Danh sách đơn phúc khảo</span></a>
    </div>
    <div class="main-header__name mt-5 ">
      <a href="user/register/add"> <span class=" text-dark text-uppercase">Đăng ký đơn phúc khảo</span></a>
    </div>
    <div class="main-header__name mt-5 ">
      <a href="user/logout">
        <button type="button" class="btn btn-danger">Đăng xuất</button>
      </a>
    </div>
  </div>

</div>