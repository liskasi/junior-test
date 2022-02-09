<?php

namespace src\Models\Routing;



use src\Controllers\BookController;
use src\Controllers\DVDController;
use src\Controllers\FurnitureController;
use src\Controllers\PageController;

class DBRoutes implements Routes
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getRoutes(): array
    {
        $pageController = new PageController();
        $furnitureController = new FurnitureController();
        $dvdController = new DVDController();
        $bookController = new BookController();

        $routes = [
            '/test' => [
              'GET' => [
                  'controller' => $pageController,
                  'action' => 'test'
              ]
            ],
            '/test/name' => [
              'POST' => [
                  'controller' => $bookController,
                  'action' => 'insertTest'
              ]
            ],
            '/add-product/DVD' => [
                'POST' => [
                    'controller' => $dvdController,
                    'action' => 'insertProduct'
                ]
            ],
            '/add-product/Book' => [
                'POST' => [
                    'controller' => $bookController,
                    'action' => 'insertProduct'
                ]
            ],
            '/add-product/Furniture' => [
                'POST' => [
                    'controller' => $furnitureController,
                    'action' => 'insertProduct'
                ]
            ],
            '/add-product' => [
                'GET' => [
                    'controller' => $pageController,
                    'action' => 'getForm'
                ]
            ],
            '/add-product/cancel' => [
                'GET' => [
                    'controller' => $pageController,
                    'action' => 'cancel'
                ]
            ],
            '/' => [
                'GET' => [
                    'controller' => $pageController,
                    'action' => 'home'
                ]
            ]
        ];
        return $routes;
    }

    private function loadTemplate($templateFileName, $variables = []) {
        extract($variables);

        ob_start();
        include  __DIR__ . '/../../Views/'.$templateFileName;

        return ob_get_clean();
    }


    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $routes = $this->getRoutes();
        $callback = $routes[$path][$method] ?? false;

        if ($callback === false)
        {
            echo "Not found";
            exit;
        }

        $controller = $routes[$path][$method]['controller'];
        $action = $routes[$path][$method]['action'];
        $page = $controller->$action();

        if (isset($page['variables'])) {
            $output = $this->loadTemplate($page['template'], $page['variables']);
        }
        else {
            $output = $this->loadTemplate($page['template']);
        }

        echo $this->loadTemplate('layout.html.php', ['output' => $output]);

    }
}