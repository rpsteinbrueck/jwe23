<?php

$errors =  array();
$error = "";
$warnings = array();
$warning = "";

$sql_id = escape($_GET["id"]);

$result = query("SELECT * FROM ingredients WHERE id = '{$sql_id}'");
$row = mysqli_fetch_assoc($result);

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
        <form action="?site=ingredients_edit" method="post">
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control"
                <?php echo htmlspecialchars($row["name"])?>>
            </div>
            <br>
            <div>
                <label for="kcal">kcal</label>
                <input type="kcal" name="kcal" id="kcal" class="form-control"
                <?php echo htmlspecialchars($row["kcal"]) ?>>
            </div>
            <br>
            <div>
                <label for="amount">Amount</label>
                <input type="amount" name="amount" id="amount" class="form-control"
                <?php echo htmlspecialchars($row["amount"])?>>
            </div>
            <br>
            <div>
                <label for="unit">Unit</label>
                <input type="unit" name="unit" id="unit" class="form-control"
                <?php echo htmlspecialchars($row["unit"])?>>
            </div>
            <br>
            <div class="button_section" style= "display: flex; justify-content: space-between;">
                <div>
                    <button class="btn btn-success login-button" type="submit">Save</button>
                </div>
                <div>
                    <button class="btn btn-success login-button" ><a href="?site=ingredients_list">back</a></button>
                </div>
            </div>
        </form>
    </div>