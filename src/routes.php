<?php
use core\Router;

$router = new Router();

// Home
$router->get('/', 'HomeController@index');

// User
$router->get('/login', 'LoginController@sigin');
$router->post('/login', 'LoginController@siginAction');
$router->get('/cadastro/usuarios', 'LoginController@sigup');

// Admin
$router->get('/backup', 'AdminController@backup');
$router->get('/backup/delete/{id}', 'AdminController@deleteBackup');
$router->post('/backup/novo', 'AdminController@addBackup');
$router->get('/usuario', 'AdminController@usuario');




// $router->post('/cadastro', 'LoginController@sigupAction');

$router->get('/senha', 'LoginController@recovery');
$router->post('/senha', 'LoginController@recoveryAction');

$router->get('/sair', 'LoginController@logout');
