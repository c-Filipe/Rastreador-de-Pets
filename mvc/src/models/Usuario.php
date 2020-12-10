<?php
namespace src\models;
use \core\Model;

class Usuario extends Model {

    public  static function addUser($nome,$sobrenome, $email,$senha,$estado,$cidade,$bairro,$rua,
    $cep,$numero,$complemento){
        $hash = password_hash($senha, PASSWORD_DEFAULT );
        $token = md5(time().rand(0,9999).time());

        Usuario::insert([
            'nome' => $nome,
            'sobrenome' => $sobrenome,
            'email' => $email,
            'senha' => $hash,
            'estado' => $estado,
            'cidade' => $cidade,
            'bairro' => $bairro,
            'rua' => $rua,
            'cep' => $cep,
            'numero' => $numero,
            'complemento' => $complemento,
            'token' => $token

        ])->execute();

        return $token;

    }
    public static  function emailExists($email){
        $user = Usuario::select()->where('email', $email)->one();
        return $user ? true : false;
    }


}