<?php

namespace Src\Category;

use Src\Products\BasicProduct;
use Lib\Db\DbMySqli as Db;

class Category extends BasicProduct
{
    private $table;

    private $id = 0;

    private $title;

    public function __construct()
    {
        $this->table = $this->getTable();
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $val)
    {
        $this->$name = $val;
    }

    public function __toString()
    {
        return $this->id . ' ' . $this->title;
    }

    public function get_categories()
    {
        Db::connect();

        $query = 'SELECT id, title FROM ' . $this->table . '';

        $result = Db::dbQuery($query, null, null, false);

        if (!$result) {
            return false;
        }
        
        Db::dbClose();
        //var_dump(Db::getRows());
        return Db::getRows();
    }
}



