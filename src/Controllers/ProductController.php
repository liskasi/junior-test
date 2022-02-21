<?php
namespace src\Controllers;

use src\Models\DVD;

abstract class ProductController
{
    abstract function insertProduct($fields);

    public function getProducts()
    {
        $url = "http://localhost:3000/";

        $product = new DVD();
        $data = $product->getProducts();
        $this->sendData($url, $data);
    }

    public function sendData($url, $data)
    {
        http_response_code(200);
        echo json_encode($data);
    }
}