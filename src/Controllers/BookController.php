<?php

namespace src\Controllers;

use src\Models\Book;

class BookController extends ProductController
{
    public function insertProduct($fields)
    {
        $book = new Book();
        $updatedFields = $book->prepareInsert($fields);
        $book->insert($updatedFields);
    }
}