<?php
namespace src\Controllers;

use src\Models\Furniture;
use src\Models\Routing\Routes;

class FurnitureController extends ProductController
{
    public function insertProduct($fields, Routes $routes)
    {
        $book = new Furniture();
        $book->insert($fields);
        header();
    }

}