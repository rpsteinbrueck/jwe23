<?php

# extends RANDOM_ABSTRACT_CLASS copies all properties and methods 
# which are not declared private) from the given parent class
class dog extends animals_abstract {

    public function bark(): string {
        return "Whuuuf!";
    }

    public function favourite_food(): string {
        return "Bone";
    }
}

?>