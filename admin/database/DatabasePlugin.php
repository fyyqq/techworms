<?php

use Medoo\Medoo;

require TW_DIR . "vendor/autoload.php";

class DatabasePlugin {
    private $type = DB_TYPE_PLUGIN;
    private $host = DB_HOST_PLUGIN;
    private $name = DB_NAME_PLUGIN;
    private $user = DB_USER_PLUGIN;
    private $pass = DB_PASS_PLUGIN;

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