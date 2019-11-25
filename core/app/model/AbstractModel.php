<?php

namespace Core\App\Model;

use Core\App\Database\DatabaseConnector;

abstract class AbstractModel
{
    const SELECT_STATEMENT = 'SELECT ';

    const INSERT_STATEMENT = 'INSERT ';

    const UPDATE_STATEMENT = 'UPDATE ';

    const DELETE_STATEMENT = 'DELETE ';

    const FROM_STATEMENT = 'FROM ';

    const WHERE_STATEMENT = 'WHERE ';

    const SET_STATEMENT = 'SET';

    const ALL_STATEMENT = '* ';

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
        $statement = static::SELECT_STATEMENT . static::ALL_STATEMENT
            . static::FROM_STATEMENT . $this->getTableName();
        $result = $this->query($statement);

        return $result;
    }

    public function deleteAll()
    {
        $statement = static::DELETE_STATEMENT . static::ALL_STATEMENT
            . static::FROM_STATEMENT . $this->getTableName();
        $result = $this->query($statement);
    }

    public function selectById($id)
    {
        $statement = static::SELECT_STATEMENT . static::ALL_STATEMENT
            . static::FROM_STATEMENT . $this->getTableName() .  static::WHERE_STATEMENT . "id={$id}";
        $result = $this->query($statement);

        return $result;
    }

    public function deleteById($id)
    {
        $statement = static::DELETE_STATEMENT . static::ALL_STATEMENT
            . static::FROM_STATEMENT . $this->getTableName() . static::WHERE_STATEMENT . "id={$id}";
        $result = $this->query($statement);
    }
}
