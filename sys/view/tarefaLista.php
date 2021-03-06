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

    $tarefasAbertas = TarefaController::listarTarefas( $where);
    
}else{
    $tarefasAbertas = TarefaController::listarTarefas();
}
?>
<link rel="stylesheet" type="text/css" href="../vendor/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="../vendor/datatables/jquery.dataTables.min.css">
<script type="text/javascript" src="../vendor/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/tarefa.list.js"></script>

<table class="table table-bordered table-striped dataTable" id="tarefas" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th>Tarefa</th>
            <th>Importância</th>
            <th>Descrição</th>
            <th class="actions">Ações</th>
        </tr>
    </thead>
    <?php if($tarefasAbertas): ?>
        <tbody>
            <?php foreach($tarefasAbertas as $tarefa): ?>
                <tr>
                    <th><?= $tarefa->getNome() ?></th>
                    <th><?= $tarefa->getImportancia() ?></th>
                    <th><?= $tarefa->getDescricao() ?></th>
                    <th> 
                        <button data-target="#modalStatus" data-toggle="modal" class="btn btn-primary btn-xs" data-id="<?= $tarefa->getId() ?>" ><i class="glyphicon glyphicon-ok"></i></button>
                        <button data-target="#modalDelegar" data-toggle="modal" class="btn btn-danger btn-xs" data-id="<?= $tarefa->getId() ?>" ><i class="glyphicon glyphicon-pencil"></i></button>
                    </th>
                </tr>
            <?php endforeach;?>
        </tbody>
    <?php endif; ?>
</table>