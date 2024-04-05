<?php

class static_c {

    # a static property belongs to a class which was created onse
    static public int $id = 0;

    public static function set_0() {
        self::$id = 0;
    }

    public $name;

    public function __construct(){
        self::$id++;
    }

}

?>