<?php

include "animal/animals_abstract.php";
include "animal/dog.php";
include "animal/cat.php";
include "animal/mouse.php";

$dog = new dog("Rufus");
echo $dog->get_name();
echo "<br>";
echo $dog->introduce();
echo "<br>";
echo $dog->bark();
echo "<br>";
echo $dog->favourite_food();
echo "<br>";


$cat = new cat("Tom");
echo $cat->get_name();
echo "<br>";
echo $cat->introduce();
echo "<br>";
echo $cat->meow();
echo "<br>";
echo $cat->favourite_food();
echo "<br>";

$mouse = new mouse("Jerry");
echo $mouse->get_name();
echo "<br>";
echo $mouse->introduce();
echo "<br>";
echo $mouse->peep();
echo "<br>";
echo $mouse->favourite_food();
echo "<br>";

?>