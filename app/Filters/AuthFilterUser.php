<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilterUser implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    $session = session();

    if (!$session->get('user_login')) {
      if (current_url() === base_url() . 'loginStudent') {
        return view('user/login');
      }
      return redirect('loginStudent');
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}
