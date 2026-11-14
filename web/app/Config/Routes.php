<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::entrada');
$routes->post('/run', 'Run::index');
$routes->get('/example', 'Example::index');
$routes->get('/documentation', 'Home::documentation');
$routes->get('/project/(:any)', 'Project::index/$1');
