<?php

namespace src\Models;

use src\Models\DBConnect\DB;

abstract class Product
{
    abstract protected function setAttribute($fields);

    abstract function prepareInsert($fields);

    public function insert($fields)
    {
        $db = DB::getInstance();

        $query = "INSERT INTO product (id, sku, name, price, type, attribute) VALUES (?,?,?,?,?,?)";

        $stmt = $db->prepare($query);
        $stmt->bindParam($fields->getSKU(), $fields->getName(), $fields->getPrice(), $fields->getType(), $fields->getAttribute());
        $stmt->execute();
    }

    public function delete ($array)
    {
        foreach ($array as $id)
        {
            $db = DB::getInstance();

            $query = "DELETE FROM product WHERE id = :id";

            $stmt = $db->prepare($query);
            $stmt->bindParam($id->getId());
            $stmt->execute();
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

    public function getProducts()
    {
        $db = DB::getInstance();

        $query = "SELECT id, sku, name, price, type, attribute FROM product ORDER BY product.id ASC";

        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}