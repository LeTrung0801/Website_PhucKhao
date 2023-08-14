<div class="main-wrapper container">
  <!-- Title -->
  <div class="main-header">
    <div class="main-header__title">
      <h3>Trang đăng ký thông tin phúc khảo</h3>
    </div>
    <div class="main-header__name ">
      <h6>Xin chào, <span class="text-success"><?= session()->get('user_login')['user_fullname'] ?> </span></h6>

    </div>
    <div class="main-header__name mt-2 ">
      <a href="user/register/list"> <span class="text-dark text-uppercase">Danh sách đơn phúc khảo</span></a>
    </div>
    <div class="main-header__name mt-3 ">
      <a href="user/logout"> <span class=" text-danger">Đăng xuất</span></a>
    </div>
  </div>

  <div class="formbold-main-wrapper">
    <!-- Row 1 -->
    <div class="formbold-form-wrapper">
      <form action="user/register/create" method="POST">
        <?= view('messages/message') ?>
        <input name='id' hidden>
        <div class="formbold-input-flex">
          <div>
            <label for="user_fullname" class="formbold-form-label">
              Họ và tên:</label>
            <input type="text" name="user_fullname" id="user_fullname" class="formbold-form-input" value="<?= session()->get('user_login')['user_fullname'] ?>" />
          </div>

          <div class="formbold-mb-3">
            <label for="user_birthday" class="formbold-form-label">
              Ngày sinh:
            </label>
            <input type="text" name="user_birthday" id="user_birthday" class="formbold-form-input" <?= old('user_birthday') ?> value="<?= session()->get('user_login')['user_birthday'] ?>" required />
          </div>
        </div>
        <!-- Row 2 -->
        <div class="formbold-input-flex">
          <div>
            <label for="user_id" class="formbold-form-label"> MSSV: </label>
            <input type="text" name="user_id" id="user_id" value="<?= session()->get('user_login')['user_id'] ?>" class="formbold-form-input" />
          </div>

          <div>
            <label for="user_class" class="formbold-form-label"> Lớp: </label>
            <input type="text" name="user_class" id="user_class" value="<?= session()->get('user_login')['user_class'] ?>" class="formbold-form-input" />
          </div>
        </div>

        <!-- Row 3 -->

        <div class="formbold-input-flex">
          <div>
            <label for="email" class="formbold-form-label"> Email </label>
            <input type="email" name="email" id="email" placeholder="example@email.com" class="formbold-form-input" <?= old('email') ?> required />
          </div>

          <div>
            <label for="user_phone" class="formbold-form-label">
              Số điện thoại:
            </label>
            <input type="text" name="user_phone" id="user_phone" placeholder="Nhập số điện thoại" class="formbold-form-input" <?= old('user_phone') ?> required />
          </div>
        </div>

        <!-- Row 4 -->
        <div class="formbold-input-flex">
          <div>
            <label for="semester" class="formbold-form-label">Đơn phúc khảo các bài thi kết thúc học phần:</label>
            <select class="formbold-form-input" name="semester" id="semester">
              <option value="1">Học kỳ 1</option>
              <option value="2">Học kỳ 2</option>
              <option value="3">Học kỳ 3</option>
            </select>
          </div>
          <div>
            <label class="formbold-form-label">Năm học:</label>
            <select class="formbold-form-input" name="year" id="year">
              <option value="2023">2023 - 2024</option>
              <option value="2024">2024 - 2025</option>
              <option value="2025">2025 - 2026</option>
            </select>
          </div>
        </div>

        <!-- Table -->
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
              <th scope="row">1</th>
              <td><input type="text" name="course_id" id="course_id" placeholder="Nhập mã môn" class="formbold-form-input text-center" required /></td>
              <td><input type="text" name="course_name" id="course_name" placeholder="Nhập tên môn" class="formbold-form-input text-center" required />
              </td>
              <td><input type="date" name="exam_date" id="exam_date" placeholder="Nhập ngày thi" class="formbold-form-input text-center table-input" <?= old('exam_date') ?> required /></td>
              <td><input type="text" name="room" id="room" placeholder="Nhập phòng thi" class="formbold-form-input text-center table-input" <?= old('room') ?> required />
              </td>
              <td><input type="text" name="exam_mark" id="exam_mark" placeholder="Nhập điểm thi" class="formbold-form-input text-center table-input" <?= old('exam_mark') ?> required /></td>
            </tr>
          </tbody>
        </table>
        <button type="submit" class="btn btn-primary btn-login">Đăng ký</button>
      </form>
    </div>
  </div>
</div>