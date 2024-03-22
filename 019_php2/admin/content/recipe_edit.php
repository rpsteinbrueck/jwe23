<?php

$errors =  array();
$error = "";
$warnings = array();
$warning = "";

$sql_id = escape($_GET["id"]);

$result = query("SELECT * FROM recipes WHERE id = '{$sql_id}';");
$row = mysqli_fetch_assoc($result);

if (!empty($_POST)) {
    $sql_title = strtolower(escape($_POST["title"]) );
    $sql_description = escape($_POST["description"]);
    #$session_user = $_SESSION["username"];
    #$sql_user_id = mysqli_fetch_assoc(query("SELECT id FROM users WHERE username = '{$session_user}';"))["id"];

    if (empty($sql_title)) {
        array_push($errors, "title");
    } 
    if (empty($sql_description)) {
        array_push($errors, "description");
    }
    #if (empty($sql_user_id)) {
    #    array_push($errors, "user_id");
    #}

    $sql_query_do_not_override = "SELECT * FROM recipes WHERE title = '{$sql_title}' AND id != '{$sql_id}';";
    $result = query($sql_query_do_not_override);
    $override = mysqli_fetch_assoc($result);
    if($override) {
        $error = "Ingredient already exists!";
    }

    if (!count($errors) > 0 || !$error) {
        $sql_update = "SELECT * FROM recipes WHERE title = '{$sql_title}' AND id = '{$sql_id}';";    
        $result = query($sql_update); # same as below
        #$result = mysqli_query($con, $sql_query);
        $row =  mysqli_fetch_assoc($result);

        if ($row) {
            $sql_modify = "UPDATE recipes SET title = '{$sql_title}', description = '{$sql_description}' WHERE id = '{$sql_id}';";
            $result = query($sql_modify); # same as below
            #$result = mysqli_query($con, $sql_insert);

            $success = $sql_title . " was modified to ingredients";
            $result = query("SELECT * FROM recipes WHERE id = '{$sql_id}'");
            $row = mysqli_fetch_assoc($result);
            unset($_POST);
        }
    }
}


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
        <form action="?site=recipe_edit&id=<?php echo $row['id']?>" method="post">
        <div>
                <label for="title">title</label>
                <input type="text" name="title" id="title" class="form-control"
                value="<?php echo htmlspecialchars($row['title'])?>">
            </div>
            <br>
            <div>
                <label for="description">description</label>
                <textarea name="description" id="description" class="form-control" rows="5"><?php echo htmlspecialchars($row['description'])?></textarea>
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