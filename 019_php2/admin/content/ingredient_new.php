<?php

$errors =  array();
$error = "";
$warnings = array();
$warning = "";

if (!empty($_POST)) {
    $sql_name = strtolower(escape($_POST["name"]) );
    $sql_kcal = strtolower(escape($_POST["kcal"]));
    $sql_amount = strtolower(escape($_POST["amount"]));
    $sql_unit = strtolower(escape($_POST["unit"]));

    if (empty($sql_name)) {
        array_push($errors, "name");
    } 
    if (empty($sql_kcal)) {
        array_push($warnings, "kcal");
        $sql_kcal =  "NULL";
    } 
    if (empty($sql_amount)) {
        array_push($errors, "amount");
    } 
    if (empty($sql_unit)) {
        array_push($errors, "unit");
    }

    if (!count($errors) > 0 ) {
        $sql_query = "SELECT * FROM ingredients WHERE name = '{$sql_name}'";
        $result = query($sql_query); # same as below
        #$result = mysqli_query($con, $sql_query);

        $row =  mysqli_fetch_assoc($result);
        if (!$row) {
            $sql_insert = "INSERT INTO ingredients (name, amount, unit, kcal) VALUES ('{$sql_name}', '{$sql_amount}', '{$sql_unit}', '{$sql_kcal}');";
            $result = query($sql_insert); # same as below
            #$result = mysqli_query($con, $sql_insert);

            $success = $sql_name . " was added to ingredients";

            unset($_POST);
        } else {
            $error = $row["name"] . " already exists!";
        }
    }
}
?>
<div class="login_form">
        <h1>add new ingredient</h1>
        <?php
            if (!empty($errors)){
                echo '<div class="alert alert-danger" role="alert">Please fill in the following: ' . implode(", ", $errors) . "</div>";
            }
            if(!empty($error)) {
                echo '<div class="alert alert-danger" role="alert">' . $error . "</div>";
            }
            if(!empty($warnings)) {
                echo '<div class="alert alert-warning" role="alert">The following will be added with the value NULL if not filled: ' . implode(", ", $warnings) . "</div>";
            }
            if(!empty($success)) {
                echo '<div class="alert alert-success" role="alert">' . $success . "</div>";
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
            <div class="button_section" style= "display: flex; justify-content: space-between;">
                <div>
                    <button class="btn btn-success login-button" type="submit">add</button>
                </div>
                <div>
                    <a href="?site=ingredients_list" class="btn btn-success login-button">back</a>
                </div>
            </div>
        </form>
    </div>