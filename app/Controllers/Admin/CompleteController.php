<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\FormService;

class CompleteController extends BaseController
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
        $dataLayout['semester'] = $this->service->filterSemesterComplete($semester);
      }
    }

    $dataLayout['form'] = $this->service->getDataPaginateComplete();
    $dataLayout['pager'] = $this->service->getPagerComplete();
    $data = $this->loadMasterLayoutAdmin($data, 'Danh sách đơn phúc khảo', 'admin/pages/register/listComplete', $dataLayout, $cssFile, $jsFile);
    return view('admin/main', $data);
  }

  public function delete($id)
  {
    $form = $this->service->getById($id);

    if (!$form) {
      return redirect('error/404');
    }

    $result = $this->service->deleteArchive($id);
    return redirect('admin/complete/list')->with($result['messageCode'], $result['message']);
  }
}