<?php

namespace src\classes;

abstract class Product
{
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $productType;
    protected $attribute;

    //getters and setters here.... https://www.giuseppemaccario.com/how-to-build-a-simple-php-mvc-framework/
    public function getId()
    {
        return $this->id;
    }
    //...

    abstract protected function insert($fields);

    abstract protected function setAttribute($fields);

    public function delete ($array)
    {

    }

    public function insertTest($name)
    {
        $query = "INSERT INTO `test`(`name`) VALUES (" . $name . ")";
        echo $this->pdo->exec($query);
    }
}