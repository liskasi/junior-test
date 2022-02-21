<?php

namespace src\Models;

class Book extends Product
{
    //getters and setters here.... https://www.giuseppemaccario.com/how-to-build-a-simple-php-mvc-framework/
    public function setId(){}


    public function prepareInsert($fields)
    {
        $fields = $this->deleteFields($fields);
        $attribute = $this->setAttribute($fields['weight']);
        $fields['attribute'] = $attribute;
        unset($fields['weight']);
        return $this->insert($fields);
    }

    protected function setAttribute($fields)
    {
        return $fields . "KG";
    }
}