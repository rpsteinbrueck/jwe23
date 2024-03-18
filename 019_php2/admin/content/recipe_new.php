<?php

$errors =  array();
$error = "";

if (!empty($_POST)) {
    $sql_title = strtolower(escape($_POST["title"]) );
    $sql_description = escape($_POST["description"]);
    $session_user = $_SESSION["username"];
    $sql_user_id = query("SELECT id FROM users WHERE username = '{$session_user}';");
    echo $sql_user_id;

    if (empty($sql_title)) {
        array_push($errors, "title");
    } 
    if (empty($sql_description)) {
        array_push($errors, "description");
    }
    if (empty($sql_user_id)) {
        array_push($errors, "user_id");
    } 

    if (!count($errors) > 0 ) {
        $sql_query = "SELECT * FROM recipes WHERE title = '{$sql_title}'";
        $result = query($sql_query); # same as below
        #$result = mysqli_query($con, $sql_query);

        $row = mysqli_fetch_assoc($result);
        if (!$row) {
            $sql_insert = "INSERT INTO recipes (title, description, user_id) VALUES ('{$sql_title}', '{$sql_description}', '{$sql_user_id}');";
            $result = query($sql_insert); # same as below
            #$result = mysqli_query($con, $sql_insert);

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

            if(!empty($error)) {
                echo '<div class="alert alert-danger" role="alert">' . $error . "</div>";
            }

            if(!empty($success)) {
                echo '<div class="alert alert-success" role="alert">' . $success . "</div>";    
            }
        ?>
        <form action="?site=recipe_new" method="post">
            <div>
                <label for="title">title</label>
                <input type="text" title="title" id="title" class="form-control"
                value="<?php if (!empty($_POST['title'])) { echo "value=" . htmlspecialchars($_POST['title']);}?>">
            </div>
            <br>
            <div>
                <label for="description">description</label>
                <textarea type="description" title="description" id="description" class="form-control" rows="5"><?php if (!empty($_POST['description'])) { echo "value=" . htmlspecialchars($_POST['description']);}?></textarea>
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