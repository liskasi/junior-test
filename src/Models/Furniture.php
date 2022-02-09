<?php

namespace src\Models;

class Furniture extends Product
{
    //getters and setters here.... https://www.giuseppemaccario.com/how-to-build-a-simple-php-mvc-framework/
    public function getId()
    {
        return $this->id;
    }
    public function getSKU(){}
    //...
    public function setId(){}


    protected function setAttribute($fields)
    {

    }
    public function insert($fields)
    {
        // TODO: Implement insert() method.
    }
}