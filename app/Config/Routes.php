<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/inicio', 'Home::inicio');
//ruta que muestra el formulario para registrar usuario
$routes->get('/registro', 'Home::registro');
//ruta que hace el registritar usuario
$routes->post('/registrar', 'Home::registrarUsuario');
//ruta para login
$routes->post('/login', 'Home::login');
//ruta para el logout
$routes->get('/salir', 'Home::salir');
//ruta para crear pelicula
$routes->post('/crear', 'Home::crearPelicula');
//ruta para actualizar pelicula
$routes->post('/actualizar', 'Home::actualizarPelicula');
//ruta para traer datos para actualizar
$routes->get('/obtenerPeli/(:any)', 'Home::mostrarPelicula/$1');
//ruta para elimianr pelicula
$routes->get('/eliminarPeli/(:any)', 'Home::eliminarPelicula/$1');
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
