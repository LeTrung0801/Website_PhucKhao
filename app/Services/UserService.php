<?php

namespace App\Services;

use App\Common\ResultUtils;
use App\Models\AccountModel;
use App\Models\UserModel;
use Exception;

class UserService extends BaseService
{

  private $users, $account;
  // Contrustor
  function __construct()
  {
    parent::__construct();
    $this->users = new UserModel();
    $this->users->protect(false);

    $this->account = new AccountModel();
    $this->account->protect(false);
  }

  //Get all User from DB
  public function getAll()
  {
    return $this->users->findAll();
  }

  //Add new User Info
  public function addUserInfo($requset)
  {
    $validate = $this->validateAddUser($requset);

    if ($validate->getErrors()) {
      return [
        'status' => ResultUtils::STATUS_CODE_ERR,
        'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
        'message' => $validate->getErrors()
      ];
    }

    $dataSave = $requset->getPost();
    unset($dataSave['password_confirm']);
    $dataSave['password'] = password_hash($dataSave['password'], PASSWORD_BCRYPT);
    if ($this->users->save($dataSave)) {
      session()->setFlashdata('msg', 'Thêm dữ liệu thành công');
      session()->setFlashdata('msg_class', 'alert-succes');
    } else {
      session()->setFlashdata('msg', 'Thêm dữ liệu không thành công');
      session()->setFlashdata('msg_class', 'alert-danger');
    }
    // try {
    //   $this->users->save($dataSave);
    //   return [
    //     'status' => ResultUtils::STATUS_CODE_OK,
    //     'messageCode' => ResultUtils::MESSAGE_CODE_OK,
    //     'message' => ['success' => 'Thêm dữ liệu thành công']
    //   ];
    // } catch (Exception $e) {
    //   return [
    //     'status' => ResultUtils::STATUS_CODE_ERR,
    //     'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
    //     'message' => ['fail' => $e->getMessage()]
    //   ];
    // }
  }

  /**
   * Check value for AddUser
   */
  private function validateAddUser($requset)
  {
    $rule = [
      'email' => 'valid_email|is_unique[user.email]',
      'name' => 'max_length[100]',
      'password' => 'max_length[30]|min_length[6]',
      'password_confirm' => 'matches[password]'
    ];
    $messages = [
      'email' => [
        'valid_email' => 'Tài khoản {field} {value} không đúng định dạng !!!',
        'is_unique' => 'Email đã tồn tại !!!'
      ],
      'name' => [
        'max_length' => 'Vui lòng chọn tên ngắn hơn {param} !!!',
      ],
      'password' => [
        'max_length' => 'Vui lòng nhập mật khẩu ngắn hơn {param} !!!',
        'min_length' => 'Vui lòng nhập mật khẩu ít nhất {param} !!!',
      ],
      'password_confirm' => [
        'matches' => 'Mật khẩu không khớp, vui lòng nhập lại !!!'
      ]
    ];
    $this->validation->setRules($rule, $messages);
    $this->validation->withRequest($requset)->run();

    return $this->validation;
  }

  /**
   * Get user by id
   */
  public function getUserById($idUser)
  {
    return $this->users->where('id', $idUser)->first();
  }



  /**
   * Update info user to DB
   */
  public function updateAccountInfo($param)
  {
    $validate = $this->validateEditAccount($param);

    if ($validate->getErrors()) {
      return [
        'status' => ResultUtils::STATUS_CODE_ERR,
        'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
        'message' => $validate->getErrors()
      ];
    }

    $dataSave = $param->getPost();

    if (!empty($dataSave['change_password'])) {
      unset($dataSave['change_password']);
      unset($dataSave['password_confirm']);
      $dataSave['password'] = password_hash($dataSave['password'], PASSWORD_BCRYPT);
    } else {
      unset($dataSave['password']);
      unset($dataSave['password_confirm']);
    }

    try {
      $this->account->save($dataSave);
      return [
        'status' => ResultUtils::STATUS_CODE_OK,
        'messageCode' => ResultUtils::MESSAGE_CODE_OK,
        'message' => ['success' => 'Chỉnh sửa thông tin thành công']
      ];
    } catch (Exception $e) {
      return [
        'status' => ResultUtils::STATUS_CODE_ERR,
        'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
        'message' => ['fail' => $e->getMessage()]
      ];
    }
  }

  /**
   * Check value for editUser
   */
  private function validateEditAccount($requset)
  {
    $rule = [
      'email' => 'valid_email|is_unique[account.email,id,' . $requset->getPost()['id'] . ']',
      'name' => 'max_length[100]',
    ];
    $messages = [
      'email' => [
        'valid_email' => 'Tài khoản {field} {value} không đúng định dạng !!!',
        'is_unique' => 'Email đã tồn tại !!!'
      ],
      'name' => [
        'max_length' => 'Vui lòng chọn tên ngắn hơn {param} !!!',
      ],
    ];

    if (!empty($requset->getPost()['change_password'])) {
      $rule['password'] = 'max_length[30]|min_length[6]';
      $rule['password_confirm'] = 'matches[password]';
      $messages['password'] = [
        'max_length' => 'Vui lòng nhập mật khẩu ngắn hơn {param} !!!',
        'min_length' => 'Vui lòng nhập mật khẩu ít nhất {param} !!!',
      ];
      $messages['password_confirm'] = [
        'matches' => 'Mật khẩu không khớp, vui lòng nhập lại !!!'
      ];
    }

    $this->validation->setRules($rule, $messages);
    $this->validation->withRequest($requset)->run();

    return $this->validation;
  }

  /**
   * Delete User by ID
   */
  public function deleteUser($id)
  {
    try {
      $this->users->delete($id);
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
}
