<?php

class DB_Connection
{
    //This should be defined in protected configuration files. But let's not increase complexity for this example.
    const SERVER_HOST = "mysql-db";
    const SERVER_PORT = 3306;
    const MYSQL_USER = "mysql";
    const MYSQL_PASS = "1";
    const DB_NAME = "Exads";

    private static $_instance;
    private $connection;

    public static function getInstance() :DB_Connection
    {
        if (!(self::$_instance instanceof DB_Connection)) {
            self::$_instance = new DB_Connection();
        }

        return self::$_instance;
    }

    private function __construct()
    {
        $this->connection = new PDO(
            "mysql:host=".DB_Connection::SERVER_HOST.";dbname=".DB_Connection::DB_NAME,
            DB_Connection::MYSQL_USER,
            DB_Connection::MYSQL_PASS
        );
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection() :PDO
    {
        return $this->connection;
    }
}
