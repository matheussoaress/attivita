<?php
namespace sys\view;

include_once "../../autoload.php";

use sys\controller\UsuarioController;

$user = new UsuarioController();

if($user->sairUsuario()){
    echo json_encode(array("result" => 1));
}else{
    echo json_encode(array("result" => 0));
}