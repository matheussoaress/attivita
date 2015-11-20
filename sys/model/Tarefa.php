<?php
 
namespace sys\model;

use sys\model\Object;

class Tarefa extends Object
{
    private $id;
    private $criadorId;
    private $executorId;
    private $nome;
    private $importancia;
    private $dataCriacao;
    private $dataInicio;
    private $dataLimite;
    private $descricao;
    private $concluido;
    
    public function setStatus( $status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setId( $id)
    { 
        $this->id = $id;
    }
    
    public function getId()
    { 
        return $this->id;
    }
    
    public function setCriadorId( $criadorId)
    { 
        $this->criadorId = $criadorId;
    }
    
    public function getCriadorId()
    { 
        return $this->criadorId;
    }
    
    public function setExecutorId( $executorId)
    { 
        $this->executorId = $executorId;
    }
    
    public function getExecutorId()
    { 
        return $this->executorId;
    }
    
    public function setNome( $nome)
    { 
        $this->nome = $nome;
    }
    
    public function getNome()
    { 
        return $this->nome;
    }
    
    public function setImportancia( $importancia)
    { 
        $this->importancia = $importancia;
    }
    
    public function getImportancia()
    { 
        return $this->importancia;
    }
    
    public function setDataCriacao( $dataCriacao)
    { 
        $this->dataCriacao = $dataCriacao;
    }
    
    public function getDataCriacao()
    { 
        return $this->dataCriacao;
    }
    
    public function setDataInicio( $dataInicio)
    { 
        $this->dataInicio = $dataInicio;
    }
    
    public function getDataInicio()
    { 
        return $this->dataInicio;
    }
    
    public function setDataLimite( $dataLimite)
    { 
        $this->dataLimite = $dataLimite;
    }
    
    public function getDataLimite()
    { 
        return $this->dataLimite;
    }
    
    public function setDescricao( $descricao)
    { 
        $this->descricao = $descricao;
    }
    
    public function getDescricao()
    { 
        return $this->descricao;
    }
    
    public function setConcluido( $concluido)
    { 
        $this->concluido = $concluido;
    }
    
    public function getConcluido()
    { 
        return $this->concluido;
    }
    
    public function __construct()
    {
        parent::__construct();
    }

    public function find($where, $params = array(), $class = true)
    {
        $find = new self();
        $find->beginTransaction();
        $consul = $find->prepare( "SELECT * FROM tarefas WHERE ".$where);
        $consul->execute( $params);
        if($class){
            $result = $consul->fetchAll( \PDO::FETCH_CLASS, get_class());
        }else{
            $result = $consul->fetchAll();
        }
        return $result?$result:false;
    }
    public function delete() 
    {
        if(isset($this->id)){
            $delete = $this->prepare( "DELETE FROM tarefas WHERE id = {$this->id}");
            $result = $delete->execute();
            return ($result)?true:false;
        }
    }

    public function save() 
    {
        if(!is_null($this->id)){
            $params = array(
                'p_id' => $this->id, 
                'p_executor_id' => $this->executor_id,
                'p_status' => $this->status,
                'p_nome' => $this->nome,
                'p_importancia' => $this->importancia, 
                'p_data_inicio' => $this->data_inicio,
                'p_data_limite' => $this->data_limite,
                'p_descricao' => $this->descricao,
                'p_concluido' => $this->concluido,
            );
            $update = $this->prepare( 'UPDATE tarefas SET executor_id = :p_executor_id, status = :p_status, nome = :p_nome, importancia = :p_importancia, data_inicio = :p_data_inicio, data_limite = :p_data_limite, descricao = :p_descricao, concluido = :p_concluido WHERE id = :p_id');
            $result = $update->execute($params);
            return $result?true:false;
        }else{
            $params = array(
                'p_criador_id' => $this->criador_id,
                'p_executor_id' => $this->executor_id,
                'p_status' => $this->status,
                'p_nome' => $this->nome,
                'p_importancia' => $this->importancia, 
                'p_data_criacao' => $this->data_criacao,
                'p_data_inicio' => $this->data_inicio,
                'p_data_limite' => $this->data_limite,
                'p_descricao' => $this->descricao,
                'p_concluido' => $this->concluido,
            );
            $new = $this->prepare( 'INSERT INTO tarefa(criador_id, executor_id, status, nome, importancia, data_criacao, data_inicio, data_limite, descricao, concluido) VALUES (:p_criador_id, :p_executor_id, :p_status, :p_nome, :p_importancia, :p_data_criacao, :p_data_inicio, :p_data_limite, :p_descricao, :p_concluido)');
            $result = $new->execute( $params);
            return $result?true:false;
        }
    }
}