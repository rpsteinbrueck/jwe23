<?php
# required for $_SESSION
session_start();

# db connection
$con = mysqli_connect("localhost", "root", "", "php2");
#$con = mysqli_connect("db:3306", "root", "abc123", "php2");

# notify mysqli that we are using utf-8
mysqli_set_charset($con, "utf8");


function is_logged_in() {
    if (empty($_SESSION["logged_in"])) {
        header("Location: login.php");
        exit;
    }
}

function escape($post_var) {
    global $con;
    return mysqli_real_escape_string($con, $post_var);
}

function query($sql_query) {
    global $con;
    $result = mysqli_query($con, $sql_query);
    return $result;
}
?>