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

    public function setId( $id)
    { 
        $this->id = $id;
    }
    
    public function getId()
    { 
        return $this->id;
    }
    
    public function setCriador_id( $criadorId)
    { 
        $this->criadorId = $criadorId;
    }
    
    public function getCriador_id()
    { 
        return $this->criadorId;
    }
    
    public function setExecutor_id( $executorId)
    { 
        $this->executorId = $executorId;
    }
    
    public function getExecutor_id()
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
    
    public function setData_criacao( $dataCriacao)
    { 
        $this->dataCriacao = $dataCriacao;
    }
    
    public function getData_criacao()
    { 
        return $this->dataCriacao;
    }
    
    public function setData_inicio( $dataInicio)
    { 
        $this->dataInicio = $dataInicio;
    }
    
    public function getData_inicio()
    { 
        return $this->dataInicio;
    }
    
    public function setData_limite( $dataLimite)
    { 
        $this->dataLimite = $dataLimite;
    }
    
    public function getData_limite()
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

    public function find($sql, $params = array(), $class = true)
    {
        $consul = $this->prepare( $sql);
        $consul->execute($params);
        if($class){
            $result = $consul->fetchAll( \PDO::FETCH_CLASS, get_class());
        }else{
            $result = $consul->fetchAll();
        }
        return $result?$result:false;
    }
}