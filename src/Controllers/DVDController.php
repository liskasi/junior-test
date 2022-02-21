<?php
namespace src\Controllers;

use src\Models\DVD;
use src\Models\Routing\Routes;

class DVDController extends ProductController
{
    public function insertProduct($fields)
    {
        $dvd = new DVD();
        $dvd->prepareInsert($fields);
//        header('http://localhost:3000/');
    }

}