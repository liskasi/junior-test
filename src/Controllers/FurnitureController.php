<?php

namespace src\Controllers;

use src\Models\Furniture;

class FurnitureController extends ProductController
{
    public function insertProduct($fields)
    {
        $furniture = new Furniture();
        $updatedFields = $furniture->prepareInsert($fields);
        $furniture->insert($updatedFields);
    }
}