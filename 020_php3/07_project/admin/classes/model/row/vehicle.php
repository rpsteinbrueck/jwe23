<?php
namespace rpsteinbrueck\jwe23\classes\model\row;

use rpsteinbrueck\jwe23\classes\mysql;

class vehicle {
    private array $data = array();

    public function __construct(array $data) {
        $this->data = $data;
    }

    public function save(): void {
        $conn = new mysql();
        #debug
        print_r($this->data);

        $license_plate = $conn->escape($this->data["license_plate"]);
        $brand = $conn->escape($this->data["brand"]);
        $brand_id_result = $conn->query("SELECT id FROM brands WHERE brandname = '{$brand}';");
        print_r($brand_id_result->fetch_assoc());
        $brand_row = $brand_id_result->fetch_assoc();
        $brand_id = $brand_row["id"];
        $model = $conn->escape($this->data["model"]);
        $model_year = $conn->escape($this->data["model_year"]);
        $color = $conn->escape($this->data["color"]);

        $conn->query(
            "INSERT INTO `cars` (
                    `license_plate`, 
                    `brand_id`, 
                    `model`, 
                    `year_model`, 
                    `color`
                ) VALUES (
                    '{$license_plate}',
                    '{$brand_id["id"]}',
                    '{$model}',
                    '{$model_year}',
                    '{$color}'
                );"
        );
    }
}