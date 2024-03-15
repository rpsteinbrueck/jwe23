<?php
include "functions.php";
is_logged_in();

unset($_SESSION["logged_in"]);
is_logged_in();
?>
