<?php
include_once('DB_Connection.php');
include_once('Db_EndUser_Table.php');

class Dao_EndUser_Table
{
    private static $_instance;
    private function __construct(){}

    public static function getInstance() :Dao_EndUser_Table
    {
        if(!(self::$_instance instanceof Dao_EndUser_Table)){
            self::$_instance = new Dao_EndUser_Table();
        }
        return self::$_instance;
    }

    public function getAllUsers() :array
    {
        $query = sprintf("SELECT * FROM %s", Db_EndUser_Table::TABLE_NAME);
        return DB_Connection::getInstance()->fetchAll($query);
    }

}