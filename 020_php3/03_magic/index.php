<?php

error_reporting(E_ALL);

include "magic_class.php";

$m = new magic();
$m->firstname = "Maria";
$m->surname = "Stellar";

echo "<pre>";
print_r($m);
echo "</pre>";

echo "<br>";

echo $m->firstname;
echo "<br>";
echo $m->surname;
echo "<br>";


$m->save("user01", 5, true, "some random parameter");

echo $m;


?>