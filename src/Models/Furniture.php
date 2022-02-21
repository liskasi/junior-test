<?php

namespace src\Models;

class Furniture extends Product
{
    //getters and setters here.... https://www.giuseppemaccario.com/how-to-build-a-simple-php-mvc-framework/
    public function setId(){}


    protected function setAttribute($fields)
    {
        $fields['attribute'] = $fields['height'] . "x" . $fields['width']. "x" . $fields['length'];
        return $fields['attribute'];
    }

    function prepareInsert($fields)
    {
        $fields = $this->deleteFields($fields);

        $attribute = $this->setAttribute($fields);

        unset($fields['height']);
        unset($fields['width']);
        unset($fields['length']);
        $fields['attribute'] = $attribute;
        $this->insert($fields);
    }
}