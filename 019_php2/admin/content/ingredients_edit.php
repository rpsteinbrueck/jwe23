<?php

$errors =  array();
$error = "";
$warnings = array();
$warning = "";

$sql_id = $_GET["id"];
$result = query("SELECT * FROM ingredients WHERE id = '{$sql_id}';");
$row = mysqli_fetch_assoc($result);

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

    $sql_query_do_not_override = "SELECT * FROM ingredients WHERE name = '{$sql_name}' AND id != '{$sql_id}';";
    $result = query($sql_query_do_not_override);
    $override = mysqli_fetch_assoc($result);
    if($override) {
        $error = "Ingredient already exists!";
    }

    if (!count($errors) > 0 || !$error) {
        $sql_update = "SELECT * FROM ingredients WHERE name = '{$sql_name}' AND id = '{$sql_id}';";    
        $result = query($sql_update); # same as below
        #$result = mysqli_query($con, $sql_query);
        $row =  mysqli_fetch_assoc($result);

        if ($row) {
            $sql_modify = "UPDATE ingredients SET name = '{$sql_name}', amount = '{$sql_amount}', unit = '{$sql_unit}', kcal = '{$sql_kcal}' WHERE id = '{$sql_id}';";
            $result = query($sql_modify); # same as below
            #$result = mysqli_query($con, $sql_insert);

            $success = $sql_name . " was modified to ingredients";
            $result = query("SELECT * FROM ingredients WHERE id = '{$sql_id}'");
            $row = mysqli_fetch_assoc($result);
            unset($_POST);
        }
    }
}

?>
<div class="login_form">
        <h1>Edit ingredient</h1>
        <?php
            if (!empty($errors)){
                echo '<div class="alert alert-danger" role="alert">Please fill in the following: ' . implode(", ", $errors) . "</div>";
            }

            if(!empty($error)) {
                echo '<div class="alert alert-danger" role="alert">' . $error . "</div>";
            }

            if(!empty($warning)) {
                echo '<div class="alert alert-warning" role="alert">The following will be added with the value NULL if not filled: ' . implode(", ", $warnings) . "</div>";
            }

            if(!empty($success)) {
                echo '<div class="alert alert-success" role="alert">' . $success . "</div>";
            }
        ?>
        <form action="?site=ingredients_edit&id=<?php echo $row['id']?>" method="post">
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control"
                value="<?php echo htmlspecialchars($row['name'])?>">
            </div>
            <br>
            <div>
                <label for="kcal">kcal</label>
                <input type="kcal" name="kcal" id="kcal" class="form-control"
                value="<?php echo htmlspecialchars($row['kcal']) ?>">
            </div>
            <br>
            <div>
                <label for="amount">Amount</label>
                <input type="amount" name="amount" id="amount" class="form-control"
                value="<?php echo htmlspecialchars($row['amount'])?>">
            </div>
            <br>
            <div>
                <label for="unit">Unit</label>
                <input type="unit" name="unit" id="unit" class="form-control"
                value="<?php echo htmlspecialchars($row['unit'])?>">
            </div>
            <br>
            <div class="button_section" style= "display: flex; justify-content: space-between;">
                <div>
                    <button class="btn btn-success login-button" type="submit">Save</button>
                </div>
                <div>
                    <a href="?site=ingredients_list" class="btn btn-success login-button">back</a>
                </div>
            </div>
        </form>
    </div>