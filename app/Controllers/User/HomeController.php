<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
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

        $data = $this->loadMasterLayout($data, 'Trang chủ', 'user/pages/register/main', [], $cssFile, $jsFile);
        return view('user/home', $data);
    }
}
