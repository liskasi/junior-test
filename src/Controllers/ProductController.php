<?php

namespace src\Controllers;

use src\Models\ProductManager;

abstract class ProductController
{
    abstract function insertProduct($fields);

    public function getProducts()
    {
        $product = new ProductManager();
        $data = $product->getProducts();
        $this->sendData($data);
    }

    public function sendData($data)
    {
        http_response_code(200);
        echo json_encode($data);
    }

    public function delete($data)
    {
        $product = new ProductManager();
        $product->delete($data);
    }
}