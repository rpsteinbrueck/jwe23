<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control structures in PHP</title>
</head>
<body>
    <?php
        set_time_limit(1);
        echo "<h1>Control structures in PHP</h1><br/>";
        echo "<h2>Case control in PHP</h2>";

        echo "<br/>";

        echo "<h2>while loop in PHP</h2>";

        // set time calculate limit


        $n = 1;
        while ($n <= 10) {
            echo $n++ . " ";
        }
        echo "<br/>";

        echo "<h2>Do while loop in PHP</h2>";

        /*$n = 15;
        do {
            echo $n += 1;
        } while ($n >= 9);
        echo $n;*/
        echo "<br/>";

        echo "<h2>foreach loop in PHP</h2>";
        $cities = array("New York", "Cape Town", "Sydney", "Salzburg");
        asort($cities);

        echo "<ul>";
        foreach($cities as $city) {
            echo "<li>" . $city . "</li>";
        }
        echo "</ul>";

        echo "<br/>";


        echo "<h2>for loop in PHP</h2>";
        echo "<table border=\"1\"><th>number</th>";

        for ($i=1; $i <= 10; $i++) {
            echo "<tr><td>" . $i . "</td></tr>";
        }
        echo "</table>";
        echo "<br/>";

        echo "<h2>for loop 1x1 table in PHP</h2>";
        echo "<table border=\"1\">";

        for ($i=1; $i <= 10; $i++) {
            echo "<tr>";
            for ($j=1; $j <= 10; $j++ ) {
                $show_number = $i * $j;
                if ($show_number % 7 == 0 ) {
                    $show_number = "????";
                } 
                echo "<td>" . $show_number . "</td>";

            }
            echo "</tr>";
        }
        echo "</table>";
        echo "<br/>";


    ?>
</body>
</html>