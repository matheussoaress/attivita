<?php
namespace sys\view;

include_once "../../autoload.php";

use sys\controller\UsuarioController;

if(isset($_POST['nome'])){
    
    $nome = $_POST['nome'];
    $nascimento = $_POST['nascimento'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $resenha = $_POST['nova_senha'];
    if($senha == $resenha){
        $user = new UsuarioController();
        $result = $user->criarUsuario( $nome, $nascimento, $email, $senha);
        if($result){
            echo json_encode(array("result" => 1));
        }else{
            echo json_encode(array("result" => 0));
        }
    }else{
        echo json_encode(array("result" => 0));
    }
}