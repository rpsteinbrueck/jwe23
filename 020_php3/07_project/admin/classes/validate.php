<?php
namespace rpsteinbrueck\jwe23\classes;

class validate {
    private array $errors = array();

    public function check_if_set(string $variable_to_be_checked, string $description ): bool {
        if (empty($variable_to_be_checked)) {
            array_push($this->errors, $description . " is empty");
            return false;
        } 
        return true;
    }

    public function is_license_plate(string $license_plate, string $description): bool {
        # regex to check if license plate is not a-z, 0-9 or -. everything else gets an error
        if (preg_match("/[^A-Z0-9\-]/i", $license_plate)) {
            array_push($this->errors, $description . " -  contains a different character other than A-Z, 0-9 and a \"-\" minus sign");
            return false;
        }

        if (strlen($license_plate) < 3 || strlen($license_plate) > 8 ){
            array_push($this->errors, $description . " - license plate must contain more than 3 characters and less than 8 characters");
            return false;
        }
        return true;
    }

    public function is_a_year(int $year, string $description): bool {
        if (!is_numeric($year) && $year <= 1900 && $year > idate("Y")){
            array_push($this->errors, $description . " - must be a year between 1900 and current year - " . date("Y"));
            return false;
        }
        return true;
    }

    public function html_errors(): string {

        if (empty($this->errors)) {
            return "";
        }

        $output = "";
        $output .= '<div class="alert alert-danger" role="alert">';
        foreach($this->errors as $error) {
            $output .=  '<li style="margin-left: 20px;">' .  $error . '</li>';
        }
        $output .= "</div>";

        return $output;
    }

    public function no_errors(): bool {
        return empty($this->errors);
    }

    public function add_error(string $error): void {
        array_push($this->errors, $error);
    }

}

?>