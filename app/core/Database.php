<?php

use Medoo\Medoo;

require_once __DIR__ . '/../../vendor/autoload.php';

class Database {
    private $type = "mysql";
    private $host = "localhost";
    private $name = "wp_techworms";
    private $user = "root";
    private $pass = "";

    private $connection;

    public function __construct() {
        $this->connection = new Medoo([
            'type' => $this->type,
            'host' => $this->host,
            'database' => $this->name,
            'username' => $this->user,
            'password' => $this->pass
        ]);
    }

    public function getConnection() {
        return $this->connection;
    }
}