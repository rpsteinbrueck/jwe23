<?php
namespace rpsteinbrueck\jwe23;

use rpsteinbrueck\jwe23\animal\animals_abstract;


# interfaces are building instructions for classes
# whn a class implements this interface, the class must have all methods
interface animal_interface {
    public function add(animals_abstract $animals): void;
    

}


?>