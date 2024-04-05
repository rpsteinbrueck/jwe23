<?php

# do not use this type of class
class magic {

    # saves all properties over __set() that do not exist
    private array $data = array();

    # if a property gets set which isn't defined __set()-magic-method will be used
    public function __set($property, $value) {
        $this->data[$property] = $value;
    }

    # if a property is set which wasn't initially defined use __get()-magic-method to retrieve value
    public function __get($property) {
        return $this->data[$property];
    }

    # if a method has been called which does not exist
    public function __call($method, $parameter) {
        echo "This method was called " . $method . "!";
        echo "<pre>";
        print_r($parameter);
        echo "</pre>";
    }

    # default value given if an object is echo'd
    public function __toString() {
        return print_r($this->data, true);
        #return "Some output the developer defined";
    }

}


?>