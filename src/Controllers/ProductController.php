<?php
namespace src\Controllers;

use src\Models\Product;
use src\Models\Routing\Routes;

abstract class ProductController
{
    abstract function insertProduct($fields, Routes $routes);
}