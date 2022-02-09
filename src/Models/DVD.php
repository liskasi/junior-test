<?php
namespace src\Models;

class DVD extends Product
{
    //getters and setters here.... https://www.giuseppemaccario.com/how-to-build-a-simple-php-mvc-framework/
    public function getId()
    {
        return $this->id;
    }
    public function getSKU(){}
    //...
    public function setId(){}

    public function insert($fields)
    {
        // TODO: Implement insert() method.
    }

    protected function setAttribute($fields)
    {
        // TODO: Implement setAttribute() method.
    }
}