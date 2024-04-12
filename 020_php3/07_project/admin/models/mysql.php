<?php

namespace rpsteinbrueck\jwe23\models;

class mysql {
    private \mysqli $conn;

    public function __construct() {
        $this->connect();
    }
    
    public function connect() {
        $this->conn = new \mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
        $this->conn->set_charset('utf8mb4');
    }

    public function escape ($input) {
        return $this->conn->real_escape_string($input);
    }
}

?>