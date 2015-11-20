<?php

namespace sys\controller;

use sys\model\Tarefa;
use sys\model\Usuario;
use sys\controller\Util;

class TarefaController
{
    public static function cadastrarTarefa( $dados)
    {
        $tarefa = new Tarefa();
        $tarefa->setCriador_id($dados['criador_id']);
        $tarefa->setExecutor_id($dados['executor_id']);
        $tarefa->setNome($dados['nome']);
        $tarefa->setImportancia($dados['importancia']);
        $tarefa->setData_criacao($dados['data_criacao']);
        $tarefa->setData_inicio($dados['data_inicio']);
        $tarefa->setData_limite($dados['data_limite']);
        $tarefa->setDescricao($dados['descricao']);
        $tarefa->setConcluido($dados['concluido']);
        if($tarefa->save()){
            return true;
        }else{
            return false;
        }
    }

    public static function listarTarefas( $usuario)
    {
        $where = 'executor_id = :p_executor_id';
        $params = array(
            'p_executor_id' => $usuario
        );
        return Tarefa::find( $where, $params);
    }

    public static function filtrarTarefa( $usuario, $dados)
    {
        $where = 'executor_id = :p_executor_id';
        $params = array(
            'p_executor_id' => $usuario
        );
        return Tarefa::find( $where, $params);
    }

    public static function delegarTarefa( $tarefa, $usuario)
    {
        $where = 'id = :p_id';
        $params = array(
            'p_id' => $tarefa
        );
        $tarefa = Tarefa::find( $where, $params);
        $tarefa = $tarefa[0];
        $tarefa->setExecutorId( $usuario);
        if($tarefa->save()){
            return true;
        }else{
            return false;
        }
    }

    public static function alterarStatus( $tarefa, $status)
    {
        $where = 'id = :p_id';
        $params = array(
            'p_id' => $tarefa
        );
        $tarefa = Tarefa::find( $where, $params);
        $tarefa = $tarefa[0];
        $tarefa->setStatusId( $usuario);
        if($tarefa->save()){
            return true;
        }else{
            return false;
        }
    }

}