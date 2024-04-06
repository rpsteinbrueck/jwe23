<?php

class dog extends animals_abstract {

    public function bark(): string {
        return "Whuuuf!";
    }

    public function favourite_food(): string {
        return "Bone";
    }
}


?>