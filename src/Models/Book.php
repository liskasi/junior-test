<?php

namespace src\Models;

class Book extends Product
{
    public function prepareInsert($fields)
    {
        $fields = $this->deleteFields($fields);

        $attribute = $this->setAttribute($fields['weight']);
        $fields['attribute'] = $attribute;

        unset($fields['weight']);

        return $fields;
    }

    protected function setAttribute($fields)
    {
        return $fields . "KG";
    }
}