<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'c_barang::index');
$routes->get('/v_barang', 'c_barang::index');
$routes->get('/barang/edit', 'c_mhs::index');

$routes->get('/v_cart', 'c_cart::index');
$routes->get('/cart/add/(:num)', 'c_cart::add/$1');
