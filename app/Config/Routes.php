<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'User\HomeController::index');
$routes->get('error/404', function () {
    return view('error/html/error_404');
});

//Routes for User
$routes->group('user', ['filter' => 'userFilter'], static function ($routes) {

    $routes->group('register', static function ($routes) {
        $routes->get('index', 'User\FormController::index');
        $routes->get('list', 'User\FormController::list');
        $routes->get('add', 'User\FormController::add');
        $routes->post('create', 'User\FormController::create');
    });

    $routes->get('logout', 'User\LoginController::logout');
});

$routes->get('loginStudent', 'User\LoginController::index');
$routes->post('loginUser', 'User\LoginController::login');

$routes->get('login', 'Admin\LoginController::index');
$routes->post('loginAdmin', 'Admin\LoginController::login');

//Routes for Admin
$routes->group('admin', ['filter' => 'adminFilter'], static function ($routes) {

    $routes->get('home', 'Admin\HomeController::index');
    $routes->get('logout', 'Admin\LoginController::logout');

    // Group Register
    $routes->group('register', static function ($routes) {
        $routes->get('list', 'Admin\FormController::list');
        $routes->get('upload/(:num)', 'Admin\FormController::edit/$1');
        $routes->post('upload', 'Admin\FormController::upload');
        $routes->get('delete/(:num)', 'Admin\FormController::delete/$1');
    });

    // Group Archive
    $routes->group('archive', static function ($routes) {
        $routes->get('list', 'Admin\ArchiveController::list');
        $routes->get('upload/(:num)', 'Admin\ArchiveController::edit/$1');
        $routes->get('delete/(:num)', 'Admin\ArchiveController::delete/$1');
    });

    // Group User
    $routes->group('user', static function ($routes) {
        $routes->get('profile/(:num)', 'Admin\UserController::list/$1');
        $routes->post('update', 'Admin\UserController::updateAccount');
    });

    // Group Complete
    $routes->group('complete', static function ($routes) {
        $routes->get('list', 'Admin\CompleteController::list');
        $routes->get('delete/(:num)', 'Admin\CompleteController::delete/$1');
    });
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
