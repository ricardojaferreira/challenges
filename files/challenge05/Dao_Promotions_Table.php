<?php
include_once('DB_Connection.php');
include_once('Db_Promotions_Table.php');

class Dao_Promotions_Table
{
    private static $_instance;
    private function __construct(){}

    public static function getInstance() :Dao_Promotions_Table

    {
        if(!(self::$_instance instanceof Dao_Promotions_Table)){
            self::$_instance = new Dao_Promotions_Table();
        }
        return self::$_instance;
    }

    public function getAllPromotions() :array
    {
        $query = sprintf("SELECT * FROM %s", Db_Promotions_Table::TABLE_NAME);
        return DB_Connection::getInstance()->fetchAll($query);
    }

}