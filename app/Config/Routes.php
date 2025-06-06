<?php

use App\Controllers\ContinenteController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/testdb', 'TestDB::index');


$routes->get('/', 'ContinenteController::listar');
$routes->post('/continente', 'ContinenteController::crearContinente');
$routes->post('/eliminar/(:num)', 'ContinenteController::eliminarContinente/$1');
$routes->post('/actualizar', 'ContinenteController::actualizarContinente');

