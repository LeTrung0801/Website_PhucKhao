$("#change_password").change(function () {
  let status = !$(this).is(":checked");
  showChangePass(status);
});

$("#btn-reset-edit-user").click(function () {
  showChangePass(true);
});

function showChangePass(status) {
  $("#password").attr("readonly", status);
  $("#password-confirm").attr("readonly", status);

  $("#password").val("");
  $("#password-confirm").val("");
}

$(".btn-del-confirm").click(function () {
  let url = $(this).data("url");
  if (!confirm("Bạn có chắc chắn muốn xoá không !!!")) {
    return;
  }

  window.location.href = url;
});

$("#btn-reset-edit-purchase").click(function () {
  $("form-control").val("");
});

// ===============================

$("#gridCheck").change(function () {
  let status = !$(this).is(":checked");
  showChange(status);
});

function showChange(status) {
  $("#exam_mark").attr("readonly", status);
  $("#exam_mark").val("");
}

$(".btn-update-form").click(function () {
  let url = $(this).data("url");
  if (!confirm("Bạn có chắc chắn muốn cập nhật không !!!")) {
    return;
  }

  window.location.href = url;
});

// -------------------------------------

$(".btn-archive").click(function () {
  let url = $(this).data("url");
  if (!confirm("Bạn có chắc chắn muốn lưu trữ đơn không !!!")) {
    return;
  }

  window.location.href = url;
});

// -------------------------------------

$(".btn-delete-form").click(function () {
  let url = $(this).data("url");
  if (!confirm("Bạn có chắc chắn muốn xóa vĩnh viễn không !!!")) {
    return;
  }

  window.location.href = url;
});

// -------------------------------------

$(".btn-reset-archive").click(function () {
  let url = $(this).data("url");
  if (!confirm("Bạn có chắc chắn muốn khôi phục đơn không !!!")) {
    return;
  }

  window.location.href = url;
});
