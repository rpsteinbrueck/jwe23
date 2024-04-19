<?php 

spl_autoload_register(
    function (string $class) {
        $prefix = "rpsteinbrueck\\php3test\\";
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