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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
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

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


$routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);


// Admin routes
$routes->group("admin", ["filter" => "auth"], function ($routes) {
    
    $routes->get('/', 'Admin\AdminController::index');

    // $routes->get('userinfo', 'admin\UsuariosController::index');
    // $routes->get('userinfo/new', 'admin\UsuariosController::new');
    $routes->resource('usuarios', ['controller' => 'Admin\UsuariosController']);

    
    $routes->get('perfil', 'Admin\AdminController::perfil');

    // Ruta para testear creación de pdf
    $routes->get('tickets/pdf', 'Admin\TicketController::generarPDF');
    $routes->get('tickets/misTickets', 'Admin\TicketController::misTickets');


    $routes->resource('tickets', ['controller' => 'Admin\TicketController']);

    /*
    $routes->get('tickets', 'admin\TicketController::index');
    $routes->get('tickets/new', 'admin\TicketController::new');
    $routes->post('tickets', 'admin\TicketController::create');
    $routes->get('tickets/(:num)', 'admin\TicketController::show/$1');
    $routes->get('tickets/edit/(:num)', 'admin\TicketController::edit/$1');
    $routes->put('tickets/(:num)', 'admin\TicketController::update/$1');
    $routes->delete('tickets/(:num)', 'admin\TicketController::delete/$1');
    */

});


// Editor routes
$routes->group("usuario", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "Usuario\UsuarioController::index");
    $routes->get("perfil", "Usuario\UsuarioController::perfil");
    $routes->resource('tickets', ['controller' => 'Usuario\TicketController']);
});


$routes->get('logout', 'UserController::logout');



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
