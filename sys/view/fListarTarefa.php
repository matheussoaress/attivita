<?php
namespace sys\view;

include_once "../../autoload.php";

use sys\controller\TarefaController;

if(!isset($_POST['filtro'])){
	
	$sAgendado = $_POST['sAgendado'];
	$agendar = $_POST['agendar'];

	$sPrioridade = $_POST['sPrioridade'];
	$prioridade = $_POST['prioridade'];
	
	$sDuracao = $_POST['sDuracao'];
	$duracao = $_POST['duracao'];
	
	$where = "1=1";

	if(!empty($agendar)){
		$agendar = explode('/', $agendar);
		$agendar = $agendar[2]."-".$agendar[1]."-".$agendar[0];
		$where .= "data_inicio $sAgendar \'$agendar\'"
	}
	if(!empty($prioridade)){
		$where .= "prioridade $sPrioridade $prioridade"
	}
	if(!empty($duracao)){
		$where .= "duracao $sDuracao $duracao"
	}

	$lista['abertas'] = TarefaController::listarTarefas( $where);
	$lista['concluidas'] = TarefaController::listarTarefasConcluidas( $where);

	echo json_encode($lista);
	
}else{
	$lista['abertas'] = TarefaController::listarTarefas();
	$lista['concluidas'] = TarefaController::listarTarefasConcluidas();

	echo json_encode($lista);
}