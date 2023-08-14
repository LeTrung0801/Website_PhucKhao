<?php

namespace App\Services;

use App\Common\ResultUtils;
use App\Models\FormModel;
use Exception;

class FormService extends BaseService
{

  private $form;
  // Contrustor
  function __construct()
  {
    parent::__construct();
    $this->form = new FormModel();
    $this->form->protect(false);
  }

  //Get all Purchase from DB
  public function getAll()
  {
    return $this->form->findAll();
  }

  public function add($requset)
  {
    $validate = $this->validateForm($requset);
    if ($validate->getErrors()) {
      return [
        'status' => ResultUtils::STATUS_CODE_ERR,
        'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
        'message' => $validate->getErrors()
      ];
    }

    $dataSave = $requset->getPost();

    try {
      $this->form->save($dataSave);
      return [
        'status' => ResultUtils::STATUS_CODE_OK,
        'messageCode' => ResultUtils::MESSAGE_CODE_OK,
        'message' => ['success' => 'Thêm dữ liệu thành công']
      ];
    } catch (Exception $e) {
      return [
        'status' => ResultUtils::STATUS_CODE_ERR,
        'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
        'message' => ['fail' => $e->getMessage()]
      ];
    }
  }

  private function validateForm($requset)
  {
    $rule = [
      //Element for User
      'user_id' => 'max_length[50]',
      'user_fullname' => 'max_length[50]',
      'user_birthday' => 'max_length[50]',
      'user_class' => 'max_length[50]',
      'email' => 'valid_email|max_length[50]',
      'user_phone' => 'max_length[10]|min_length[10]',

      //Element for Course
      'course_id' => 'max_length[200]',
      'course_name' => 'max_length[200]',

      //Element for Room
      'room' => 'max_length[10]',

      //Element for Exam
      'exam_date' => 'max_length[255]',
      'exam_mark' => 'max_length[10]',

      //Element for Semester
      'semester' => 'max_length[50]',
      'year' => 'max_length[255]',
    ];

    $messages = [
      'email' => [
        'max_length' => 'SL mail quá dài, vui lòng nhập tử {param} ký tự !!!'
      ],
      'user_phone' => [
        'max_length' => 'Số điện thoại quá dài, vui lòng nhập {param} ký tự !!!',
        'min_length' => 'Số điện thoại quá ngắn, vui lòng nhập {param} ký tự !!!'
      ],
    ];
    $this->validation->setRules($rule, $messages);
    $this->validation->withRequest($requset)->run();

    return $this->validation;
  }


  //getPurchaseById
  public function getById($id)
  {
    return $this->form->where('id', $id)->first();
  }

  public function upload($param)
  {
    $validate = $this->validateForm($param);

    if ($validate->getErrors()) {
      return [
        'status' => ResultUtils::STATUS_CODE_ERR,
        'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
        'message' => $validate->getErrors()
      ];
    }

    $dataSave = $param->getPost();

    try {
      $this->form->save($dataSave);

      return [
        'status' => ResultUtils::STATUS_CODE_OK,
        'messageCode' => ResultUtils::MESSAGE_CODE_OK,
        'message' => ['success' => 'Cập nhật dữ liệu thành công']
      ];
    } catch (Exception $e) {
      return [
        'status' => ResultUtils::STATUS_CODE_ERR,
        'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
        'message' => ['fail' => $e->getMessage()]
      ];
    }
  }

  public function getDataPaginate()
  {
    return $this->form->where('flag', 0)
      ->orderBy('id', 'DESC')->paginate(5);
  }

  public function getPager()
  {
    return $this->form->pager;
  }
  // -----------------------------
  public function getDataPaginateUser()
  {
    $id = session()->get('user_login')['user_id'];
    return $this->form->where('user_id', $id)
      ->orderBy('user_id', 'DESC')->paginate(5);
  }

  public function getPagerUser()
  {
    return $this->form->pager;
  }

  public function getDataPaginateArchive()
  {
    return $this->form->where('flag', 1)
      ->orderBy('id', 'DESC')->paginate(5);
  }

  public function getDataPaginateComplete()
  {
    return $this->form->where('flag', 2)
      ->orderBy('id', 'DESC')->paginate(5);
  }

  public function getPagerArchive()
  {
    return $this->form->pager;
  }
  public function getPagerComplete()
  {
    return $this->form->pager;
  }

  public function search($data)
  {
    return $this->form->like('user_id', $data)
      ->orLike('user_class', $data)
      ->orLike('user_phone', $data)
      ->orLike('email', $data)
      ->orLike('course_id', $data)
      ->orLike('course_name', $data)
      ->orLike('room', $data)
      ->orLike('room', $data)
      ->orLike('semester', $data)
      ->orLike('year', $data)->find();
  }

  public function filterSemester($semester)
  {
    return $this->form->where('semester', $semester)->find();
  }

  public function filterSemesterComplete($semester)
  {
    $query = ['semester' => $semester, 'flag' => 2];
    return $this->form->where($query)->find();
  }
  public function filterSemesterArchive($semester)
  {
    $query = ['semester' => $semester, 'flag' => 1];
    return $this->form->where($query)->find();
  }
  public function filterSemesterUser($semester)
  {
    if (isset($_SESSION['user_login'])) {
      return $this->form->where('user_id', $_SESSION['user_login']['user_id'])
        ->where('semester', $semester)->find();
    }
    return $this->form->where('semester', $semester)->find();
  }

  public function delete($id)
  {
    try {
      $this->form->set('flag', 1)->where('id', $id)->update();
      return [
        'status' => ResultUtils::STATUS_CODE_OK,
        'messageCode' => ResultUtils::MESSAGE_CODE_OK,
        'message' => ['success' => 'Xoá dữ liệu thành công']
      ];
    } catch (Exception $e) {
      return [
        'status' => ResultUtils::STATUS_CODE_ERR,
        'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
        'message' => ['fail' => $e->getMessage()]
      ];
    }
  }

  /*
  Archive Service
  */

  public function deleteArchive($id)
  {
    try {
      $this->form->delete($id);
      return [
        'status' => ResultUtils::STATUS_CODE_OK,
        'messageCode' => ResultUtils::MESSAGE_CODE_OK,
        'message' => ['success' => 'Xoá dữ liệu thành công']
      ];
    } catch (Exception $e) {
      return [
        'status' => ResultUtils::STATUS_CODE_ERR,
        'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
        'message' => ['fail' => $e->getMessage()]
      ];
    }
  }

  public function updateArchive($id)
  {
    try {
      $this->form->set('flag', 0)->where('id', $id)->update();
      return [
        'status' => ResultUtils::STATUS_CODE_OK,
        'messageCode' => ResultUtils::MESSAGE_CODE_OK,
        'message' => ['success' => 'Khôi phục dữ liệu thành công']
      ];
    } catch (Exception $e) {
      return [
        'status' => ResultUtils::STATUS_CODE_ERR,
        'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
        'message' => ['fail' => $e->getMessage()]
      ];
    }
  }
}
