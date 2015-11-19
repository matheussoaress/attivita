<?php

namespace sys\controller;

use sys\model\Usuario;
use sys\controller\Util;

class UsuarioController
{
    public function fazerLogin($nome, $senha)
    {
        $params = array(
            'p_email' => $nome,
            'p_senha' => $senha //md5($senha)
        );
        $user = Usuario::find('email = :p_email and senha = :p_senha', $params);
        if($user instanceof Usuario){
            $info = array(
                'id' => $user->getId(),
                'nome' => $user->getNome(),
                'email' => $user->getEmail(),
                'nascimento' => $user->getNascimento(),
                'pontuacao' => $user->getPontuacao(),
            );
            $_SESSION['usuario']= $info;
            return true;
        }else{
            return false;
        }
    }

    public static function testarLogin()
    {
        return (isset($_SESSION['usuario']) && is_array($_SESSION['usuario']));
    }

    public function criarUsuario($nome, $nascimento, $email, $senha)
    {
        $usuario = new Usuario;
        $usuario->setNome($nome);
        $usuario->setNascimento(Util::tratarDataParaBanco($nascimento));
        $usuario->setEmail($email);
        $usuario->setSenha($senha);
        if($usuario->save()){
             $_SESSION['usuario']= $usuario;
             return true;
        }else{
            return false;
        }
    }

    public function sairUsuario() {
        if(isset($_SESSION['usuario']) && ($_SESSION['usuario'] instanceof Usuario)){
            $_SESSION['usuario'] = "";
            return true;
        }else{
            return false;
        }
    }
    
    public function teste(){
        return "teste";
    }
}