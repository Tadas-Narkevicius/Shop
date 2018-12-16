<?php
namespace Lib\Db;

use Lib\Db\Connection;

class DbMySqli
{
    private static $db;

    private static $rows;

    private static $lastId;

    public static function connect()
    {
        @$db = new \mysqli(Connection::getDbHost(),
            Connection::getDbUser(), Connection::getDbPassword(), Connection::getDbData());

        if ($db->connect_errno) {
            // Custom error log here
            return false;
        }
        self::$db = $db;
    }

    public static function getErrNo()
    {
        var_dump(self::$db);
    }

    public static function getRows()
    {
        return self::$rows;
    }

    public static function getLastId()
    {
        return self::$lastId;
    }

    public static function dbClose()
    {
        if (self::$db){
            self::$db->close();
        }
    }

    public static function dbQuery($query, $types, $params, $one = false)
    {
        $run = self::$db->prepare($query);
        
        if (!$run) {
            self::dbClose();    
            return false;
        }
        
        if($types != null && $params != null)
            $run->bind_param($types, ...$params); 
           
        $run->execute();
        $result = $run->get_result();
        if ($result) {
            switch ($one) {
                case false:
                    self::$rows = $result->fetch_all(MYSQLI_ASSOC);
                    break;
                case true:
                    self::$rows = $result->fetch_assoc();
                    break;
            }
        }
        self::$lastId = $run->insert_id;
        $run->close();
        return true;
    }

}
