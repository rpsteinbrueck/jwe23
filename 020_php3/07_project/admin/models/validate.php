<?php
namespace rpsteinbrueck\jwe23\models;

class validate {
    private array $errors = array();

    public function check_if_set(string $variable_to_be_checked, string $description): bool {
        if (empty($variable_to_be_checked)) {
            array_push($this->errors, $description . " is empty");
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
        return !empty($this->errors);
    }

}

?>