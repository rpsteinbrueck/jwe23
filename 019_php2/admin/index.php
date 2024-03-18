<?php
include "functions.php";
is_logged_in();

#unset($_SESSION["logged_in"]);

if (empty($_GET["site"])) {
    $site = "home";
  } else {
    $site = $_GET["site"];
  }
  
  if ($site == "home") {
    $content = "content/home.php";
    $title = "home";
  } else if ($site == "ingredients_list") {
    $content = "content/ingredients_list.php";
    $title = "ingredients";
  } else if ($site == "ingredient_new") {
    $content = "content/ingredient_new.php";
    $title = "new ingredient";
  } else if ($site == "ingredients_edit") {
    $content = "content/ingredients_edit.php";
    $title = "Edit ingredient";
  } else if ($site == "ingredients_remove") {
    $content = "content/ingredients_remove.php";
    $title = "Remove ingredient";
  } else if ($site == "recipe_list") {
    $content = "content/recipe_list.php";
    $title = "recipes";
  } else if ($site == "recipe_new") {
    $content = "content/recipe_new.php";
    $title = "new recipe";
  } else if ($site == "recipe_edit") {
    $content = "content/recipe_edit.php";
    $title = "new recipe";
  } else if ($site == "recipe_remove") {
    $content = "content/recipe_remove.php";
    $title = "Remove recipe";
  } else {
    // site gibt's bei uns nicht -> error 404 ausgeben
    header("HTTP/1.0 404 Not Found"); // für Suchmaschine
    $content = "content/404.php";
    $title = "Error 404";
  }

include "head.php";
include $content;
include "footer.php";
?>