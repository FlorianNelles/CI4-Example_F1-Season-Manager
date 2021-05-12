<?php

namespace Config;

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
$routes->setDefaultMethod('view');
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
$routes->get('/', 'Pages::view');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

$routes->add('languages/german', 'languages::german');
$routes->add('languages/english', 'languages::english');

$routes->add('users/register', 'users::register');
$routes->add('users/logout', 'users::logout');
$routes->add('users/login', 'users::login');

$routes->add('posts/edit/(:any)', 'posts::edit/$1');
$routes->add('posts/delete/(:any)', 'posts::delete/$1');
$routes->add('posts/create', 'posts::create');
$routes->add('posts/(:any)', 'posts::view/$1');
$routes->add('posts', 'posts::index');

$routes->add('teams/edit/(:any)', 'teams::edit/$1');
$routes->add('teams/delete/(:any)', 'teams::delete/$1');
$routes->add('teams/create', 'teams::create');
$routes->add('teams', 'teams::index');
$routes->add('teams/(:any)', 'teams::view/$1');

$routes->add('drivers/edit/(:any)', 'drivers::edit/$1');
$routes->add('drivers/delete/(:any)', 'drivers::delete/$1');
$routes->add('drivers/create', 'drivers::create');
$routes->add('drivers', 'drivers::index');
$routes->add('drivers/(:any)', 'drivers::view/$1');

$routes->add('tests/index', 'tests::index');
$routes->add('tests', 'tests::index');

$routes->add('(:any)', 'pages::view/$1');