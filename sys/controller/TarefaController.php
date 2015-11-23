<?php

namespace sys\controller;

use sys\model\Tarefa;
use sys\model\Usuario;
use sys\controller\Util;

class TarefaController
{
    public static function cadastrarTarefa( $dados)
    {
        $user = $_SESSION['usuario']['id'];
        $dataCriacao = new \DateTime();
        
        if($dados['agendar']){
            $dataAgend = \DateTime::createFromFormat('d/m/Y', $dados['agendar']);
        }else{
            $dataAgend = $dataCriacao;
        }

        $tarefa = new Tarefa();
        $tarefa->setNome($dados['titulo']);
        $tarefa->setImportancia($dados['prioridade']);
        $tarefa->setDescricao($dados['tarefa']);
        $tarefa->setDataInicio($dataAgend->format('Y-m-d'));
        $tarefa->setDataCriacao($dataCriacao->format('Y-m-d'));
        $tarefa->setDuracao($dados['duracao']);
        $tarefa->setCriadorId($user);
        $tarefa->setExecutorId($user);

        if($tarefa->save()){
            return true;
        }else{
            return false;
        }
    }

    public static function listarTarefas($where = '1=1')
    {
        $where = 'executor_id = :p_executor_id and status != 3 and '.$where;
        $params = array(
            'p_executor_id' => $_SESSION['usuario']['id']
        );
        return Tarefa::find( $where, $params);
    }

    public static function listarTarefasConcluidas( $where = '1=1')
    {
        $where = 'executor_id = :p_executor_id and status = 3 and '.$where;
        $params = array(
            'p_executor_id' => $_SESSION['usuario']['id']
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
        $tarefa->setStatus( $status);
        if($tarefa->save()){
            if($status==3){
                $pontuacao = 10*$tarefa->getImportancia();
                $where = 'id = :p_id';
                $params = array(
                    'p_id' => $_SESSION['usuario']['id']
                );
                $usuario = Usuario::find( $where, $params);
                $usuario = $usuario[0];
                $usuario->setPontuacao($usuario->getPontuacao()+$pontuacao);
                $usuario->save();
                return $pontuacao;
            }
            return true;
        }else{
            return false;
        }
    }

    public static function relatorioAnual()
    {
        $usuario = $_SESSION['usuario']['id'];
        $info = Tarefa::relatorioAnual( $usuario);
        return $info?$info:false;
    } 
    public static function relatorioMensal()
    {
        $usuario = $_SESSION['usuario']['id'];
        $info = Tarefa::relatorioMensal( $usuario);
        return $info?$info:false;
    } 
    public static function relatorioSemanal()
    {
        $usuario = $_SESSION['usuario']['id'];
        $info = Tarefa::relatorioSemanal( $usuario);
        for ($i=0; $i < count($info); $i++) { 
            $semana = $info[$i]['serie'];
            $info[$i]['serie'] = "Semana ".substr($semana, 4)." de ".substr($semana, 0, 4);
        }
        return $info?$info:false;
    } 

}