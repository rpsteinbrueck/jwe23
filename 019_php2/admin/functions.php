<?php
# required for $_SESSION
session_start();

# db connection
$con = mysqli_connect("localhost", "root", "", "php2");

# notify mysqli that we are using utf-8
mysqli_set_charset($con, "utf8");
?>