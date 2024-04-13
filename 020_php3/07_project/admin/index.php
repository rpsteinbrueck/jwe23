<?php
include "setup.php";
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
  } elseif ($site == "vehicle_list") {
    $content = "content/vehicle_list.php";
    $title = "vehicle list";
  } elseif ($site == "vehicle_edit") {
    $content = "content/vehicle_edit.php";
    $title = "vehicle edit";
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