<?php
include "circle_class.php";

$errors =  array();
$error = "";
$warnings = array();
$warning = "";

if (!empty($_POST)) {
    try {
        $circle = new circle($_POST["radius"]);
        $success = "Circle was calculated!";
    } catch(Exception $ex) {
        $error = "Check the input!" . $ex->getMessage();
    } finally {
        echo "Here is the finally<br>";
    }

    if (!$error && !$errors) {
        echo "radius of the circle is " . $circle->get_radius() ;
        echo "<br>";
        echo "area of the circle is " . $circle->area() ;
        echo "<br>";
        echo "circumference of the circle is " . $circle->circumference() ;
        echo "<br>";
        echo "diameter of the circle is " . $circle->diameter() ;
    }
} else {
    $circle = new circle(3);
}

if (!empty($errors)){   
    echo '<div class="alert alert-danger" role="alert">Please fill in the following: ' . implode(", ", $errors) . "</div>";
}
if (!empty($error)) {
    echo '<div class="alert alert-danger" role="alert">' . $error . "</div>";
}
if (!empty($success)) {
    echo '<div class="alert alert-success" role="alert">' . $success . "</div>";  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circle</title>
    <style>
        .page {
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
            margin-top: 200px;
        }

        form {
            display: flex;
            flex-flow: row;
            justify-content: center;
            align-items: center;
            margin-top: 100px;
        }

        .circle {
            background-color: #DAF7A6;
            border-radius: 100%;
            width: <?php echo $circle->get_radius() . "cm"; ?>;
            height: <?php echo $circle->get_radius() . "cm"; ?>;

            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
        }
    </style>
    <link rel="stylesheet" href="../../vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="page">
        <div class="circle">
        </div>
        <br><br><br>
        <form action="index.php" method="post">
        <div>
            <input type="text" name="radius" id="radius" class="form-control" <?php if (!empty($_POST['radius'])) {echo "value=" . htmlspecialchars($_POST['radius']);}?>>
        </div>

        <br>
        <br>
        <div>
            <button class="btn btn-success" type="submit">calculate cirlce</button>
        </div>
    </form>
    </div>
</body>
</html>