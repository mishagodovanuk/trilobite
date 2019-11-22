<?php

namespace Core\App\Database;

class DatabaseConfig
{
    const DB_CONFIG_PATH = SITE_ROOT . '/config/database.php';

    private $db_config;

    public function __construct()
    {
        include_once static::DB_CONFIG_PATH;

        $this->db_config = $mysql_config;
    }

    public function getHost()
    {
        return $this->db_config['host'];
    }

    public function getUser()
    {
        return $this->db_config['user'];
    }

    public function getPassword()
    {
        return $this->db_config['password'];
    }

    public function getDbName()
    {
        return $this->db_config['dbname'];
    }

    public function getCoding()
    {
        return $this->db_config['coding'];
    }
}
