<?php
namespace rpsteinbrueck\jwe23;

use rpsteinbrueck\jwe23\animal\animals_abstract;


class animals implements animal_interface, \Iterator {
    private array $herd_of_animals = array();

    public function add(animals_abstract $animals): void {
        array_push($this->herd_of_animals, $animals);
        #$this->herd_of_animals[] = $animal;
    }

    public function output(): string {
        $ret = "";
        foreach($this->herd_of_animals as $animal) {
            $ret .= $animal->get_name() . "<br>";

            if ($animal instanceof cat) {
                $ret .= $animal->meow() . "<br>";
            }
        }
        return $ret;
    }

    # iterator interace implemation
    # public current(): mixed
    # public key(): mixed
    # public next(): void
    # public rewind(): void
    # public valid(): bool
    private int $index= 0;

    public function current(): mixed {
        return $this->herd_of_animals[ $this->index ];
    }
    public function key(): mixed {
        return $this->index;
    }
    public function next(): void {
        ++$this->index;
    }
    public function rewind(): void {
        $this->index = 0;
    }
    public function valid(): bool {
        return isset($this->herd_of_animals [$this->index]);
    }
}


?>