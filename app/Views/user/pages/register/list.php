<div class="main-wrapper container">
  <!-- Title -->
  <div class="main-header">
    <div class="main-header__title">
      <h3>Trang đăng ký thông tin phúc khảo</h3>
    </div>
    <div class="main-header__name ">
      <h6>Xin chào, <span class="text-success"><?= session()->get('user_login')['user_fullname'] ?> </span></h6>

    </div>
    <div class="main-header__name mt-3 ">
      <a href="user/register/add"> <span class=" text-dark text-uppercase">Đăng ký đơn phúc khảo</span></a>
    </div>
    <div class="main-header__name mt-3 ">
      <a href="user/logout">
        <button type="button" class="btn btn-danger">Đăng xuất</button>
      </a>
    </div>
  </div>

  <div class="row mt-3">
    <!-- column -->
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Danh sách đơn phúc khảo</h4>
          <form method="get" action="user/register/list" class="d-flex">
            <select class="form-select b-0" name="semester">
              <option value="" selected>Học kỳ</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
            <input type="submit" class="btn btn-outline-primary" value="Lọc">
          </form>
        </div>
      </div>
      <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->
      <div class="table-responsive" id="table-responsive">
        <?= view('messages/message') ?>
        <table class="table table-bordered" id="table">
          <thead>
            <tr>
              <th>STT</th>
              <th>MSSV</th>
              <th>Họ tên sinh viên</th>
              <th>Mã môn</th>
              <th>Tên môn</th>
              <th>Phòng thi</th>
              <th>Điểm thi</th>
              <th>Ngày thi</th>
              <th>Học kỳ</th>
              <th>Trạng thái đơn</th>
            </tr>
          </thead>
          <tbody>
            <?php if (isset($search)) : ?>
              <?php $stt = 1 ?>
              <?php foreach ($search as $result) : ?>
                <tr>
                  <td><?= $stt++ ?></td>
                  <td><?= $result['user_id'] ?></td>
                  <td><?= $result['user_fullname'] ?></td>
                  <td><?= $result['course_id'] ?></td>
                  <td><?= $result['course_name'] ?></td>
                  <td><?= $result['room'] ?></td>
                  <td><?= $result['exam_mark'] ?></td>
                  <td><?= $result['exam_date'] ?></td>
                  <td><?= $result['semester'] ?></td>
                  <td>
                    <?php
                    if ($result['flag'] == 0) {
                      echo '<span class="text-warning">Đang chờ xử lý</span>';
                    } elseif ($result['flag'] == 1) {
                      echo '<span class="text-danger">Đơn bị hủy</span>';
                    } else {
                      echo '<span class="text-success">Đã xử lý hoàn tất</span>';
                    }
                    ?>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php elseif (isset($semester)) : ?>
              <?php $stt = 1 ?>
              <?php foreach ($semester as $result) : ?>
                <tr>
                  <td><?= $stt++ ?></td>
                  <td><?= $result['user_id'] ?></td>
                  <td><?= $result['user_fullname'] ?></td>
                  <td><?= $result['course_id'] ?></td>
                  <td><?= $result['course_name'] ?></td>
                  <td><?= $result['room'] ?></td>
                  <td><?= $result['exam_mark'] ?></td>
                  <td><?= $result['exam_date'] ?></td>
                  <td><?= $result['semester'] ?></td>
                  <td>
                    <?php
                    if ($result['flag'] == 0) {
                      echo '<span class="text-warning">Đang chờ xử lý</span>';
                    } elseif ($result['flag'] == 1) {
                      echo '<span class="text-danger">Đơn bị hủy</span>';
                    } else {
                      echo '<span class="text-success">Đã xử lý hoàn tất</span>';
                    }
                    ?>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php else : ?>
              <?php $stt = 1 ?>
              <?php foreach ($form as $result) : ?>
                <tr>
                  <td><?= $stt++ ?></td>
                  <td><?= $result['user_id'] ?></td>
                  <td><?= $result['user_fullname'] ?></td>
                  <td><?= $result['course_id'] ?></td>
                  <td><?= $result['course_name'] ?></td>
                  <td><?= $result['room'] ?></td>
                  <td><?= $result['exam_mark'] ?></td>
                  <td><?= $result['exam_date'] ?></td>
                  <td><?= $result['semester'] ?></td>
                  <td>
                    <?php
                    if ($result['flag'] == 0) {
                      echo '<span class="text-warning">Đang chờ xử lý</span>';
                    } elseif ($result['flag'] == 1) {
                      echo '<span class="text-danger">Đơn bị hủy</span>';
                    } else {
                      echo '<span class="text-success">Đã xử lý hoàn tất</span>';
                    }
                    ?>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php endif ?>
          </tbody>
        </table>
      </div>

      <div class="row">
        <?= $pager->links('default', 'user_pagination'); ?>
      </div>

    </div>
  </div>
</div>
</div>

</div>