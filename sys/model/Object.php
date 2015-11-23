<?php
namespace sys\model;

/**
* Classe básica de consulta SQL
*/
abstract class Object extends \PDO
{
    private $db;
    private $host;
    private $user;
    private $pass;
    private $schema;

    public function __construct()
    {
        $this->db = 'mysql'; 
        $this->host = 'localhost'; 
        $this->schema = 'attivita'; 
        $this->user = 'root'; 
        $this->pass = 'matt0072matt'; 
        $dns = $this->db.":host=".$this->host.';dbname='.$this->schema;
        parent::__construct( $dns, $this->user, $this->pass ); 
        $this->exec("set names utf8");
    }

//    abstract public static function find($where, $params, $class = true);

    abstract public function delete();

    abstract public function save();

}