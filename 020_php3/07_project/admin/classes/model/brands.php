<?php

namespace rpsteinbrueck\jwe23\classes\model;

use rpsteinbrueck\jwe23\classes\mysql;
use rpsteinbrueck\jwe23\classes\model\row\brand;

class brands {
    
    public function all_brands(): array {
        $all_brands =  array();
        #$conn = new mysql();
        $conn = mysql::get_instance();
        $results = $conn->query("SELECT * FROM brands ORDER BY brandname ASC");
        while ($row = $results->fetch_assoc()) {
            $all_brands[] = new brand($row);
        }
        return $all_brands;
    }
}

?>