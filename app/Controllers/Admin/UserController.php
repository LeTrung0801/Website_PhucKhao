<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Services\UserService;

class UserController extends BaseController
{
    /**
     * @var Service
     */

    private $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

    /**
     * Load userList from DB
     */
    public function list()
    {
        $data = [];
        $cssFile = [
            'https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css',
            // link edit css custom ==>
            base_url() . '/assets/admin/css/datatable.css',
        ];
        $jsFile = [
            'http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js',
            base_url() . '/assets/admin/js/datatable.js',
            base_url() . '/assets/admin/js/event.js',

        ];
        // $dataLayout['user'] = $this->service->getUserById();
        $data = $this->loadMasterLayoutAdmin($data, 'Thông tin tài khoản', 'admin/pages/user/profile', [], $cssFile, $jsFile);
        return view('admin/main', $data);
    }

    /**
     * Update User info
     */
    public function updateAccount()
    {
        $result = $this->service->updateAccountInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['message']);
    }

    /**
     * Controller delete User by ID
     */
    public function deleteUser($id)
    {
        $user = $this->service->getUserById($id);

        if (!$user) {
            return redirect('error/404');
        }

        $result = $this->service->deleteUser($id);
        return redirect('admin/user/list')->with($result['messageCode'], $result['message']);
    }
}
