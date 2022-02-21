<?php
namespace src\Controllers;


class PageController
{
    public function home(): array
    {
        return ['template' => 'plp.php'];
    }
    public function test(): array
    {
        return ['template' => 'test.html.php'];
    }
    public function getForm(): array
    {
        return ['template' => 'addproduct.php'];
    }
}