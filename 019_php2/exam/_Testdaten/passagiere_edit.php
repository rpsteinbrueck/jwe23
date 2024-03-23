<?php
include "funktionen.php";
include "kopf.php";


$errors =  array();
$error = "";
$warnings = array();
$warning = "";

$sql_id = $_GET["id"];
$result = query("SELECT * FROM passagiere WHERE id = '{$sql_id}';");
$row = mysqli_fetch_assoc($result);

#print_r($row);

if (!empty($_POST)) {
    $sql_vorname = strtolower(escape($_POST["vorname"]) );
    $sql_nachname = strtolower(escape($_POST["nachname"]));
    $sql_geburtsdatum = escape($_POST["geburtsdatum"]);
    $sql_flugangst = escape($_POST["flugangst"] ?? null);
    $sql_flugnr = escape($_POST["flug_nr"]);

    if (empty($sql_vorname)) {
        array_push($errors, "vorname");
    } 
    if (empty($sql_nachname)) {
        array_push($errors, "nachname");
    }
    if (empty($sql_geburtsdatum)) {
        array_push($errors, "geburtsdatum");
    }
    if (empty($sql_flugangst)) {
        $sql_flugangst=0;
    }
    if (empty($sql_flugnr)) {
        array_push($errors, "flugnr");
    }

    $sql_query_do_not_override = "SELECT * FROM passagiere WHERE vorname = '{$sql_vorname}' AND id != '{$sql_id}';";
    $result = query($sql_query_do_not_override);
    $override = mysqli_fetch_assoc($result);
    if($override) {
        $error = "Passagier gibt es schon!";
    }

    if (!count($errors) > 0 || !$error) {
        $sql_update = "SELECT * FROM passagiere WHERE vorname = '{$sql_vorname}' AND id = '{$sql_id}';";    
        $result = query($sql_update); # same as below
        #$result = mysqli_query($con, $sql_query);
        $row =  mysqli_fetch_assoc($result);

        if ($row) {
            if ( $sql_flugangst == "on" ) {
                $flugbool = 1;
            } else {
                $flugbool = 0;
            }
            $sql_modify = "UPDATE passagiere SET vorname = '{$sql_vorname}', nachname = '{$sql_nachname}', geburtsdatum = '{$sql_geburtsdatum}', flugangst = '{$flugbool}' WHERE id = '{$sql_id}';";
            $result = query($sql_modify); # same as below
            #$result = mysqli_query($con, $sql_insert);

            $success = $sql_vorname . " wurde modifiziert";
            $result = query("SELECT * FROM passagiere WHERE id = '{$sql_id}'");
            $row = mysqli_fetch_assoc($result);
            unset($_POST);
        }
    }
}

?>
<div class="_center">
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
    <form action="passagiere_edit.php?id=<?php echo $row['id']?>" method="post">
        <h1>Passagier editieren</h1>
        <div>
            <label for="vorname">Vorname</label>
            <input type="text" name="vorname" id="vorname" class="form-control" <?php echo "value=" . htmlspecialchars($row['vorname']);?>>
        </div>
        <br>
        <div>
            <label for="nachname">Nachname</label>
            <input type="text" name="nachname" id="nachname" class="form-control" <?php echo "value=" . htmlspecialchars($row['nachname']);?>>
        </div>
        <br>
        <div>
            <label for="geburtsdatum">Geburtsdatum</label>
            <input type="date" name="geburtsdatum" id="geburtsdatum" class="form-control" <?php echo "value=" . htmlspecialchars($row['geburtsdatum']);?>>
        </div>
        <br>
        <div>
            <label style="display: flex; justify-content: space-between; align-items: center;" for="flugangst">
                <div>Flugangst</div>
                    <?php if ($row["flugangst"] == 1) {
                        $flugcheck = "on";
                    } else {
                        $flugcheck = "";
                    }
                    ?>
                    <input type="checkbox" class="center_me" name="flugangst" id="flugangst" class="form-check" <?php if ($flugcheck == "on" ) { echo "checked=\"" . htmlspecialchars($flugcheck) . "\"";}?>>
                </label>
        </div>
        <br>
        <div class="fluege">
            <label>Flüge:</label>
            <div>
                <?php
                    $sql_fluege_query = query("SELECT * from fluege WHERE id = '{$row["flug_id"]}';");
                    $result = mysqli_fetch_assoc($sql_fluege_query);
                    $flug_nr = $result["flugnr"];

                    echo '<select class="form-select" name="flug_nr" id="flug_nr" >';
                    echo "<option>" . $flug_nr . "</option>";
                    $flug_result = query("SELECT * FROM fluege ORDER BY id ASC");
                    while ($i = mysqli_fetch_assoc($flug_result)) {
                        echo "<option value='{$i["id"]}'";
                        echo ">{$i["flugnr"]}</option>";
                    }
                    echo "</select>";
                ?> 
            </div>         
        </div>
        <br>
        <br>
        <div>
            <button class="btn btn-success" type="submit">Passagier anlegen</button>
        </div>
    </form>
</div>
</div>
<?php
include "fuss.php";
?>
