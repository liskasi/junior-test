<?php

namespace src\Models\Routing;

class Application
{
    public $router;
    public $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->router = new DBRoutes($this->request);
    }

    public function run()
    {
        $this->router->resolve();
    }
}