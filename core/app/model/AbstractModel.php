<?php

namespace Core\App\Model;

use Core\App\Database\DatabaseConnector;

abstract class AbstractModel
{
    private $dbconnect;

    public function __construct()
    {
        $this->dbconnect = new DatabaseConnector();
        $this->dbconnect = $this->dbconnect->connect();
    }

    public function query($statement)
    {
        return $this->dbconnect->query($statement);
    }

    public function selectAll()
    {
        $statement = "SELECT * FROM {$this->getTableName()}";
        $result = $this->query($statement);

        return $result;
    }

    public function deleteAll()
    {
        $statement = "DELETE * FROM {$this->getTableName()}";
        $result = $this->query($statement);
    }

    public function selectById($id)
    {
        $statement = "SELECT * FROM {$this->getTableName()} WHERE id={$id}";
        $result = $this->query($statement);

        return $result;
    }

    public function deleteById($id)
    {
        $statement = "DELETE * FROM {$this->getTableName()} WHERE id={$id}";
        $result = $this->query($statement);
    }
}
