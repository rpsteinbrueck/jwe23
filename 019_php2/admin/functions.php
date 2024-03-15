<?php
# required for $_SESSION
session_start();

# db connection
$con = mysqli_connect("localhost", "root", "", "php2");

# notify mysqli that we are using utf-8
mysqli_set_charset($con, "utf8");


function is_logged_in() {
    if (empty($_SESSION["logged_in"])) {
        header("Location: login.php");
        exit;
    }
}
?>