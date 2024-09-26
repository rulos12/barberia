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

$routes->get('/empleado', 'Empleado::index');
$routes->get('/empleado/addEmpleado', 'Empleado::add');
$routes->post('/empleado/insert','Empleado::insert');
$routes->get('/empleado/delete/(:num)','Empleado::delete/$1');


$routes->get('/empleado/edit/(:num)','Empleado::edit/$1');
$routes->post('/empleado/update','empleado::update');

$routes->get('/cliente', 'Cliente::index');
$routes->get('/cliente/addCliente', 'Cliente::add');
$routes->post('/cliente/insert','Cliente::insert');
$routes->get('/cliente/delete/(:num)','Cliente::delete/$1');


$routes->get('/cliente/edit/(:num)','Cliente::edit/$1');
$routes->post('/cliente/update','Cliente::update');


$routes->get('/evento', 'Evento::index');
$routes->get('/evento/addEvento', 'Evento::add');
$routes->post('/evento/insert','Evento::insert');
$routes->get('/evento/delete/(:num)','Evento::delete/$1');

$routes->get('/evento/edit/(:num)','Evento::edit/$1');
$routes->post('/evento/update','Evento::update');



$routes->get('/cita', 'Cita::index');
$routes->get('/cita/add', 'Cita::add');
$routes->post('/cita/insert','Cita::insert');
$routes->get('/cita/deleteCita/(:num)','Cita::deleteCita/$1');


$routes->get('/cita/editarCita/(:num)','Cita::editarCita/$1');
$routes->post('/cita/update','Cita::update');







