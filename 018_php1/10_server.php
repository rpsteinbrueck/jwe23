<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super global variables in PHP</title>
</head>
<body>
    <?php
        echo "<h1> Superglobal variables in PHP</h1><br/>";
        
        # Do not ever use live
        echo "<pre>";
        print_r($_SERVER);
        echo "</pre>";
    ?>
</body>
</html>