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

//            $this->connection = new \PDO($pdo, $this->username, $this->password);
//            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
//            self::$instance = $this->connection;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    private function __clone(){}

    private function __wakeup(){}

    public static function getInstance()
    {
        if (!self::$instance) {
            new self();
        }

        return self::$instance;
    }
//        $class = static::class;
//        if (!isset(self::$instance[$class])) {
//            self::$instance[$class] = new static();
//        }
//
//        return self::$instance[$class];
//        return self::$instance ?? (self::$instance = new self());
//        return self::$instance;
//          return static::$instance ?? (static::$instance = new static());
          //return static::$instance;

//        if(!(self::$instance))
//        {
//            self::$instance = new self();
//        }
//
//        echo "<pre>";
//        var_dump(self::$instance);
//        echo "</pre>";
//
//        return self::$instance;
//    }

//    public static function setCharsetEncoding() {
//        if (self::$instance == null) {
//            self::connect();
//        }
//
//        self::$instance->exec(
//            "SET NAMES 'utf8';
//			SET character_set_connection=utf8;
//			SET character_set_client=utf8;
//			SET character_set_results=utf8");
//    }
}