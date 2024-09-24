<?php
// routes.php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/producto', 'Producto::index');
$routes->get('/producto/add', 'Producto::add');
$routes->post('/producto/insert','Producto::insert');
$routes->get('/producto/delete/(:num)','Producto::delete/$1');

$routes->get('/producto/editarP/(:num)','Producto::editarP/$1');
$routes->post('/producto/update','producto::update');


$routes->get('/marca/addMarca', 'Marca::index' );
$routes->post('/marca/insert','Marca::insert');
$routes->get('/marca/delete/(:num)','Marca::delete/$1');

$routes->get('/marca/editarM/(:num)','Marca::editarM/$1');
$routes->post('/marca/update','marca::update');

$routes->get('/proveedor/addProveedor', 'Proveedor::index' );
$routes->post('/proveedor/insert','Proveedor::insert');
$routes->get('/proveedor/delete/(:num)','Proveedor::delete/$1');

$routes->get('/proveedor/editarProveedor/(:num)','Proveedor::editarProv/$1');
$routes->post('/proveedor/update','Proveedor::update');


$routes->get('/tipo/addTipo', 'Tipo::index' );
$routes->post('/tipo/insert','Tipo::insert');
$routes->get('/tipo/delete/(:num)','Tipo::delete/$1');

$routes->get('/tipo/editarTipo/(:num)','Tipo::editartipo/$1');
$routes->post('/tipo/update','Tipo::update');





