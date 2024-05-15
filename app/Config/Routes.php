<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'c_barang::index');
$routes->get('/barang/edit', 'c_mhs::index');

