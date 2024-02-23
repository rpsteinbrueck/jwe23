<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>If example </title>
</head>
<body>
    <?php

    echo "<h1>If example in PHP</h1>";
    echo "Current Time: ".date("G")." o'clock <br/>";
    $time = date("G");
    
    if ( $time >= 0 && $time <= 5 ) {
        echo "Sleep tight";
    } else if ( $time >= 6 && $time <= 9 ) {
        echo  "Good morning";
    } else if ( $time == 12 || $time == 18 ) {
        echo "Bon Appetit";
    } else if ( $time >= 19 && $time <= 23 ) {
        echo "Good night";
    } else {
        echo "Hello";
    }

    
    ?>
</body>
</html>