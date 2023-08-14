<?php

namespace App\Controllers\User;

use App\Common\ResultUtils;
use App\Services\LoginService;
use App\Controllers\BaseController;

class LoginController extends BaseController
{
    /**
     * @var Service
     */

    private $service;

    public function __construct()
    {
        $this->service = new LoginService();
    }

    /**
     * Load userList from DB
     */
    public function index()
    {
        if (session()->has('user_login')) {
            return redirect()->to('user/register/add');
        }
        return view('user/login');
    }

    public function login()
    {
        $result = $this->service->hasLoginInfo($this->request);
        if ($result['status'] === ResultUtils::STATUS_CODE_OK) {
            return redirect('user/register/index');
        } elseif ($result['status'] === ResultUtils::STATUS_CODE_ERR) {
            return redirect('loginStudent')->with($result['messageCode'], $result['message']);
        } else {
            return redirect('home');
        }
    }

    public function logout()
    {
        $this->service->logoutUser();
        return redirect('loginStudent');
    }
}
