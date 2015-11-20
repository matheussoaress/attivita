<?php 
namespace sys\view;

include_once "../../autoload.php";

use sys\controller\UsuarioController;
use sys\controller\TarefaController;

if(isset($_POST['usuario'])){
    
    $tarefa = $_POST['tarefa'];
    $usuario = $_POST['usuario']

    if(empty($usuario) or is_null($usuario)){
        $usuarios = UsuarioController::getUsuarios();
        echo json_encode($usuarios);
    }else{
        $result = TarefaController::delegarTarefa( $tarefa, $usuario);
    }
}
?>