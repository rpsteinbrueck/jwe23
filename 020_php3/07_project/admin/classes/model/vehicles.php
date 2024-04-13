<?php
namespace rpsteinbrueck\jwe23\classes\model;
use rpsteinbrueck\jwe23\classes\mysql;
use rpsteinbrueck\jwe23\classes\model\row\vehicle;

class vehicles {
    public function all_vehicles(): array {
        $all_vehicles = array();
        $conn = new mysql();
        $result = $conn->query("SELECT * FROM cars ORDER BY id ASC");
        while ($row = $result->fetch_assoc()) {
            $all_vehicles[] = new vehicle($row);
        }
        return $all_vehicles;
    }
}


?>