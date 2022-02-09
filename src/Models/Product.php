<?php

namespace src\Models;

use src\Models\DBConnect\DB;

abstract class Product
{
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $productType;
    protected $attribute;

    abstract protected function insert($fields);

    abstract protected function setAttribute($fields);

    public function delete ($array)
    {

    }

    public function insertTest($name)
    {
        $db = DB::getInstance();
        $query = "INSERT INTO test (name) VALUES ('" . $name . "')";
        $stmt = $db->exec($query);
    }
}