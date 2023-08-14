<?php

namespace App\Controllers\Admin;

use App\Common\ResultUtils;
use App\Controllers\BaseController;
use App\Services\LoginAdminService;

class LoginController extends BaseController
{
    /**
     * @var Service
     */

    private $service;

    public function __construct()
    {
        $this->service = new LoginAdminService();
    }

    /**
     * Load userList from DB
     */
    public function index()
    {
        if (session()->has('account_login')) {
            return redirect('admin/home');
        }
        return view('admin/pages/login');
    }

    public function login()
    {
        $result = $this->service->hasLoginInfo($this->request);
        if ($result['status'] === ResultUtils::STATUS_CODE_OK) {
            return redirect('admin/home');
        } elseif ($result['status'] === ResultUtils::STATUS_CODE_ERR) {
            return redirect('login')->with($result['messageCode'], $result['message']);
        } else {
            return redirect('home');
        }
    }

    public function logout()
    {
        $this->service->logoutAccount();
        return redirect('login');
    }
}
