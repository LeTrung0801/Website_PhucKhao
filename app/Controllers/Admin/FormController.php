<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FormModel;
use App\Services\FormService;

class FormController extends BaseController
{

  /**
   * @var Service
   */
  public $service;
  public function __construct()
  {
    $this->service = new FormService();
  }

  /**
   * Get list purchase from DB
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

    if (isset($_GET['semester'])) {
      $semester = $_GET['semester'];
      if ($semester != NULL) {
        $dataLayout['semester'] = $this->service->filterSemester($semester);
      }
    }

    if (isset($_GET['search'])) {
      $search = $_GET['search'];
      if ($search != NULL) {
        $dataLayout['search'] = $this->service->search($search);
      }
    }

    $dataLayout['form'] = $this->service->getDataPaginate();
    $dataLayout['pager'] = $this->service->getPager();
    $data = $this->loadMasterLayoutAdmin($data, 'Danh sách đơn phúc khảo', 'admin/pages/register/list', $dataLayout, $cssFile, $jsFile);
    return view('admin/main', $data);
  }

  /**
   * Edit info for Purchase
   */

  public function edit($id)
  {
    $form = $this->service->getById($id);

    if (!$form) {
      return redirect('error/404');
    }

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
    $dataLayout['form'] = $form;
    $data = $this->loadMasterLayoutAdmin($data, 'Cập nhật thông tin', 'admin/pages/register/edit', $dataLayout, $cssFile, $jsFile);
    return view('admin/main', $data);
  }

  public function upload()
  {
    $result = $this->service->upload($this->request);
    return redirect()->back()->withInput()->with($result['messageCode'], $result['message']);
  }

  public function delete($id)
  {
    $form = $this->service->getById($id);

    if (!$form) {
      return redirect('error/404');
    }

    $result = $this->service->delete($id);
    return redirect('admin/register/list')->with($result['messageCode'], $result['message']);
  }
}