<?php

namespace src\DBConnect;

class DB
{
    use SingletonTrait;

    public function insert($fields)
    {
        $query = 'INSERT INTO `' . $this->table . '` (';

        foreach ($fields as $key => $value) {
            $query .= '`' . $key . '`,';
        }

        $query = rtrim($query, ',');

        $query .= ') VALUES (';


        foreach ($fields as $key => $value) {
            $query .= ':' . $key . ',';
        }

        $query = rtrim($query, ',');

        $query .= ')';

        $fields = $this->processDates($fields);

        $this->query($query, $fields);

        return $this->pdo->lastInsertId();
    }

    public function insertTest($name)
    {
        $query = "INSERT INTO `test`(`name`) VALUES (" . $name . ")";
        echo $this->pdo->exec($query);
    }
}