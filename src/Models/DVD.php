<?php

namespace src\Models;

class DVD extends Product
{
    function prepareInsert($fields)
    {
        $fields = $this->deleteFields($fields);

        $attribute = $this->setAttribute($fields['size']);
        $fields['attribute'] = $attribute;

        unset($fields['size']);

        return $fields;
    }

    protected function setAttribute($fields)
    {
        return $fields . "MB";
    }

}