<?php

namespace src\Routing;

use src\classes\Book;
use src\classes\DVD;
use src\classes\Furniture;

class DBRoutes implements Routes
{
    public function __construct()
    {

    }

    public function getRoutes(): array
    {
        $furnitureController = new Furniture();
        $dvdController = new DVD();
        $bookController = new Book();

        $routes = [
            'add-product' => [
                'POST' => [
                    'controller' => $furnitureController,
                    'action' => 'insert'
                ]
            ],
            '' => [
                'GET' => [
                    'controller' => $furnitureController,
                    'action' => 'home'
                ]
            ]
        ];
    }
}