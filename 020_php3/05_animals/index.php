<?php

# CODE:
#include "animal/animals_abstract.php";
#include "animal/dog.php";
#include "animal/cat.php";
#include "animal/mouse.php";


# COMMENT:
# The autoloader registers klasses with namespaces, which were not included yet,
# The namespaces classes get changed into file locations
# the classes get automatically included
spl_autoload_register(
    function (string $class) {
        $prefix = "rpsteinbrueck\\jwe23\\";
        $prefix_length = strlen($prefix);
        $basis = __DIR__ . "/";

        if (substr($class, 0 , $prefix_length) !== $prefix ) {
            return;
        } else {
            $prefix_without_prefix = substr($class, $prefix_length);
            $include_file = $prefix_without_prefix . ".php";
            $filepath = $basis . $include_file;
            $filepath = str_replace("\\", "/", $filepath);

            if (file_exists($filepath)) {
                include $filepath;
            }
        }
    }
);

# CODE:
#function my_autoload ($pClassName) {
#    include(__DIR__ . "/" . $pClassName . ".php");
#}
#spl_autoload_register("my_autoload");

use rpsteinbrueck\jwe23\animal\dog;
use rpsteinbrueck\jwe23\animal\dog\hound;
use rpsteinbrueck\jwe23\animal\cat;
use rpsteinbrueck\jwe23\animal\mouse;
use rpsteinbrueck\jwe23\animals;


$dog = new dog("Rufus");
#echo $dog->get_name();
#echo "<br>";
#echo $dog->introduce();
#echo "<br>";
#echo $dog->bark();
#echo "<br>";
#echo $dog->favourite_food();
#echo "<br>";


$hound = new hound("alex");
#echo $hound->get_name();
#echo "<br>";
#echo $hound->introduce();
#echo "<br>";
#echo $hound->bark();
#echo "<br>";
#echo $hound->favourite_food();
#echo "<br>";
#echo $hound->bite();
#echo "<br>";


$cat = new cat("Tom");
#echo $cat->get_name();
#echo "<br>";
#echo $cat->introduce();
#echo "<br>";
#echo $cat->meow();
#echo "<br>";
#echo $cat->favourite_food();
#echo "<br>";

$mouse = new mouse("Jerry");
#echo $mouse->get_name();
#echo "<br>";
#echo $mouse->introduce();
#echo "<br>";
#echo $mouse->peep();
#echo "<br>";
#echo $mouse->favourite_food();
#echo "<br>";


$animals = new animals();
$animals->add($dog);
$animals->add($hound);
$animals->add($cat);
$animals->add($mouse);

$animals->add(new mouse("Mickey"));

echo $animals->output();


foreach ($animals as $animal) {
    echo "<br>";
    echo $animal->get_name();
}

?>