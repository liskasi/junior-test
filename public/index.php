<?php
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
