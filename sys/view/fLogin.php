<?php
namespace sys\view;

include_once "../../autoload.php";

use sys\controller\UsuarioController;

if(isset($_POST['usuario'])){
    
    $nome = $_POST['usuario']; 
    $senha = $_POST['senha']; 
    
    $user = new UsuarioController();
    if($user->fazerLogin($nome, $senha)){
        echo json_encode(array("result" => 1));
    }else{
        echo json_encode(array("result" => 0));
    }
}


