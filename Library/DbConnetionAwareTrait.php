<?php
namespace Library;

trait DbConnetionAwareTrait
{
	protected $dbConnection;

    public function setDbConnection(DbConnection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }
}