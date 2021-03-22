<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'User::index');
$routes->get('/admin', 'Admin::index', ['filter' => 'role:guru']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:guru']);

$routes->get('/coba/index', 'Coba::index');
$routes->get('/coba/coba', 'Coba::coba');
$routes->get('/coba/about', 'Coba::about');

$routes->get('/blog', 'Admin\Blog::index');

#any karakter apapun
#num khusus angka
#segment apapun kecuali /
#alfa hanya alfabet
#alfanum hanya angka dan huruf karakter tidak bisa
$routes->get('/coba/(:any)/(:num)', 'Coba::about/$1/$2');

$routes->get('/baru', function () {
	echo "halooo fungsi baruuu";
});

$routes->resource('users'); //menyingkat url - url buat API

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
