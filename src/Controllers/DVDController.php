<?php
namespace src\Controllers;

use src\Models\DVD;
use src\Models\Routing\Routes;

class DVDController extends ProductController
{
    public function insertProduct($fields, Routes $routes)
    {
        $book = new DVD();
        $book->insert($fields);
        header();

    }

}