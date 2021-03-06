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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// FRONTEND
$routes->get('/', 'Frontend\Home::index');

// BACKEND
$routes->get('/admin', 'Backend\Dashboard::index');
// BACKEND - KATEGORI
$routes->get('/admin/kategori', 'Backend\Kategori::index');
$routes->get('/admin/kategori/create', 'Backend\Kategori::create');
$routes->post('/admin/kategori/create', 'Backend\Kategori::create');

// BACKEND - ARTIKEL
$routes->get('/admin/artikel/(:alpha)', 'Backend\Artikel::index/$1');
$routes->get('/admin/artikel/create/(:alpha)', 'Backend\Artikel::create/$1');
$routes->post('/admin/artikel/create', 'Backend\Artikel::store');

// Delete Benda
$routes->delete('/benda/(:num)', 'Benda::delete/$1');

// Delete Bangunan
$routes->delete('/bangunan/(:num)', 'Bangunan::delete/$1');

// Delete Struktur
$routes->delete('/struktur/(:num)', 'Struktur::delete/$1');

// Delete Struktur
$routes->delete('/situs/(:num)', 'Situs::delete/$1');

// Delete Kawasan
$routes->delete('/kawasan/(:num)', 'Kawasan::delete/$1');




/**
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
