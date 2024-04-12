<?php

##########################################################
# configuration for this project
#########################################################
const MYSQL_HOST = "localhost";
const MYSQL_USER = "root";
const MYSQL_PASSWORD = "";
const MYSQL_DATABASE = "php3";




##########################################################
# setup code, change if you know what you are doing
#########################################################

# required for $_SESSION
session_start();

function is_logged_in() {
    if (empty($_SESSION["logged_in"])) {
        header("Location: login.php");
        exit;
    }
}

spl_autoload_register(
    function (string $class) {
        $prefix = "rpsteinbrueck\\jwe23\\";
        $prefix_length = strlen($prefix);
        $basis = __DIR__ . "/";

        if (substr($class, 0 , $prefix_length) !== $prefix ) {
            return;
        } else {
            $prefix_without_prefix = substr($class, $prefix_length);
            $include_file = $prefix_without_prefix . ".php";
            $filepath = $basis . $include_file;
            $filepath = str_replace("\\", "/", $filepath);

            if (file_exists($filepath)) {
                include $filepath;
            }
        }
    }
);

?>