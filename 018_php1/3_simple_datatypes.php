<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple datatypes</title>
</head>
<body>
    <?php

        // datatype int & float

        // int 2^32
        $whole_number1 = 1234;
        $whole_number2 = -1234;

        // float
        $real_number1 = 34.12;
        $real_number2 = 2.413e2;
        

        // int
        $age = 47;
        echo "I am  $age <br/>";

        // float
        $gravity_unit = 9.80665;
        echo "Gravity's unit is $gravity_unit m/s2";


        // datatype string
        
        $string1 = "Welcome here!";
        $string2 = "A warm welcome!";

        //$heredoc = <<<


        /* escape sequences

        \n
        \t
        \$
        \\
        \

        */


        $name = "random first name";
        echo "Hey $name";
        echo "<br/>";
        echo 'Hey $name';
        echo "<br/>";
        echo 'Hey ' . $name;
        echo "<br/>";

        // I have random first name pen
        echo "I have $name"."s"." pen!";
        echo "I have " . $name . "s" . " pen!";

        //datatype boolean
        $true = true;
        $false = false;
        echo "<br/>";
        echo $true;
        echo "<br/>";
        echo ">".$false."<";


        // datatype null
        $nothing = null;
        echo $nothing; 
        echo "<br/>";

        

        // constant
        define("database", "php23");
        echo database;
        echo "<br/>";

        const database2 = "php24";
        echo database2;

        echo "<br/>";
        echo "test";

    ?>
</body>
</html>