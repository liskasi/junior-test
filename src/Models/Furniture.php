<?php

namespace src\Models;

class Furniture extends Product
{
    function prepareInsert($fields)
    {
        $fields = $this->deleteFields($fields);

        $attribute = $this->setAttribute($fields);

        unset($fields['height']);
        unset($fields['width']);
        unset($fields['length']);

        $fields['attribute'] = $attribute;

        return $fields;
    }

    protected function setAttribute($fields)
    {
        $fields['attribute'] = $fields['height'] . "x" . $fields['width'] . "x" . $fields['length'];
        return $fields['attribute'];
    }
}