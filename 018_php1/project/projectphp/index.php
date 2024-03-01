<?php

if ( empty($_GET["site"] )) {
    $site = "home";
} else {
    $site = $_GET["site"];
}

if ( $site == "home") {
    $content_file = "home.php";
} else if ( $site == "services") {
    $content_file = "services.php";
} else if ( $site == "opening times") {
    $content_file = "opening_times.php";
} else if ( $site == "contact") {
    $content_file = "contact.php";
} else {
    $content_file = "error404.php";
}

include "head.php";
include "content/" . $content_file;
include "footer.php";

?>