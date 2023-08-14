<div class="container-fluid">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-themecolor">Danh sách đơn phúc khảo</h3>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="javascript:void(0)">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Danh sách đơn</li>
      </ol>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- End Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Start Page Content -->
  <!-- ============================================================== -->
  <div class="row">
    <!-- column -->
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <?= view('messages/message') ?>
          <form action="admin/register/upload" method="post">
            <input type="text" name="id" value="<?= $form['id'] ?>" hidden>
            <input type="text" name="flag" value="2" hidden>
            <div class="form-row d-flex justify-content-between">
              <div class="form-group col-md-5">
                <label for="user_fullname" class="formbold-form-label">
                  Họ và tên:</label>
                <input type="text" name="user_fullname" id="user_fullname" class="form-control" value="<?= $form['user_fullname'] ?>" readonly />

              </div>
              <div class="form-group col-md-6">
                <label for="user_birthday" class="formbold-form-label">
                  Ngày sinh:
                </label>
                <input type="text" name="user_birthday" id="user_birthday" class="form-control" value="<?= $form['user_birthday'] ?>" readonly />
              </div>
            </div>
            <div class="form-row d-flex justify-content-between">
              <div class="form-group col-md-5">
                <label for="user_id" class="formbold-form-label"> MSSV: </label>
                <input type="text" name="user_id" id="user_id" value="<?= $form['user_id'] ?>" class="form-control" readonly />
              </div>
              <div class="form-group col-md-6">
                <label for="user_class" class="formbold-form-label"> Lớp: </label>
                <input type="text" name="user_class" id="user_class" value="<?= $form['user_class'] ?>" class="form-control" readonly />
              </div>
            </div>
            <div class="form-row d-flex justify-content-between">
              <div class="form-group col-md-5">
                <label for="email" class="formbold-form-label"> Email </label>
                <input type="email" name="email" id="email" class="form-control" value="<?= $form['email'] ?>" readonly />
              </div>
              <div class="form-group col-md-6">
                <label for="user_phone" class="formbold-form-label">
                  Số điện thoại:
                </label>
                <input type="text" name="user_phone" id="user_phone" class="form-control" value="<?= $form['user_phone'] ?>" readonly />
              </div>
            </div>

            <div class="form-row d-flex justify-content-between">
              <div class="form-group col-md-5">
                <label for="semester" class="formbold-form-label">Đơn phúc khảo các bài thi kết thúc học phần:</label>
                <input type="text" name="semester" id="semester" value="<?= $form['semester'] ?>" class="form-control" readonly />
              </div>
              <div class="form-group col-md-6">
                <label class="formbold-form-label">Năm học:</label>
                <input type="text" name="year" id="year" class="form-control" value="<?= $form['year'] ?>" readonly />
              </div>
            </div>
            <table class="table">
              <thead class="table-light">
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Mã học phần</th>
                  <th scope="col">Tên học phần</th>
                  <th scope="col">Ngày thi</th>
                  <th scope="col">Phòng thi</th>
                  <th scope="col">Điểm thi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="text-center">1</th>
                  <td><input type="text" name="course_id" id="course_id" class="form-control text-center" value="<?= $form['course_id'] ?>" readonly /></td>
                  <td><input type="text" name="course_name" id="course_name" class="form-control text-center" value="<?= $form['course_name'] ?>" readonly />
                  </td>
                  <td><input type="text" name="exam_date" id="exam_date" class="form-control text-center table-input" value="<?= $form['exam_date'] ?>" readonly /></td>
                  <td><input type="text" name="room" id="room" class="form-control text-center table-input" value="<?= $form['room'] ?>" readonly />
                  </td>
                  <td><input type="text" name="exam_mark" id="exam_mark" class="form-control text-center table-input" value="<?= $form['exam_mark'] ?>" <?= old('exam_mark') ?> readonly /></td>
                </tr>
              </tbody>
            </table>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Đồng ý cập nhật
                </label>
              </div>
            </div>
            <button class="btn waves-effect waves-light btn-info hidden-md-down text-white btn-update-form">
              Cập nhật
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- End PAge Content -->
  <!-- ============================================================== -->
</div>