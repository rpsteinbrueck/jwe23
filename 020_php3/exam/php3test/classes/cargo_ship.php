<?php


#########################
# namespace
#########################
namespace rpsteinbrueck\php3test\classes;

use rpsteinbrueck\php3test\classes\container_small;
use rpsteinbrueck\php3test\classes\container_big;


#########################
# class
#########################
class cargo_ship implements \Iterator {

    #########################
    # properties
    #########################
    private array $containers = array();
    private int $amount_of_container = 0;
    private float $cruising_speed;

    #########################
    # magic methods
    #########################
    public function __construct(float $cruising_speed) {
        $this->cruising_speed =  $cruising_speed;
    }

    #########################
    # methods
    #########################
    public function travel_time(int $distance): float {
        return $distance / $this->cruising_speed;
    }

    public function add_container(container_big|container_small $container): void {
        array_push($this->containers, $container);
        if ($container::class == "rpsteinbrueck\php3test\classes\container_big") {
            $this->amount_of_container+=2;
        } else {
            $this->amount_of_container++;
        }
    }

    public function weight(): float {
        $total_weight = 0;
        foreach ($this->containers as $container) {
            $total_weight += $container->is_weight();
        }
        return $total_weight;
    }

    public function amount_of_containers(): int {
        return $this->amount_of_container;
    }

    #########################
    # iterator methods
    #########################
    # iterator interace implemation
    # public current(): mixed
    # public key(): mixed
    # public next(): void
    # public rewind(): void
    # public valid(): bool
    private int $index= 0;

    public function current(): mixed {
        return $this->containers[ $this->index ];
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
        return isset($this->containers [$this->index]);
    }
    
}