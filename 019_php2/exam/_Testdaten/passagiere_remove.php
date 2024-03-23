<?php
include "kopf.php";
include "funktionen.php";

$errors =  array();
$error = "";
$warnings = array();
$warning = "";
$been_removed = false; 

$sql_id = $_GET["id"];

?>
<div class="_center">
<h1>Passagier entfernen</h1>
<?php 

    $result = query("SELECT * FROM passagiere WHERE id = '{$sql_id}';");
    $row = mysqli_fetch_assoc($result);
    
    if (!empty($_GET["remove"])) {
        $sql_delete = "DELETE FROM passagiere WHERE id = '{$sql_id}';";
        query($sql_delete);
        $success = $row["vorname"] . "wurde entfernt";
        $been_removed = true; 
    } 
    if(empty($row)) { ?>
    <h2>Passagier gibt es nicht!</h2>
    <div class="button_section" style= "display: flex; justify-content: space-between; width: 3 00px; margin-top: 100px;">
        <div>
            <a href="passagiere_list.php" class="btn btn-success">back</a>
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
    <?php
        if (!$been_removed == true) {?> 
            <h2>Bist Du Dir sicher das Du <?php echo $row["vorname"] . " " . $row["nachname"]?> entfernen willst?</h2>
        <?php }?>
    <br>
    <div class="button_section" style= "display: flex; justify-content: space-between; width: 300px; margin-top: 100px;">
        <?php
            if (!$been_removed == true) {?>
            <div>
                <a href="passagiere_remove.php?id=<?php echo $row["id"]?>&remove=true" class="btn btn-danger" type="submit">Remove</a>
            </div>
        <?php } else {?>
            <div>
                <a href="passagiere_remove.php?&id=<?php echo $row["id"]?>&remove=true" class="btn btn-danger" type="submit" hidden>Remove</a>
            </div>
        <?php }?>
        <div>
            <a href="passagiere_list.php" class="btn btn-success login-button">back</a>
        </div>
    </div>
    </div>
    <?php } 

    include "fuss.php";



