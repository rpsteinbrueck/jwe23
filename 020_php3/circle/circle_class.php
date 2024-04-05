<?php

/** 
 * These blocks are examples for "phpDoc" / "DocBlock"
 * and can be processed with phpDocumentor 
 */

class circle {
    private $radius;

    const PI = 3.1415;

    /** 
    * function __construct to create object for circle
    * @param int|float $radius
    */
    public function __construct(float $radius) {
        $this->set_radius($radius);
    }

    # __destruct() gets executed when the script is done or when the object is unset()
    # emptying RAM obviously otherwise RAM would run full
    # always used to save data, does not matter what happens exeptions etc

    #public function __destruct() {
    #    $this;
    #}

    /** 
    * function to get radius
    * @return cirlce radius
    */
    public function get_radius() {
        return $this->radius;
    }

    /** 
    * function to set radius
    * @param int|float $new_radius
    * @return void set new radius, even if the cirlce already exists
    * @throws Exception
    */
    public function set_radius(float $new_radius): void {
        if ($new_radius <= 0) {
            throw new Exception("Radius must be bigger than 0!");   
        }
        $this->radius = $new_radius;
    }

    /** 
    * function to calculate area from give radius
    * @return float calulated area
    */
    public function area(): float {
        # A = π r²
        #return pow($this->radius, 2) * pi();

        # Paamayim Nekudotayim
        return pow($this->radius, 2) * self::PI ;
    }

    /** 
    * function to calculate circumference from give radius
    * @return float calulated circumference
    */
    public function circumference(): float {
        #  C= 2π r 
        #return pow($this->radius, 2) * pi();
        return 2 * self::PI * $this->radius;
    }

    /** 
    * function to calculate diameter from give radius
    * @return float calulated diameter
    */
    public function diameter(): float {
        # D = Radius × 2
        return $this->radius * 2;
    }
    
}