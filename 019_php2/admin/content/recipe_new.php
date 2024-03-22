<?php

$errors =  array();
$error = "";
$warnings = array();
$warning = "";

$ingredients = query("SELECT id,name FROM ingredients ORDER BY ingredients.name ASC;");
$ingredients_rows = mysqli_fetch_assoc($ingredients);

print_r($_POST);

if (!empty($_POST)) {
    $sql_title = strtolower(escape($_POST["title"]) );
    $sql_description = escape($_POST["description"]);
    $sql_ingredentiens_arr = $_POST["ingredients_arr"];
    $session_user = $_SESSION["username"];
    $sql_user_id = mysqli_fetch_assoc(query("SELECT id FROM users WHERE username = '{$session_user}';"))["id"];

    if (empty($sql_title)) {
        array_push($errors, "title");
    } 
    if (empty($sql_description)) {
        array_push($errors, "description");
    }
    if (empty($sql_user_id)) {
        array_push($errors, "user_id");
    }
    if (empty($sql_description)) {
        array_push($errors, "description");
    }

    if (!count($errors) > 0) {
        $sql_query = "SELECT * FROM recipes WHERE title = '{$sql_title}';";
        $result = query($sql_query); # same as below
        #$result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_assoc($result);
        if (!$row) {
            $sql_insert = "INSERT INTO recipes (title, description, user_id) VALUES ('{$sql_title}', '{$sql_description}', '{$sql_user_id}');";
            $result = query($sql_insert); # same as below
            #$result = mysqli_query($con, $sql_insert);

            if (count($sql_ingredentiens_arr) > 0) {
                $sql_query = "SELECT * FROM recipes WHERE title = '{$sql_title}';";
                $result = query($sql_query);
                $recipe_result = mysqli_fetch_assoc($result);
                $recipe_id = $recipe_result["id"];
                foreach ($sql_ingredentiens_arr as $add_ingredient) {
                    $sql_insert_ingredient = "INSERT INTO ingredients_for_recipes (ingredients_id, recipes_id) VALUES ('{$add_ingredient}', '{$recipe_id}');";
                    query($sql_insert_ingredient);
                }
            }

            $success = "Recipe " . $sql_title . " was added";
            unset($_POST);
        } else {
            $error = $row["title"] . " already exists!";
        }
    }
}
?>
<div class="login_form">
    <h1>Add new recipe</h1>
    <?php
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
    <form action="?site=recipe_new" method="post">
        <div>
            <label for="title">title</label>
            <input type="text" name="title" id="title" class="form-control" <?php if (!empty($_POST['title'])) {echo "value=" . htmlspecialchars($_POST['title']);}?>>
        </div>
        <br>
        <div>
            <label for="description">description</label>
            <textarea name="description" id="description" class="form-control" rows="5"><?php if (!empty($_POST['description'])) { echo htmlspecialchars($_POST['description']);} ?></textarea>
        </div>
        <div>
            <p></p>ingredients:</p>
            <?php
                while ($i = mysqli_fetch_assoc($ingredients)) {
                    echo '<input type="checkbox" class="form-check-input" name="ingredients_arr[]" value="' . $i["id"] . '">';
                    echo '<label for="ingredients_arr[]">' . $i["name"] . '</label><br>';
                }
            ?>
        </div>
        <br>
        <div class="button_section" style= "display: flex; justify-content: space-between;">
            <div>
                <button class="btn btn-success login-button" type="submit">add</button>
            </div>
            <div>
                <a href="?site=recipe_list" class="btn btn-success login-button">back</a>
            </div>
        </div>
    </form>
</div>