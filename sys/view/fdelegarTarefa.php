<?php 
namespace sys\view;

include_once "../../autoload.php";

use sys\controller\UsuarioController;
use sys\controller\TarefaController;

if(isset($_POST['usuario'])){
    
    $tarefa = $_POST['tarefa'];
    $usuario = $_POST['usuario'];

	if(TarefaController::delegarTarefa( $tarefa, $usuario)){
		$cod = 1;
		$msg = "Alterado com sucesso";
	}else{
		$cod = 0;
		$msg = "Impossível alterar no momento";
	}

	echo json_encode(array('codigo' => $cod, 'mensagem' => $msg));

}else{
    $usuarios = UsuarioController::listarUsuarios();
    echo json_encode($usuarios);
}
?>