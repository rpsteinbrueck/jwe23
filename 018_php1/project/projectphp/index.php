<?php

if ( empty($_GET["site"] )) {
    $site = "home";
} else {
    $site = $_GET["site"];
}

if ( $site == "home") {
    $content_file = "home.php";
    $page_title = "Hair dresser cuts short hair";
    $meta_desc = "Home page";
} else if ( $site == "services") {
    $content_file = "services.php";
    $page_title = "We offer the following services";
    $meta_desc = "Services page";
} else if ( $site == "opening times") {
    $content_file = "opening_times.php";
    $page_title = "Our opening Times are:";
    $meta_desc = "Opening times page";
} else if ( $site == "contact") {
    $content_file = "contact.php";
    $page_title = "Contact us!";
    $meta_desc = "Please contact us";
} else {
    $content_file = "error404.php";
    $page_title = "Error 404";
    $meta_desc = "Error 404";
}

include "head.php";
include "content/" . $content_file;
include "footer.php";

?>