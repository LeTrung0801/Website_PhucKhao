<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\UserService;

class HomeController extends BaseController
{
    /**
     * @var Service
     */
    public $service;
    public function __construct()
    {
        $this->service = new UserService();
    }
    public function index()
    {
        $data = [];
        $dataLayout['user'] = $this->service->getAll();
        $data = $this->loadMasterLayoutAdmin($data, 'Trang chủ', 'admin/pages/home', $dataLayout);
        return view('admin/main', $data);
    }
}
