<?php

namespace sys\view;

include_once "../../autoload.php";

use sys\controller\TarefaController;

if (isset($_POST['titulo'])) {
	
	$dados = array(
		'titulo' => $_POST['titulo'],
		'duracao' => $_POST['duracao'],
		'agendar' => $_POST['agendar'],
		'prioridade' => $_POST['prioridade'],
		'tarefa' => $_POST['tarefa'],
	);

	$return = TarefaController::cadastrarTarefa( $dados);
	if($return){
		$cod = 1;
		$msg = 'Salvo com Sucesso';
	}else{
		$cod = 0;
		$msg = 'Erro ao Salvar';
	}

	echo json_encode(array('codigo' => $cod, 'mensagem' => $msg));
}