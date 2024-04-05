<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person class</title>
    <style>
        .page {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 200px;
        }
    </style>
</head>
<body>
<div class="page">
    <?php
    include "class_person.php";

    # create an object out of the class person
    $object1 = new person("Random", "Person", "23", "180cm", "green");
    echo $object1->introduce();
    echo "<br>";

    echo $object1->get_firstname();
    echo "<br>";
    # set object properties
    $object1->set_firstname("Random");
    echo "<br>";
    # check result
    echo $object1->get_firstname();
    echo "<br>";

    $object2 = new person("Another Random", "Person", "32", "190cm", "blue");
    echo $object2->introduce();
    echo "<br>";

    # get object properties
    echo $object2->get_firstname();
    echo "<br>";
    echo $object2->get_age();
    echo "<br>";

    # set object properties
    $object2->set_firstname("Random Person with a different name");
    # check result
    echo $object2->get_firstname();
    echo "<br>";
    ?>
</div>

</body>
</html>

