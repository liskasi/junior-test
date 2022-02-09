<?php

namespace src\Models\Routing;

class EntryPoint
{
    private $path;
    private $method;
    private $routes;
    public function __construct(string $path, string $method, \src\Models\Routing\Routes $routes)
    {
        $this->path = $path;
        $this->routes = $routes;
        $this->method = $method;
        $this->checkUrl();
    }

    private function checkUrl() {
        if ($this->path !== strtolower($this->path)) {
            http_response_code(301);
            header('location: ' . strtolower($this->path));
        }
    }

    public function run() {

        $routes = $this->routes->getRoutes();


    }

}