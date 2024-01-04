<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->get('api/task/(:num)', 'Api::obtenerTarea/$1');
$routes->group('api', function ($routes) {
    $routes->get('task', 'Api::obtenerTareas');
    $routes->post('task', 'Api::crearTarea');
    $routes->put('task/(:num)', 'Api::actualizarTarea/$1');
    $routes->delete('task/(:num)', 'Api::eliminarTarea/$1');
});