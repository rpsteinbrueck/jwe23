<?php

#include "animal/animals_abstract.php";
#include "animal/dog.php";
#include "animal/cat.php";
#include "animal/mouse.php";


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

use rpsteinbrueck\jwe23\animal\dog;
use rpsteinbrueck\jwe23\animal\cat;
use rpsteinbrueck\jwe23\animal\mouse;


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