<?php
include_once('DB_Connection.php');
include_once('Db_ExadsTest_Table.php');

class Dao_ExadsTest_Table
{
    private static $_instance;

    private function __construct(){}

    public static function getInstance() :Dao_ExadsTest_Table
    {
        if(!(self::$_instance instanceof Dao_ExadsTest_Table)){
            self::$_instance = new Dao_ExadsTest_Table();
        }
        return self::$_instance;
    }

    /**
     * @throws PDOException
     * @return array
     */
    public function getAllRecords()
    {
        $query = sprintf("SELECT * FROM %s", Db_ExadsTest_Table::TABLE_NAME);
        $result = null;
        try{
            $conn = DB_Connection::getInstance()->getConnection();
            $exec = $conn->prepare($query);
            $exec->execute();
            $result =  $exec->fetchAll();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }

        return $result;
    }

    public function addRowToTable(string $name, int $age, string $jobTitle) :bool
    {
        $query = sprintf(
          "INSERT INTO %s (name, age, job_title) VALUES (?, ?, ?)",
            Db_ExadsTest_Table::TABLE_NAME
        );
        $result = false;

        try{
            $conn = DB_Connection::getInstance()->getConnection();
            $exec = $conn->prepare($query);
            $result = $exec->execute(array($name, $age, $jobTitle));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $result;
    }

}