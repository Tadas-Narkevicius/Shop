<?php
namespace Lib\Db;

use Lib\Db\Contracts\DbConnectionInterface;

class Connection implements DbConnectionInterface
{
    const DB_HOST = 'localhost';
    const DB_USER = '';
    const DB_PASSWORD = '';
    const DB_DATA = '';

    public static function getDbHost()
    {
        return self::DB_HOST;
    }

    public static function getDbUser()
    {
        return self::DB_USER;
    }

    public static function getDbPassword()
    {
        return self::DB_PASSWORD;
    }

    public static function getDbData()
    {
        return self::DB_DATA;
    }
}
