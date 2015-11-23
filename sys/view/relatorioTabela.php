<?php

namespace sys\view;

include_once "../../autoload.php";

use sys\controller\TarefaController;

if(isset($_GET['filtro'])){
    
    $tipo = $_GET['tprelatorio'];

    if($tipo == 1){
        $info = TarefaController::relatorioAnual();
    }elseif($tipo == 2){
        $info = TarefaController::relatorioMensal();
    }else{
        $info = TarefaController::relatorioSemanal();
    }
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
            <th></th>
            <th>Quantidade de Tarefas</th>
            <th>Média de Tempo</th>
            <th>Pontos Ganhos</th>
        </tr>
    </thead>
    <?php if(isset($info)): ?>
        <tbody>
            <?php foreach($info as $line): ?>
                <tr>
                    <th><?= $line['serie'] ?></th>
                    <th><?= $line['quantidade'] ?></th>
                    <th><?= $line['duracao'] ?></th>
                    <th><?= $line['pontos'] ?></th>
                </tr>
            <?php endforeach;?>
        </tbody>
    <?php endif; ?>
</table>