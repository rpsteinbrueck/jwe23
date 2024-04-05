<?php

# define a class
class person {

    # properties
    # private properties and public properties:
    # private properties can only be accessed inside the object
    # public properties can be accessed from outside aswell as inside
    private $firstname;
    private $surname;
    private $age;
    private $height;
    private $eyecolor;

    # construtor: gets called when the object gets created
    public function __construct($firstname, $surname, $age, $height, $eyecolor) {
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->age = $age;
        $this->height = $height;
        $this->eyecolor = $eyecolor;
    }

    # introduction 
    public function introduce() {
        return "Hi my name is " . $this->firstname . " " . $this->surname  . ".\n" . "I am " . $this->age . "years old, have " . $this->eyecolor . " eyes and I am " . $this->height . " tall.";
    }

    # get methods for this object
    public function get_firstname() {
        return $this->firstname;
    }
    public function get_surname() {
        return $this->surname;
    }
    public function get_age() {
        return $this->age;
    }
    public function get_height() {
        return $this->height;
    }
    public function get_eyecolor() {
        return $this->eyecolor;
    }


    # set method for this object
    public function set_firstname($new_firstname) {
        # through this method we have the possibility to create 
        # conditionals statements before changing the properties

        if ( $this->firstname == $new_firstname) {
            echo "Not going to rename to the same name";
        } else {
            $this->firstname = $new_firstname;
        }
    }
}



?>