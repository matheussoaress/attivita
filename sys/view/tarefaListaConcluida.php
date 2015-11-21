<?php

namespace sys\view;

include_once "../../autoload.php";

use sys\controller\TarefaController;

if(isset($_GET['filtro'])){
    
    $sAgendado = $_GET['sAgendado'];
    $agendar = $_GET['agendar'];

    $sPrioridade = $_GET['sPrioridade'];
    $prioridade = $_GET['prioridade'];
    
    $sDuracao = $_GET['sDuracao'];
    $duracao = $_GET['duracao'];
    
    $where = "1=1";

    if(!empty($agendar)){
        $agendar = explode('/', $agendar);
        $agendar = $agendar[2]."-".$agendar[1]."-".$agendar[0];
        $where .= " and data_inicio $sAgendar \'$agendar\'";
    }
    if(!empty($prioridade)){
        $where .= " and importancia $sPrioridade $prioridade";
    }
    if(!empty($duracao)){
        $where .= " and duracao $sDuracao $duracao";
    }

    $tarefasConcluidas = TarefaController::listarTarefasConcluidas( $where);
    
}else{
    $tarefasConcluidas = TarefaController::listarTarefasConcluidas();
}
?>
<table class="table table-bordered table-striped dataTable" id="tarefas" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th>Tarefa</th>
            <th>Importância</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <?php if($tarefasConcluidas): ?>
        <tbody>
            <?php foreach($tarefasConcluidas as $tarefa): ?>
                <tr>
                    <th><?= $tarefa->getNome() ?></th>
                    <th><?= $tarefa->getImportancia() ?></th>
                    <th><?= $tarefa->getDescricao() ?></th>
                </tr>
            <?php endforeach;?>
        </tbody>
    <?php endif; ?>
</table>