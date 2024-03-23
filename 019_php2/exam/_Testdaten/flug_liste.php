<?php
include "funktionen.php";
include "kopf.php";

$NOW = date("Y-m-d H:i:s");
$flights = query("SELECT * FROM fluege WHERE ankunft >= '{$NOW}' ORDER BY abflug ASC;");
?>
    <h1>Alle Flüge</h1>

    <div class='row font-weight-bold border-bottom text-center'>
      <div class='col-1'>Flugnummer</div>
      <div class='col-2'>Abflug</div>
      <div class='col-2'>Ankunft</div>
      <div class='col-2'>Startflughafen</div>
      <div class='col-2'>Zielflughafen</div>
      <div class='col-1'>Passagiere</div>
    </div>

<?php 
    while($row = mysqli_fetch_assoc($flights)){
        $passagiere_query = query("SELECT * from passagiere where flug_id = '{$row["id"]}';");
        echo "<div class='row text-center'>";
        echo "<div class='col-1'>" . $row["flugnr"] . "</div>";
        echo "<div class='col-2'>" . $row["abflug"] . "</div>";
        echo "<div class='col-2'>" . $row["ankunft"] . "</div>";
        echo "<div class='col-2'>" . $row["start_flgh"] . "</div>";
        echo "<div class='col-2'>" . $row["ziel_flgh"] . "</div>";
        echo "<div class='col-1'>" . mysqli_num_rows($passagiere_query) . "</div>";
        echo "</div>";
    }
?>

<?php
include "fuss.php";
?>
