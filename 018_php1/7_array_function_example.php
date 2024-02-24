<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array function examples in PHP</title>
</head>
<body>
    <?php
        echo "<h1>Array function examples in PHP</h1><br/>";

        echo "<h2>The array</h2>";

        $arr = ["Bob", "Harry", "Zane", "Xavier", "Melinda", "Scarlet", "Bob", "Kyle", "Snow", "Bob", "Alex"];

        echo "<pre>";
        print_r($arr);
        echo "</pre>";
        echo "<br/>";

        $arr_length = count($arr);
        echo "The array above has {$arr_length} values.";

        echo "<h2>Random value in array</h2>";

        echo "<br/>";
        $random_value = array_rand($arr);
        echo $random_value;
        echo "<br/>";
        echo "A random value out of the array after every reload: " . $arr[$random_value];
        echo "<br/>";

        echo "<h2>Unique array</h2>";

        $arr2 = array_unique($arr);
        echo "<pre>";
        print_r($arr2);
        echo "</pre>";
        echo "<br/>";
        echo "The new array \$arr2 has " . count($arr2) . " values.";

        echo "<h2>Check if value exists in an array</h2>";
        echo "Does Heid exist in the array \$arr2?";
        echo "<br/>";

        if (in_array("Heidi", $arr2)) {
            echo "Heidi does exist";
        } else {
            echo "No Heidi does not exist";
        }

        echo "<br/>";
        echo "<br/>";
        echo "Does Scarlet exist in the array \$arr2?";
        echo "<br/>";

        if (in_array("Scarlet", $arr2)) {
            echo "Scarlet does exist";
        } else {
            echo "No Scarlet does not exist";
        }

        echo "<br/>";
        echo "<h2>Sort array</h2>";
        asort($arr2);

        echo "<pre>";
        print_r($arr2);
        echo "</pre>";
        echo "<br/>";

        echo "<h2>Push to array</h2>";
        $arr2[] = "Tais";
        array_push($arr2,"Nikki", "Ella" );

        echo "<pre>";
        print_r($arr2);
        echo "</pre>";
        echo "<br/>";

        echo "<h2>Reindex array</h2>";

        sort($arr2);

        echo "<pre>";
        print_r($arr2);
        echo "</pre>";
        echo "<br/>";

    ?>
</body>
</html>