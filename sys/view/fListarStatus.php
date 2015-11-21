<?php 
namespace sys\view;

include_once "../../autoload.php";

use sys\controller\StatusController;
use sys\controller\TarefaController;

if(isset($_POST['status'])){
	$tarefa = $_POST['tarefa'];
	$status = $_POST['status'];

	$result = TarefaController::alterarStatus( $tarefa, $status);
	if( $result){
		if($status == 3){
			$cod = 2;
			$msg = "Você ganhou $result pontos nesta tarefa";
		}else{
			$cod = 1;
			$msg = "Alterado com sucesso";
		}
	}else{
		$cod = 0;
		$msg = "Impossível alterar no momento";
	}

	echo json_encode(array('codigo' => $cod, 'mensagem' => $msg));

}else{
	$status = StatusController::listarStatus();
	echo json_encode($status);
}