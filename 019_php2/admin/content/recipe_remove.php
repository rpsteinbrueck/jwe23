<?php
$errors =  array();
$error = "";
$warnings = array();
$warning = "";

$sql_id = $_GET["id"];

?>  
<h1>Remove Recipe</h1>
    <?php
    $result = query("SELECT * FROM recipes WHERE id = '{$sql_id}';");
    $row = mysqli_fetch_assoc($result);
    
    if (!empty($_GET["remove"])) {
        $sql_delete = "DELETE FROM recipes WHERE id = '{$sql_id}';";
        query($sql_delete);
        $success = $row["title"] . "has been removed";
    } 
    if(empty($row)) { ?>
    <h2>Recipe does not exists</h2>
    <div class="button_section" style= "display: flex; justify-content: space-between; width: 3 00px; margin-top: 100px;">
        <div>
            <a href="?site=recipe_list" class="btn btn-success login-button">back</a>
        </div>
    </div>
    <?php  } else {
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
        } ?>
    <h2>Are you sure you want to remove <?php echo $row["title"]?></h2>
    <br>
    <div class="button_section" style= "display: flex; justify-content: space-between; width: 300px; margin-top: 100px;">
        <div>
            <a href="?site=recipe_remove&id=<?php echo $row["id"]?>&remove=true" class="btn btn-danger login-button" type="submit">Remove</a>
        </div>
        <div>
            <a href="?site=recipe_list" class="btn btn-success login-button">back</a>
        </div>
    </div>
    <?php } 



