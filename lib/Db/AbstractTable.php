<?php
namespace Lib\Db\Abstracts;

use Lib\Db\Connection;

abstract class DbTable
{
    public function getTable()
    {
        /*
        Must match class name product and table name product
        */
        return Connection::getDbData() . '.' . strtolower((new \ReflectionClass($this))->getShortName());
    }
}


