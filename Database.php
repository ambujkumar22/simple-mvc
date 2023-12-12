<?php

class Database {
    public $connection;

    public function __construct($config, $username = 'root', $password = '') {
        $db_query = http_build_query($config,'',';');
        $dsn = "mysql:{$db_query}";
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query = ''){
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
    }
}