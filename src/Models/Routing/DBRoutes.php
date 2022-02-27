<?php

namespace src\Models\Routing;

use src\Controllers\BookController;
use src\Controllers\DVDController;
use src\Controllers\FurnitureController;
use src\Controllers\ProductManagerController;

class DBRoutes implements Routes
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getRoutes(): array
    {
        $furnitureController = new FurnitureController();
        $dvdController = new DVDController();
        $bookController = new BookController();
        $productController = new ProductManagerController();

        $routes = [
            '/delete' => [
                'POST'=> [
                    'controller' => $productController,
                    'action' => 'delete'
                ]
            ],
            '/add-product/dvd' => [
                'POST' => [
                    'controller' => $dvdController,
                    'action' => 'insertProduct'
                ]
            ],
            '/add-product/book' => [
                'POST' => [
                    'controller' => $bookController,
                    'action' => 'insertProduct'
                ]
            ],
            '/add-product/furniture' => [
                'POST' => [
                    'controller' => $furnitureController,
                    'action' => 'insertProduct'
                ]
            ],
            '/' => [
                'GET' => [
                    'controller' => $productController,
                    'action' => 'getProducts'
                ]
            ]
        ];
        return $routes;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $routes = $this->getRoutes();
        $data = $this->request->getBody();
        $callback = $routes[$path][$method] ?? false;

        if ($callback === false)
        {
            echo "Not found";
            exit;
        }

        $controller = $routes[$path][$method]['controller'];
        $action = $routes[$path][$method]['action'];
        if(!$data)
        {
            $page = $controller->$action();
        }
        else
        {
            $page = $controller->$action($data);
        }
    }
}