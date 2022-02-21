<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header('Content-Type: application/json');
try {
    require_once realpath("../vendor/autoload.php");

    $app = new \src\Models\Routing\Application();
    $app->run();
}
catch (PDOException $e)
{
    $output = 'Database error: ' . $e->getMessage() . ' in ' .
        $e->getFile() . ':' . $e->getLine();
    echo $output;
}
