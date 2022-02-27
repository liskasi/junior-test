<?php

namespace src\Controllers;

use src\Models\DVD;

class DVDController extends ProductController
{
    public function insertProduct($fields)
    {
        $dvd = new DVD();
        $updatedFields = $dvd->prepareInsert($fields);
        $dvd->insert($updatedFields);
    }
}