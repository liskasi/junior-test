<?php

namespace src\DBConnect;


trait SingletonTrait
{
    private static $instance = false;

    protected $connection;
    private $host = 'localhost';
    private $dbName = 'junior-test';
    private $username = 'root';
    private $password = '';

    private function __construct()
    {
        try {
            $pdo = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName . '; charset=utf8';
            $this->connection = new \PDO($pdo, $this->username, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    private function __clone(){}

    private function __wakeup(){}

    static public function getInstance()
    {
        return static::$instance ?? (static::$instance = new static());
    }
}