<?php
include "functions.php";
is_logged_in();

#unset($_SESSION["logged_in"]);

if (empty($_GET["site"])) {
    $site = "home";
  } else {
    $site = $_GET["site"];
  }
  
  // Prüfen, ob in $site ein gültiger Wert steht (nicht manipuliert)
  if ($site == "home") {
    $content = "content/home.php";
    $title = "home";
  } else if ($site == "ingredients_list") {
    $content = "content/ingredients_list.php";
    $title = "ingredients";
  } else if ($site == "ingredient_new") {
    $content = "content/ingredient_new.php";
    $title = "new ingredient";
  } else {
    // site gibt's bei uns nicht -> error 404 ausgeben
    header("HTTP/1.0 404 Not Found"); // für Suchmaschine
    $content = "content/404.php";
    $title = "Error 404";
  }

include "head.php";
#print_r($_GET);
include $content;
include "footer.php";
?>