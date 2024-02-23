<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adv datatypes</title>
</head>
<body>
    <?php 
    // numeric arrays   
    echo "<h1>Numeric Arrays in PHP</h1>";

    $arr = array("1", 12, "test", "2", "Some sentence");
    echo $arr[2];
    echo "<br/>";
    echo $arr[3];
    echo "<br/>";
    echo $arr[1];
    echo "<br/>";
    echo $arr[4];
    echo "<br/>";

    // foreach loop
    foreach ( $arr as $i ) {
        echo $i ."<br/>";
    };

    # add to array
    $arr[] = 1234.000001;

    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    echo "<br/>";

    $index = 4;
    echo $arr[$index];
    echo "<br/>";
    echo $arr[$index-2];
    echo "<br/>";



    // associative arrays
    echo "<h1>associative Arrays in PHP</h1>";

    $arr2 = array(
        "key"=>"value",
        "name"=>"random first name",
        "age"=>"63",
    );

    echo $arr2["name"];
    echo "<br/>";
    echo $arr2["key"];
    echo "<br/>";

    echo "<pre>";
    print_r($arr2);
    echo "</pre>";
    echo "<br/>";

    echo $arr2["name"] . " (" . $arr2["age"] . ") " . "from Salzburg."

    ?>
</body>
</html>