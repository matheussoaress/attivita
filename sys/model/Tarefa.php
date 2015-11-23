<?php
 
namespace sys\model;

use sys\model\Object;

class Tarefa extends Object
{
    private $id;
    private $criador_id;
    private $executor_id;
    private $nome;
    private $importancia;
    private $data_criacao;
    private $data_inicio;
    private $duracao;
    private $descricao;
    private $concluido;
    private $status;
    
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
    
    public function setCriadorId( $criador_id)
    { 
        $this->criador_id = $criador_id;
    }
    
    public function getCriadorId()
    { 
        return $this->criador_id;
    }
    
    public function setExecutorId( $executor_id)
    { 
        $this->executor_id = $executor_id;
    }
    
    public function getExecutorId()
    { 
        return $this->executor_id;
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
    
    public function setDataCriacao( $data_criacao)
    { 
        $this->data_criacao = $data_criacao;
    }
    
    public function getDataCriacao()
    { 
        return $this->data_criacao;
    }
    
    public function setDataInicio( $data_inicio)
    { 
        $this->data_inicio = $data_inicio;
    }
    
    public function getDataInicio()
    { 
        return $this->data_inicio;
    }
    
    public function setDuracao( $duracao)
    { 
        $this->duracao = $duracao;
    }
    
    public function getDuracao()
    { 
        return $this->duracao;
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

    public static function find($where = '1=1', $params = array(), $class = true)
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
                'p_duracao' => $this->duracao,
                'p_descricao' => $this->descricao,
                'p_concluido' => $this->concluido,
            );
            $update = $this->prepare( 'UPDATE tarefas SET executor_id = :p_executor_id, status = :p_status, nome = :p_nome, importancia = :p_importancia, data_inicio = :p_data_inicio, duracao = :p_duracao, descricao = :p_descricao, concluido = :p_concluido WHERE id = :p_id');
            $result = $update->execute($params);
            return $result?true:false;
        }else{
            $params = array(
                'p_criador_id' => $this->criador_id,
                'p_executor_id' => $this->executor_id,
                'p_status' => 1,
                'p_nome' => $this->nome,
                'p_importancia' => $this->importancia, 
                'p_data_criacao' => $this->data_criacao,
                'p_data_inicio' => $this->data_inicio,
                'p_duracao' => $this->duracao,
                'p_descricao' => $this->descricao,
                'p_concluido' => 0,
            );
            //echo "<pre>";
            $new = $this->prepare( 'INSERT INTO tarefas (criador_id, executor_id, status, nome, importancia, data_criacao, data_inicio, duracao, descricao, concluido) VALUES (:p_criador_id, :p_executor_id, :p_status, :p_nome, :p_importancia, :p_data_criacao, :p_data_inicio, :p_duracao, :p_descricao, :p_concluido)');
            // print_r($params);exit();
            $result = $new->execute( $params);
            return $result?true:false;
        }
    }

    public static function relatorioAnual( $usuario)
    {
        $sql = "select count(id) quantidade, avg(duracao) duracao, year(data_inicio) serie, case status when 3 then (sum(10*importancia)) end pontos from tarefas where executor_id = :p_executor_id group by serie";
        $params = array(
            'p_executor_id' => $usuario
        );

        $find = new self();
        $find->beginTransaction();
        $consul = $find->prepare( $sql);
        $consul->execute( $params);
        $result = $consul->fetchAll();
        return $result?$result:false;
    }    
    public static function relatorioMensal( $usuario)
    {
        $sql = "select count(id) quantidade, avg(duracao) duracao, date_format(data_inicio, '%m/%Y') serie, case status when 3 then (sum(10*importancia)) end pontos from tarefas where executor_id = :p_executor_id group by serie";
        $params = array(
            'p_executor_id' => $usuario
        );

        $find = new self();
        $find->beginTransaction();
        $consul = $find->prepare( $sql);
        $consul->execute( $params);
        $result = $consul->fetchAll();
        return $result?$result:false;
    }
    public static function relatorioSemanal( $usuario)
    {
        $sql = "select count(id) quantidade, avg(duracao) duracao, yearweek(data_inicio) serie, case status when 3 then (sum(10*importancia)) end pontos from tarefas where executor_id = :p_executor_id group by serie";
        $params = array(
            'p_executor_id' => $usuario
        );

        $find = new self();
        $find->beginTransaction();
        $consul = $find->prepare( $sql);
        $consul->execute( $params);
        $result = $consul->fetchAll();
        return $result?$result:false;
    }

}