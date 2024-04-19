<?php

#########################
# namespace
#########################
namespace rpsteinbrueck\php3test\classes\abstract;


#########################
# abstract class
#########################
abstract class container_abstract {

    #########################   
    # properties
    #########################
    protected float $empty_weight;
    protected float $payload;
    private float $weight_of_goods;

    #########################
    # magic methods
    #########################
    public function __construct(float $weight_of_goods) {
        if ($weight_of_goods > $this->payload) {
            throw new \Exception("Warengewicht " . $weight_of_goods . " kann nicht mehr als die: Nutzlast " . $this->payload . " sein!");
        }
        $this->weight_of_goods = $weight_of_goods;
    }

    #########################
    # methods
    #########################
    public function weight_of_goods(): float {
        return $this->weight_of_goods;
    }


    public function is_weight(): float {
        return $this->empty_weight + $this->weight_of_goods;
    }

    public function max_total_weight(): float {
        return $this->empty_weight + $this->payload;
    }
}
