<?php

$errors =  array();
$error = "";
$warnings = array();
$warning = "";

$sql_id = escape($_GET["id"]);

$result = query("SELECT * FROM recipes WHERE id = '{$sql_id}'");
$row = mysqli_fetch_assoc($result);



print_r($row);
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
        <form action="?site=recipe_edit" method="post">
        <div>
                <label for="title">title</label>
                <input type="text" title="title" id="title" class="form-control"
                value="<?php echo htmlspecialchars($row['title'])?>">
            </div>
            <br>
            <div>
                <label for="description">description</label>
                <textarea title="description" id="description" class="form-control" rows="5"><?php echo htmlspecialchars($row['description'])?></textarea>
            </div>
            <br>
            <div class="button_section" style= "display: flex; justify-content: space-between;">
                <div>
                    <button class="btn btn-success login-button" type="submit">Save</button>
                </div>
                <div>
                    <a href="?site=recipe_list" class="btn btn-success login-button">back</a>
                </div>
            </div>
        </form>
    </div>