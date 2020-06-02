<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Usuario;
use usuario as GlobalUsuario;

class UsuariosController extends Controller {

    
   public function login(){
       $this->render('/login');
   }
   public function loginAction(){

   }
   public function cadastrar(){
    $flash = '';
    if(!empty($_SESSION['flash'])){
        $flash = $_SESSION['flash'];
        $_SESSION['flash'] = '';
    }

    $this->render('\cadastro', [
        'flash' => $flash
    ]);
    }
    public function cadastrarAction(){
        $nome = filter_input(INPUT_POST, 'nome');
        $sobrenome = filter_input(INPUT_POST, 'sobrenome');
        $email = strtolower(filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL));
        $senha = filter_input(INPUT_POST, 'senha');
        $estado = filter_input(INPUT_POST, 'estado');
        $cidade = filter_input(INPUT_POST, 'cidade');
        $bairro = filter_input(INPUT_POST, 'bairro');
        $rua = filter_input(INPUT_POST, 'rua');
        $cep = filter_input(INPUT_POST, 'cep');
        $numero = filter_input(INPUT_POST, 'numero');
        $complemento = filter_input(INPUT_POST, 'complemento');

        if($nome && $email && $senha){
            if(Usuario::emailExists($email) === false){
                $token = Usuario::addUser($nome,$sobrenome, $email,$senha,$estado,$cidade,$bairro,$rua,
                $cep,$numero,$complemento);
                $_SESSION['token'] = $token;
                $this->redirect('/home');
            }
            else{
                $_SESSION['flash'] = 'E-mail já cadastrado!';
                echo "<script> history.back() </script>";
            }
        }
        else{
            $_SESSION['flash'] = 'Preencha todos os dados obrigatórios!';
            echo "<script> history.back() </script>";
        } 


    }

}

