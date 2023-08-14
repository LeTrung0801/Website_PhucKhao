<?php

namespace App\Services;

use App\Common\ResultUtils;
use App\Models\UserModel;

class LoginService extends BaseService
{

  private $users;
  // Contrustor
  function __construct()
  {
    parent::__construct();
    $this->users = new UserModel();
  }

  public function hasLoginInfo($request)
  {
    $validate = $this->validateLogin($request);
    if ($validate->getErrors()) {
      return [
        'status' => ResultUtils::STATUS_CODE_ERR,
        'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
        'message' => $validate->getErrors()
      ];
    }

    $param = $request->getPost();
    $user = $this->users->where('user_id', $param['user_id'])->first();
    if (!$user) {
      return [
        'status' => ResultUtils::STATUS_CODE_ERR,
        'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
        'message' => [
          'notExist' => 'Không tìm thấy MSSV !!!',
        ]
      ];
    }

    if (!password_verify($param['password'], $user['password'])) {
      return [
        'status' => ResultUtils::STATUS_CODE_ERR,
        'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
        'message' => [
          'errPass' => 'Mật khẩu không đúng !!!',
        ]
      ];
    }

    $session = session();
    unset($user['password']);

    $session->set('user_login', $user);
    return [
      'status' => ResultUtils::STATUS_CODE_OK,
      'messageCode' => ResultUtils::MESSAGE_CODE_OK,
      'message' => null
    ];
  }

  public function validateLogin($requset)
  {
    $rule = [
      // 'email' => 'valid_email',
      'password' => 'max_length[30]|min_length[6]',
    ];
    $messages = [
      // 'email' => [
      //   'valid_email' => 'Tài khoản {field} {value} không đúng định dạng !!!',
      // ],
      'password' => [
        'max_length' => 'Mật khẩu quá dài vui lòng nhập từ {param} ký tự !!!',
        'min_length' => 'Mật khẩu quá ngắn vui lòng nhập từ {param} ký tự !!!',
      ],
    ];
    $this->validation->setRules($rule, $messages);
    $this->validation->withRequest($requset)->run();

    return $this->validation;
  }

  public function logoutUser()
  {
    $session = session();
    $session->destroy();
  }
}
