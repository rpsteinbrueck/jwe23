<?php
include "funktionen.php";
include "kopf.php";

$errors =  array();
$error = "";
$warnings = array();
$warning = "";

#print_r($_POST);

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
        $flugbool=0;
    }
    if (empty($sql_flugnr)) {
        array_push($errors, "flugnr");
    }

    if (!count($errors) > 0) {
        $sql_query = "SELECT * FROM passagiere WHERE vorname = '{$sql_vorname}';";
        $result = query($sql_query);
        $row = mysqli_fetch_assoc($result);
        if (!$row) {
            if ( $sql_flugangst == "on" ) {
                $flugbool = 1;
            }
            $sql_insert = "INSERT INTO passagiere (vorname, nachname, geburtsdatum, flugangst, flug_id) VALUES ('{$sql_vorname}', '{$sql_nachname}', '{$sql_geburtsdatum}', '{$flugbool}','{$sql_flugnr}');";
            $result = query($sql_insert);

            $success = "Passagier " . $sql_vorname . " wurde hinzugefügt";
            unset($_POST);
        } else {
            $error = $row["vorname"] . " gibt es schon!";
        }
    }
}

?>
<div class="_center">
    <h1>Neuer Passagier</h1>
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

    <form action="passagiere_new.php" method="post">
        <div>
            <label for="vorname">Vorname</label>
            <input type="text" name="vorname" id="vorname" class="form-control" <?php if (!empty($_POST['vorname'])) {echo "value=" . htmlspecialchars($_POST['vorname']);}?>>
        </div>
        <br>
        <div>
            <label for="nachname">Nachname</label>
            <input type="text" name="nachname" id="nachname" class="form-control" <?php if (!empty($_POST['nachname'])) {echo "value=" . htmlspecialchars($_POST['nachname']);}?>>
        </div>
        <br>
        <div>
            <label for="geburtsdatum">Geburtsdatum</label>
            <input type="date" name="geburtsdatum" id="geburtsdatum" class="form-control" <?php if (!empty($_POST['geburtsdatum'])) {echo "value=" . htmlspecialchars($_POST['geburtsdatum']);}?>>
        </div>
        <br>
        <div>
            <label style="display: flex; justify-content: space-between; align-items: center;" for="flugangst"><div>Flugangst</div><input type="checkbox" class="center_me" name="flugangst" id="flugangst" class="form-check" <?php if (!empty($_POST['flugangst'])) { echo "checked=\"" . htmlspecialchars($flugcheck) . "\"";}?>></label>
        </div>
        <br>
        <div class="fluege">
            <label>Flüge:</label>
            <div>
                <?php
                    echo '<select class="form-select" name="flug_nr" id="flug_nr" >';
                    echo '<option>---Please select flight---</option>';
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

<?php
include "fuss.php";
?>
