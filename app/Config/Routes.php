<?php

use App\Controllers\ContinenteController;
use App\Controllers\PaisController;
use App\Controllers\EstadoController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ruta de prueba para la base de datos
$routes->get('/testdb', 'TestDB::index');

// Rutas para manejar continentes
$routes->get('/', 'ContinenteController::listar');               // Mostrar todos los continentes
$routes->post('/continente', 'ContinenteController::crearContinente');  // Crear un continente
$routes->post('/eliminar/(:num)', 'ContinenteController::eliminarContinente/$1');  // Eliminar un continente
$routes->post('/actualizar', 'ContinenteController::actualizarContinente');  // Actualizar un continente

// Rutas para manejar países
$routes->get('/pais', 'PaisController::listar');  // Mostrar todos los países
$routes->post('/pais', 'PaisController::crearPais');  // Crear un país
$routes->post('/pais/actualizar', 'PaisController::actualizarPais');  // Actualizar un país
$routes->post('/pais/eliminar/(:num)', 'PaisController::eliminarPais/$1');  // Eliminar un país

// Rutas para manejar estados
$routes->get('/estado/listar', 'EstadoController::listar');
$routes->post('/estado/crearEstado', 'EstadoController::crearEstado');
$routes->post('/estado/eliminar/(:segment)', 'EstadoController::eliminarEstado/$1');  // Eliminar un estado
$routes->post('/estado/actualizarEstado', 'EstadoController::actualizarEstado');  // Actualizar un estado
