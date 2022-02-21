<?php
namespace src\Models;

class DVD extends Product
{
    //getters and setters here.... https://www.giuseppemaccario.com/how-to-build-a-simple-php-mvc-framework/
    public function setId(){}

    protected function setAttribute($field)
    {
        return $field . "MB";
    }

    function prepareInsert($fields)
    {
        $fields = $this->deleteFields($fields);
        $attribute = $this->setAttribute($fields['size']);
        $fields['attribute'] = $attribute;
        unset($fields['size']);
        var_dump($fields);
        return $this->insert($fields);
    }
}