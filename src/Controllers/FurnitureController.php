<?php
namespace src\Controllers;

use src\Models\Furniture;
use src\Models\Routing\Routes;

class FurnitureController extends ProductController
{
    public function insertProduct($fields)
    {
        $furniture = new Furniture();
        $furniture->prepareInsert($fields);
        var_dump('Success');
    }

}