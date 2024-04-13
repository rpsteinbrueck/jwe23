<?php

use rpsteinbrueck\jwe23\classes\model\row\vehicle;

$vehicle_id = $_GET["id"];


?>  
<h1>Remove Recipe</h1>
    <?php
    if (!empty($_GET["remove"])) {
        $vehicle->remove();

        $success = $row["title"] . "has been removed";
        $been_removed = true;  
    } 
    if(empty($row)) { ?>
    <h2>Recipe does not exists</h2>
    <div class="button_section" style= "display: flex; justify-content: space-between; width: 3 00px; margin-top: 100px;">
        <div>
            <a href="?site=recipe_list" class="btn btn-success login-button">back</a>
        </div>
    </div><?php else { ?>
    <h2>Are you sure you want to remove vehicle</h2>
    <?php
        echo "<strong>License palte: " . $vehicle->license_plate. "</strong>"
        echo "<strong> brand: " . $vehicle->brand. "</strong>"
        echo "<strong> model: " . $vehicle->model. "</strong>"
        echo "<strong> model year: " . $vehicle->year_model. "</strong>"
        echo "<strong> color: " . $vehicle->color. "</strong>"
    <br>
    <div class="button_section" style= "display: flex; justify-content: space-between; width: 300px; margin-top: 100px;">
        <?php
            if (!$been_removed == true) {?>
                <div>
                    <a href="?site=recipe_remove&id=<?php echo $row["id"]?>&remove=true" class="btn btn-danger login-button" type="submit">Remove</a>
                </div>
        <?php } else {
            ?>
                <div>
                    <a href="?site=recipe_remove&id=<?php echo $row["id"]?>&remove=true" class="btn btn-danger login-button" type="submit" hidden>Remove</a>
                </div>
        <?php } ?>
        <div>
            <a href="?site=recipe_list" class="btn btn-success login-button">back</a>
        </div>
    </div>
    <?php } 



