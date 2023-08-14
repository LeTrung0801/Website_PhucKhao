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
        <li class="breadcrumb-item active">Đơn lưu trữ</li>
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
          <h4 class="card-title">Danh sách đơn phúc khảo</h4>
          <div class="d-flex mb-4 no-block " style="float: right;">
            <h5 class="card-title mb-0 align-self-center">Học kỳ :</h5>
            <div class="ms-auto">
              <form method="get" action="admin/register/list" class="d-flex">
                <select class="form-select b-0" name="semester">
                  <option value="" selected>Học kỳ</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                </select>
                <input type="submit" class="btn btn-outline-secondary" value="Lọc">
              </form>
            </div>
          </div>
          <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->
          <div class="table-responsive" id="table-responsive">
            <?= view('messages/message') ?>
            <table class="table" id="table">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>MSSV</th>
                  <th>Họ tên sinh viên</th>
                  <th>Mã môn</th>
                  <th>Tên môn</th>
                  <th>Phòng thi</th>
                  <th>Ngày thi</th>
                  <th>Học kỳ</th>
                  <th>Trạng thái đơn</th>
                  <th>Chức năng</th>
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
                      <td>
                        <div class="button">
                          <a href="admin/archive/upload/<?= $result['id'] ?>">
                            <button type="button" class="btn btn-warning btn-reset-archive ">
                              <i class="fa-regular fa-pen-to-square"></i>

                            </button>
                          </a>
                          <button type="button" class="btn btn-danger btn-delete-form ms-1">
                            <i class="fa-solid fa-trash-can"></i>
                          </button>
                        </div>
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
                      <td>
                        <div class="button">
                          <a href="admin/archive/upload/<?= $rs['id'] ?>">
                            <button type="button" class="btn btn-warning btn-reset-archive">
                              <i class="fa-regular fa-pen-to-square"></i>

                            </button>
                          </a>
                          <button type="button" class="btn btn-danger btn-delete-form ms-1">
                            <i class="fa-solid fa-trash-can"></i>
                          </button>
                        </div>
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
                      <td>
                        <div class="button">
                          <a href="admin/archive/upload/<?= $result['id'] ?>">
                            <button type="button" class="btn btn-warning btn-reset-archive">
                              <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                          </a>
                          <a href="admin/archive/delete/<?= $result['id'] ?>">
                            <button type="button" class="btn btn-danger btn-delete-form ms-1">
                              <i class="fa-solid fa-trash-can"></i>
                            </button>
                          </a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach ?>
                <?php endif ?>
              </tbody>
            </table>
          </div>

          <div class="row">
            <?= $pager->links('default', 'custom_pagination'); ?>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".table tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
  <!-- ============================================================== -->
  <!-- End PAge Content -->
  <!-- ============================================================== -->
</div>