<?php
include_once("{$_SERVER['PWD']}/config/database.php");

createDatabase($mysql_config);
createCoreTable($mysql_config);
fillCoreData($mysql_config);

function createDatabase($mysql_config)
{
    try {
        $dbh = new PDO("mysql:host={$mysql_config['host']}", $mysql_config['user'], $mysql_config['password']);

        $dbh->exec("CREATE DATABASE `trilobite`;
                CREATE USER '{$mysql_config['user']}'@'localhost' IDENTIFIED BY '{$mysql_config['password']}';
                GRANT ALL ON `trilobite`.* TO '{$mysql_config['user']}'@'localhost';
                FLUSH PRIVILEGES;");
        print('database creating. OK');
    } catch (PDOException $e) {
        die("database creating. ERROR. message: " . $e->getMessage());
    }
}

function createCoreTable($mysql_config)
{
    try {
        $db = new PDO("mysql:dbname=trilobite;host={$mysql_config['host']}", $mysql_config['user'], $mysql_config['password']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Error Handling
        $sql = "CREATE table core_config(
        ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
        config_name VARCHAR( 50 ) NOT NULL COLLATE utf8_general_ci,
        config_value VARCHAR( 1024 ) NOT NULL) COLLATE utf8_general_ci";
        $db->exec($sql);
        print(" core_config table creating. OK.\n");
    } catch (PDOException $e) {
        echo " core_config table creating. ERROR. message: {$e->getMessage()}";
    }
}

function fillCoreData($mysql_config) {
    $data = getDefaultConfigData();
    $db = new PDO("mysql:dbname=trilobite;host={$mysql_config['host']}", $mysql_config['user'], $mysql_config['password']);

    foreach ($data as $value) {
        try {
            $db->exec("INSERT INTO `core_config`(`ID`, `config_name`, `config_value`) VALUES ('{$value['config_name']}','{$value['config_value']}')");
        } catch (PDOException $e) {
            echo "Cant proceed row. {$e->getMessage()}";
        }
    }
}

function getDefaultConfigData()
{
    $data = [
        ['config_name' => 'main_url', 'config_value' => 'http://trilobite'],
        ['config_name' => 'ip_address', 'config_value' => '127.0.0.1']
    ];

    return $data;
}
