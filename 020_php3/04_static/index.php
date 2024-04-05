<?php

include "static_class.php";
echo static_c::$id;
echo "<br>";
$new_object = new static_c();
echo static_c::$id;
echo "<br>";
$new_object = new static_c();
$new_object = new static_c();
$new_object = new static_c();
$new_object = new static_c();
echo static_c::$id;

static_c::set_0();

echo "<br>";
$new_object = new static_c();
$new_object = new static_c();
echo static_c::$id;



?>