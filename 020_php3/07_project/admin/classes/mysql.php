<?php

namespace rpsteinbrueck\jwe23\classes;

class mysql {

    # singleton implementation start
    private static ?mysql $instance = null;

    public static function get_instance(): mysql {
        if(!self::$instance) {
            self::$instance = new mysql();
        }
        return self::$instance;
    }
    # singleton implementation end


    private \mysqli $conn;

    private function __construct() {
        $this->connect();
    }
    
    public function connect() {
        $this->conn = new \mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
        $this->conn->set_charset('utf8mb4');
    }

    public function escape (string $input) {
        return $this->conn->real_escape_string($input);
    }

    public function query(string $input): \mysqli_result|bool {
        $result =  $this->conn->query($input);
        # Debug
        # echo "<pre"; print_r($result);
        return $result;
    }
}

?>