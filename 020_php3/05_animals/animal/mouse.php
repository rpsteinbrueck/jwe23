<?php
namespace rpsteinbrueck\jwe23\animal;

# extends RANDOM_ABSTRACT_CLASS copies all properties and methods 
# which are not declared private) from the given parent class
class mouse extends animals_abstract {

    public function get_name(): string {
        $name = parent::get_name();
        return $name . " (mouse)";
    }

    public function peep(): string {
        return "peep peep";
    }

    public function favourite_food(): string {
        return "Cheese";
    }

}

?>