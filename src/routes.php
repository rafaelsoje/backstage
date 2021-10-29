<?php
use core\Router;
use src\controllers\AdminController;

$router = new Router();

// Home
$router->get('/', 'HomeController@index');

// login
$router->get('/login', 'LoginController@sigin');
$router->post('/login', 'LoginController@siginAction');

// user
$router->get('/cadastro/usuarios', 'LoginController@sigup');
$router->get('/usuario/perfil', 'UserController@perfil');
$router->get('/usuario', 'UserController@usuario');
$router->get('/usuario/novo', 'UserController@formUser');
$router->post('/usuario/novo', 'UserController@addUser');

// Admin
$router->get('/backup', 'AdminController@backup');
$router->get('/backup/delete/{id}', 'AdminController@deleteBackup');
$router->post('/backup/novo', 'AdminController@addBackup');





// $router->post('/cadastro', 'LoginController@sigupAction');

$router->get('/senha', 'LoginController@recovery');
$router->post('/senha', 'LoginController@recoveryAction');

$router->get('/sair', 'LoginController@logout');
