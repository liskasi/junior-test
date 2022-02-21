<?php

namespace src\Models\DBConnect;


trait SingletonTrait
{
    private static $instance = null;

    protected $connection;
    private $host = 'localhost';
    private $dbName = 'junior-test';
    private $username = 'root';
    private $password = '';

    private function __construct()
    {
        try
        {
            $pdo = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName . '; charset=utf8';
            self::$instance = new \PDO($pdo, $this->username, $this->password);
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    private function __clone(){}

    private function __wakeup(){}

    public static function getInstance()
    {
        if (!self::$instance)
        {
            new self();
        }
        return self::$instance;
    }
}