<?php

namespace rpsteinbrueck\jwe23\animal\dog;

use rpsteinbrueck\jwe23\animal\dog;

class Hound extends dog {

    public function bark(): string {
        return "Grrrrrrrrrrr!";
    }

    public function bite(): string {
        return "Oooww!!";
    }
}