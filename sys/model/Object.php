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
    protected $conn;

    public function __construct()
    {
        $this->db = 'mysql'; 
        $this->host = 'localhost'; 
        $this->schema = 'attivita'; 
        $this->user = 'root'; 
        $this->pass = 'matt0072matt'; 
        $dns = $this->db.':database='.$this->schema.";host=".$this->host; 
        parent::__construct( $dns, $this->user, $this->pass ); 
    }

    abstract public static function find($where, $params);

    abstract public function delete();

    abstract public function save();

}