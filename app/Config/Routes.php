<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->resource('event');
$routes->resource('kategori');
$routes->resource('rider');
// $routes->group('event', static function($routes) {
//     $routes->get('/', 'Event::index');
// });
// $routes->get('/event', 'Home::index');
