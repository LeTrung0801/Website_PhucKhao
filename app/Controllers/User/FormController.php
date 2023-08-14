<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\CourseModel;
use App\Models\FormModel;
use App\Models\SearchModel;
use App\Services\FormService;
use CodeIgniter\API\ResponseTrait;

class FormController extends BaseController
{
  use ResponseTrait;
  public $service, $course;
  public function __construct()
  {
    $this->service = new FormService();
    $this->course = new CourseModel();
  }

  public function index()
  {
    $data = [];
    $cssFile = [
      'https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css',
      'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css',
      // link edit css custom ==>
      base_url() . '/assets/admin/css/datatable.css',
    ];
    $jsFile = [
      'http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js',
      base_url() . '/assets/admin/js/datatable.js',
      base_url() . '/assets/admin/js/event.js',
    ];
    $data = $this->loadMasterLayout($data, 'Trang thông tin phúc khảo', 'user/pages/register/index', [], $cssFile, $jsFile);
    return view('user/home', $data);
  }
  public function list()
  {
    $data = [];
    $cssFile = [
      'https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css',
      'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css',
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
        $dataLayout['semester'] = $this->service->filterSemesterUser($semester);
      }
    }

    if (isset($_GET['search'])) {
      $search = $_GET['search'];
      if ($search != NULL) {
        $dataLayout['search'] = $this->service->search($search);
      }
    }

    $dataLayout['form'] = $this->service->getDataPaginateUser();
    $dataLayout['pager'] = $this->service->getPagerUser();
    $data = $this->loadMasterLayout($data, 'Danh sách đơn phúc khảo', 'user/pages/register/list', $dataLayout, $cssFile, $jsFile);
    return view('user/home', $data);
  }

  public function add()
  {
    $data = [];
    $cssFile = [
      'https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css',
      'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css',
      // link edit css custom ==>
      base_url() . '/assets/admin/css/datatable.css',
    ];
    $jsFile = [
      'http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js',
      base_url() . '/assets/admin/js/datatable.js',
      base_url() . '/assets/admin/js/event.js',
    ];
    $data = $this->loadMasterLayout($data, 'Đăng ký thông tin phúc khảo', 'user/pages/register/register', [], $cssFile, $jsFile);
    return view('user/home', $data);
  }
  public function create()
  {
    $result = $this->service->add($this->request);
    return redirect('user/register/add')->withInput()->with($result['messageCode'], $result['message']);
  }
}