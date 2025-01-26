<?php

namespace Database;
use Exception;
use PDO;
use PDOException;

require_once '../config/mysql.php';
class MySQLConnection
{
    private static $instance = null;
    private $connection;

    private function __construct() {

        $mysql_conf = getConfig();

        try {
            $this->connection = new PDO(
                "mysql:host={$mysql_conf['host']};dbname={$mysql_conf['dbname']};charset={$mysql_conf['charset']}",
                $mysql_conf['username'],
                $mysql_conf['password']
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new MySQLConnection();
        }
        return self::$instance->connection;
    }

    public function __clone() {
        throw new Exception("Can't clone a singleton");
    }
}