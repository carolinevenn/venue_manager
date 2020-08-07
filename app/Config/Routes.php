<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('contracts/(:num)', 'Contracts::view/$1');
$routes->match(['get', 'post'],'contracts/(:any)', 'Contracts::$1');
$routes->match(['get', 'post'],'contracts', 'Contracts::index');
$routes->get('customers/(:num)', 'Customers::view/$1');
$routes->match(['get', 'post'],'customers/(:any)', 'Customers::$1');
$routes->match(['get', 'post'],'customers', 'Customers::index');
$routes->post('calendar/(:any)', 'Calendar::$1');
$routes->match(['get', 'post'],'events/(:any)', 'Events::$1');
$routes->match(['get', 'post'],'invoices/(:any)', 'Invoices::$1');
$routes->get('rooms/(:num)', 'Rooms::view/$1');
$routes->match(['get', 'post'],'rooms/(:any)', 'Rooms::$1');
$routes->get('staff/(:num)', 'Staff::view/$1', ['filter' => 'staff']);
$routes->match(['get', 'post'],'staff/password/(:any)', 'Staff::password/$1');
$routes->match(['get', 'post'],'staff/(:any)', 'Staff::$1', ['filter' => 'staff']);
$routes->match(['get', 'post'],'venue/(:any)', 'Venue::$1');
$routes->get('venue', 'Venue::index');
$routes->match(['get', 'post'],'login', 'Users::login');
$routes->match(['get', 'post'],'logout', 'Users::logout');
$routes->get('/', 'Pages::view');
$routes->get('(:any)', 'Pages::view/$1');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
