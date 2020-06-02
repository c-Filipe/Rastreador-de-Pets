<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/login', 'UsuariosController@login');

$router->get('/cadastro', 'UsuariosController@cadastrar');
$router->post('/cadastro', 'UsuariosController@cadastrarAction');

