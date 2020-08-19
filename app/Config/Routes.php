<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

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
$routes->setDefaultController('Users'); // Default Controller 
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

// Change Controller of Admin.php path "bengkel"
//$routes->add('dashboard', 'admin');
//$routes->add('register', 'bengkel/register');

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories

$routes->add('/', 'Users::login', ['filter' => 'noauth']);

$routes->group('users', function($routes)
{

    $routes->add('(:num)', 'Users::index/$1', ['filter' => 'auth']);
    $routes->add('users/login', 'Users::login', ['filter' => 'noauth']);
    $routes->get('users/logout', 'Users::logout', ['filter' => 'auth']);
    $routes->add('edit/(:num)', 'Users::edit/$1', ['filter' => 'getsession']);
    $routes->match(['get', 'post'], 'register', 'Users::register', ['filter' => 'noauth']);
    $routes->match(['get', 'post'],'login', 'Users::login', ['filter' => 'noauth']);
});

$routes->group('method', function($routes)
{
    $routes->get('/', 'Method::index', ['filter' => 'auth']);
    $routes->add('pcc_method', 'Method::pcc_method', ['filter' => 'auth']);
    $routes->add('find_matrix', 'Method::find_matrix', ['filter' => 'auth']);
    $routes->add('similarity', 'Method::similarity', ['filter' => 'getsession']);
    $routes->add('prediction/(:num)', 'Method::prediction/$1', ['filter' => 'getsession']);
});



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
