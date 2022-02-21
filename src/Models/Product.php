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

    //getters
    public function getId()
    {
        return $this->id;
    }
    public function getSKU()
    {
        return $this->sku;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getType()
    {
        return $this->productType;
    }
    public function getAttribute()
    {
        return $this->attribute;
    }


    public function insert($fields)
    {
        $db = DB::getInstance();

        $query = 'INSERT INTO product (';

        foreach ($fields as $key => $value) {
            $query .= '`' . $key . '`,';
        }

        $query = rtrim($query, ',');

        $query .= ') VALUES (';


        foreach ($fields as $key => $value) {
            $query .= ':' . $key . ',';
        }

        $query = rtrim($query, ',');

        $query .= ')';

        $stmt = $db->prepare($query);
        $stmt->execute($fields);
    }

    abstract protected function setAttribute($fields);

    abstract function prepareInsert($fields);

    public function delete ($array)
    {
//        foreach ($array as $key => $id)
        foreach ($array as $id)
        {
            $db = DB::getInstance();

            $parameters = [':id' => $id];
            $query = "DELETE FROM product WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->execute($parameters);
        }
    }

    public function deleteFields($fields)
    {
        foreach ($fields as $name => $value)
        {
            if (!$value)
            {
                unset($fields[$name]);
            }
        }
        return $fields;
    }

    public function insertTest($name)
    {
        $db = DB::getInstance();
        $query = "INSERT INTO test (name) VALUES ('" . $name . "')";
        $stmt = $db->exec($query);
    }

    public function getProducts()
    {
        $db = DB::getInstance();
        $query = "SELECT id, sku, name, price, type, attribute FROM product";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}