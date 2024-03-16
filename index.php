<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>landing page</title>
</head>
<body>
    <?php

    function get_objects($dir) {
        $objects = scandir($dir);
        foreach($objects as $object){
            if (str_ends_with($object, ".php") || str_ends_with($object, ".html")) {
                echo "<a href=\"http://localhost:9080{$dir}/$object\">{$object}</a><br/>";
            } else {
                echo "<a href=\"http://localhost:9080{$dir}?site={$object}/\">{$object}</a><br/>";
            }
        }
    }

    function create_sites ($dir) {
        $folders = scandir($dir);

        foreach($folders as $folder){
            if ( $site == $folder) {
                get_objects($folder);
                create_sites($folder);
            }
        }
    }

    if ( empty($_GET["site"] )) {
        $site = "home";
    } else {
        $site = $_GET["site"];
    }

    if ( $site == "home") {
        get_objects("./");

    }


    #echo "<pre>";
    #print_r($files);
    #echo "</pre>";


    ?>
</body>
</html>