<?php
include "functions.php";
is_logged_in();

# session_destroy()
#unset($_SESSION["logged_in"]);

session_unset();
is_logged_in();
?>
