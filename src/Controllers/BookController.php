<?php
namespace src\Controllers;

use src\Models\Book;
use src\Models\Routing\Routes;

class BookController extends ProductController
{
    public function insertProduct($fields, Routes $routes)
    {
        $book = new Book();
        $book->insert($fields);
    }

    public function insertTest()
    {
        $book = new Book();
        $n=$_POST["name"];
        $book->insertTest($n);
    }
}