<?php

$error =  array();

if (!empty($_POST)) {
    $sql_name = escape($_POST["name"]);
    $sql_kcal = escape($_POST["ckal"]);
    $sql_amount = escape($_POST["amount"]);
    $sql_unit = escape($_POST["unit"]);

    if (empty($sql_name)) {
        array_push($error, "name");
    } 
    if (empty($sql_ckal)) {
        array_push($error, "ckal");
    } 
    if (empty($sql_amount)) {
        array_push($error, "amount");
    } 
    if (empty($sql_unit)) {
        array_push($error, "unit");
    }

    $sql_query = "SELECT * FROM ingredients WHERE name = '{$sql_name}'";
    $result = mysqli_query($con, $sql_query);
    $row =  mysqli_fetch_assoc($result);
    if (!$row) {
        $sql_insert = "INSERT INTO ingredients (name, amount, unit, kcal) VALUES ('{$sql_name}', '{$sql_kcal}', '{$sql_amount}', '{$sql_unit}');";
        $result = mysqli_query($con, $sql_insert);
    } else {
        echo $row["name"] . "already exists!";
    }
} else {
    array_push($error, "name", "kcal", "amount", "unit");
}
?>
<div class="login_form">
        <h1>add new ingredient</h1>
        <?php
            if (!empty($error)){
                echo '<div class="alert alert-danger" role="alert">Please fill in the following: ' . implode(", ", $error) . "</div>";
            }
        ?>
        <form action="?site=ingredient_new" method="post">
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control"
                <?php if (!empty($_POST['name'])) {echo "value=" . htmlspecialchars($_POST['name']);}?>>
            </div>
            <br>
            <div>
                <label for="kcal">kcal</label>
                <input type="kcal" name="kcal" id="kcal" class="form-control"
                <?php if (!empty($_POST['kcal'])) {echo "value=" . htmlspecialchars($_POST['kcal']);}?>>
            </div>
            <br>
            <div>
                <label for="amount">Amount</label>
                <input type="amount" name="amount" id="amount" class="form-control"
                <?php if (!empty($_POST['amount'])) {echo "value=" . htmlspecialchars($_POST['amount']);}?>>
            </div>
            <br>
            <div>
                <label for="unit">Unit</label>
                <input type="unit" name="unit" id="unit" class="form-control"
                <?php if (!empty($_POST['unit'])) {echo "value=" . htmlspecialchars($_POST['unit']);}?>>
            </div>
            <br>
            <div>
                <button class="btn btn-success login-button">add</button>
            </div>
        </form>
    </div>