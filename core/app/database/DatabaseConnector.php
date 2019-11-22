<?php
namespace Core\App\Database;

use Core\App\Database\DatabaseConfig;
use PDO;
use PDOException;

class DatabaseConnector
{
    public $dbconfig;

    private $pdo_entity;

    public function __construct()
    {
        $this->dbconfig = new DatabaseConfig();
    }

    public function connect()
    {
        if ($this->pdo_entity === null) {

            $dsn = "mysql:host={$this->dbconfig->getHost()};dbname={$this->dbconfig->getDbName()};charset={$this->dbconfig->getCoding()}";
            try {
                $opt = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];
                $this->pdo_entity = new PDO($dsn, $this->dbconfig->getUser(), $this->dbconfig->getPassword(), $opt);
            } catch (PDOException $e) {
                echo "Connection failed: {$e->getMessage()}";
                die();
            }
        }

        return $this->pdo_entity;
    }
}
