<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/racer-setup', 'Home::racerSetup');
$routes->get('/race-timing', 'Home::raceTiming');
$routes->get('/result', 'Home::result');

$routes->post('/result', 'Home::sendData');

$routes->resource('event');
$routes->resource('kategori');
$routes->get('/rider/setup', 'Rider::setup');
$routes->resource('rider');


$routes->post('/session/set-session', 'SessionAPI::setSessionData');
// $routes->get('/event', 'Home::index');
