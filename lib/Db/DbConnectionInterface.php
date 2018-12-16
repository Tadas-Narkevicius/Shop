<?php
namespace Lib\Db\Contracts;

interface DbConnectionInterface
{
    public static function getDbHost();

    public static function getDbUser();

    public static function getDbPassword();

    public static function getDbData();
}
