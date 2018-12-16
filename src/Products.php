<?php

namespace Src\Products;

include('../vendor/autoload.php');

use Lib\Db\DbMySqli as Db;

class Products extends BasicProduct
{
    use \Lib\Traits\currencyFormat;

    private $description;

    private $table;

    private $id = 0;

    private $title;

    private $price;

    public function __construct($id = 0)
    {
        if (!empty($id)) {
            $this->id = $id;
        }
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
        return $this->id . ' ' . $this->title . ' ' . $this->toEuro($this->price). ' ' . $this->description . ' ' . $this->category_id;
    }

    public function load($id)
    {
        Db::connect();

        $query = 'SELECT id, title, price, description FROM ' . $this->table . ' WHERE id = ?';

        $result = Db::dbQuery($query, 'i', array($id), true);

        if (!$result) {
            return false;
        }

        $row = Db::getRows();
        
        $this->id = $row['id'];
        $this->title = $row['title'];
        $this->price = $row['price'];
        $this->description = $row['description'];

        Db::dbClose();
        return $this;
    }

    public function load_all()
    {
        Db::connect();

        $query = 'SELECT id, title, price, description FROM ' . $this->table . ' ';

        $result = Db::dbQuery($query, null, null, false);

        if (!$result) {
            return false;
        }
        
        Db::dbClose();
        //var_dump(Db::getRows());
        return Db::getRows();
    }

    public function get_products_by_category($category_id)
    {
        Db::connect();

        $query = 'SELECT id, title, price, description FROM ' . $this->table . ' WHERE category_id = ?';
        
        $result = Db::dbQuery($query, 'i', array((int)$category_id), false);

        if (!$result) {
            return false;
        }

        Db::dbClose();

        return Db::getRows();
    }
}
