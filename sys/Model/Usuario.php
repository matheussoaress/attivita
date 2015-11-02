<?php
    namespace sys\Model;

    use sys\Model\Object;

    class Usuario extends Object
    {
        private $id;
        private $nome;
        private $email;
        private $nascimento;
        private $senha;

        public function getId()
        {
            return $this->id;
        }
        
        public function getNome()
        {
            return $this->nome;
        }
        
        public function setNome( $nome)
        { 
            $this->nome = $nome;
        }
        
        public function getEmail()
        {
            return $this->email;
        }
        
        public function setEmail( $email)
        { 
            $this->email = $email;
        }
        
        public function getNascimento()
        {
            return $this->nascimento;
        }
        
        public function setNascimento( $nascimento)
        { 
            $this->nascimento = $nascimento;
        }
        
        public function getSenha()
        {
            return $this->senha;
        }
        
        public function setSenha( $senha)
        { 
            $this->senha = $senha;
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
                $result = $consul->fetchAll(PDO::FETCH_CLASS, get_class());
            }else{
                $result = $consul->fetchAll();
            }
            return $result?$result:false;
        }

    }