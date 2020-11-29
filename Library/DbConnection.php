<?php
namespace Library;

class DbConnection
{
    private $pdo;
    
    public function __construct($dsn, $user, $pass)
    {
        $this->pdo = new \PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    
    public function getPDO()
    {
        return $this->pdo;
    }
}
