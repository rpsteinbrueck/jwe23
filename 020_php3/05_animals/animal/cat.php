<?php
namespace rpsteinbrueck\jwe23\animal;

# extends RANDOM_ABSTRACT_CLASS copies all properties and methods 
# which are not declared private) from the given parent class
class cat extends animals_abstract {

    public function meow(): string {
        return "meow meow meow";
    }

    public function favourite_food(): string {
        return "Mouse";
    }

}

?>