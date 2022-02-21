<?php
namespace src\Controllers;

use src\Models\Book;
use src\Models\Routing\Routes;

class BookController extends ProductController
{
    public function insertProduct($fields)
    {
        $book = new Book();
        $book->prepareInsert($fields);
        var_dump('Success');
    }

    public function insertTest()
    {
        $book = new Book();
        $n=$_POST["name"];
        $book->insertTest($n);
    }
}