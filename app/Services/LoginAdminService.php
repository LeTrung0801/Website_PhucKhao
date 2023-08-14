<?php

namespace App\Services;

use App\Common\ResultUtils;
use App\Models\AccountModel;

class LoginAdminService extends BaseService
{

  private $account;
  // Contrustor
  function __construct()
  {
    parent::__construct();
    $this->account = new AccountModel();
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
    $account = $this->account->where('email', $param['email'])->first();
    if (!$account) {
      return [
        'status' => ResultUtils::STATUS_CODE_ERR,
        'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
        'message' => [
          'notExist' => 'Không tìm thấy account !!!',
        ]
      ];
    }

    if (!password_verify($param['password'], $account['password'])) {
      return [
        'status' => ResultUtils::STATUS_CODE_ERR,
        'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
        'message' => [
          'errPass' => 'Mật khẩu không đúng !!!',
        ]
      ];
    }

    $session = session();
    unset($account['password']);

    $session->set('account_login', $account);
    return [
      'status' => ResultUtils::STATUS_CODE_OK,
      'messageCode' => ResultUtils::MESSAGE_CODE_OK,
      'message' => null
    ];
  }

  public function validateLogin($requset)
  {
    $rule = [
      'email' => 'valid_email',
      'password' => 'max_length[30]|min_length[6]',
    ];
    $messages = [
      'email' => [
        'valid_email' => 'Tài khoản {field} {value} không đúng định dạng !!!',
      ],
      'password' => [
        'max_length' => 'Mật khẩu quá dài vui lòng nhập từ {param} ký tự !!!',
        'min_length' => 'Mật khẩu quá ngắn vui lòng nhập từ {param} ký tự !!!',
      ],
    ];
    $this->validation->setRules($rule, $messages);
    $this->validation->withRequest($requset)->run();

    return $this->validation;
  }

  public function logoutAccount()
  {
    $session = session();
    $session->destroy();
  }
}
