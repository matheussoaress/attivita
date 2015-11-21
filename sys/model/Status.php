<?php
    namespace sys\model;

    use sys\model\Object;

    class Status extends Object
    {
		private $id;
		private $nome;
		private $descricao;

		public function setId( $id)
		{
			$this->id = $id;
		}
		
		public function getId()
		{
			return $this->id;
		}
		public function setNome( $nome)
		{
			$this->nome = $nome;
		}
		
		public function getNome()
		{
			return $this->nome;
		}
		public function setDescricao( $descricao)
		{
			$this->descricao = $descricao;
		}
		
		public function getDescricao()
		{
			return $this->descricao;
		}
		public static function find($where = '1=1', $params = array(), $class = true)
	    {
	        $find = new self();
	        $find->beginTransaction();
	        $consul = $find->prepare( "SELECT * FROM status WHERE ".$where);
	        $consul->execute( $params);
	        if($class){
	            $result = $consul->fetchAll( \PDO::FETCH_CLASS, get_class());
	        }else{
	            $result = $consul->fetchAll();
	        }
	        return $result?$result:false;
	    }
	    public function delete() 
	    {}

	    public function save() 
	    {}

    }