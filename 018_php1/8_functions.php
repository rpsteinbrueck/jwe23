<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Functions in PHP</title>
</head>
<body>
    <?php
    
    echo "<h1>Functions in PHP</h1><br/>";
    echo "<h2>Addition function</h2>";
    function addition($a,$b) {
        return $a + $b;
    }

    $a =  123;
    $b = 1234;

    echo "{$a} + {$b} = " . addition(123, 1234);

    echo "<h2>Change degree Celsius °C to degree Fahrenheit °F Function</h2>";
    // formular °F = °C *1.8 +32


    function celsius_to_fahrenheit ($celsius) {
        return $celsius * 1.8 + 32;
    }

    $celsius = 23;
    echo $celsius . "°c is " . celsius_to_fahrenheit($celsius) . "°F.";


    echo "<h2>Format date</h2>";
    // goal 24.02.2024

    $date_mysql = "2024-02-24";

    function format_date_de ($date) {
        return substr($date, -2) . "." . substr($date, 5 , 2) . ".". substr($date, 0, 4);
    }

    echo "orignal date: " . $date_mysql . "<br/>";
    echo "New date: ". format_date_de($date_mysql);
    echo "<br/>";

    // alternative 1
    function format_date_de_with_date($date) {
        return date_format(date_create($date), "d.m.Y");
    }
    echo "New date: ". format_date_de_with_date($date_mysql);
    

    echo "<br/>";

    // alternative 2
    function format_date_de_with_date_2($date) {
        $items =  explode("-", $date);
        echo "<pre>";
        print_r($items);
        echo "</pre>";

        return $items[2] . "." . $items[1] . "." . $items[0];
    }
    echo "New date: ". format_date_de_with_date_2($date_mysql);
    

    echo "<br/>";
    ?>
</body>
</html>