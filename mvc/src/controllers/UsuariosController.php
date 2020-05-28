<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Usuario;

class UsuariosController extends Controller {

    
   public function login(){
       $this->render('/login');
   }
   public function cadastrar(){
    $this->render('/cadastro');
}
}

