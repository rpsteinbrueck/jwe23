<?php
include "funktionen.php";
include "kopf.php";

$passagiere = query("SELECT * FROM passagiere ORDER BY vorname ASC;");
?>
    <h1>Passagiere</h1>

    <div class='row font-weight-bold border-bottom text-center'>
      <div class='col-1'>Vorname</div>
      <div class='col-1'>Nachname</div>
      <div class='col-1'>Geburtsdatum</div>
      <div class='col-1'>Flugangst</div>
      <div class='col-1'>Flugnr</div>
      <div class='col-1'>Abflug</div>
      <div class='col-1'>Ankunft</div>
      <div class='col-1'>Startflughafen</div>
      <div class='col-1'>Zielflughafen</div>
      <div class='col-1'>Editieren</div>
      <div class='col-1'>Entfernen</div>
    </div>

<?php 
    while($passagier = mysqli_fetch_assoc($passagiere)){
        $result = query("SELECT * from fluege WHERE id = '{$passagier["flug_id"]}'");
        $flug = mysqli_fetch_assoc($result);

        if ($passagier["flugangst"] == 1) {
            $flugangst = "Ja";
        } else {
            $flugangst = "Nein";
        }
        echo "<div class='row text-center'>";
        echo "<div class='col-1'>" . $passagier["vorname"] . "</div>";
        echo "<div class='col-1'>" . $passagier["nachname"] . "</div>";
        echo "<div class='col-1'>" . $passagier["geburtsdatum"] . "</div>";
        echo "<div class='col-1'>" . $flugangst . "</div>";
        echo "<div class='col-1'>" . $flug["flugnr"] . "</div>";
        echo "<div class='col-1'>" . $flug["abflug"] . "</div>";
        echo "<div class='col-1'>" . $flug["ankunft"] . "</div>";
        echo "<div class='col-1'>" . $flug["start_flgh"] . "</div>";
        echo "<div class='col-1'>" . $flug["ziel_flgh"] . "</div>";
        echo '<div class="col-1"><a  href="passagiere_edit.php?id=' . $passagier["id"] . '"><img src="static/img/pencil.svg"></a></div>';
        echo '<div class="col-1"><a  href="passagiere_remove.php?id=' . $passagier["id"] . '"><img src="static/img/trash.svg"></a></div>';
        echo "</div>";
    }

    echo "<br><br>";
    echo '<div style="display: flex; justify-content: center;">';
    echo '<a class="btn btn-success" href="passagiere_new.php">Passagier anlegen</a>';
    echo '</div>';
    echo "<br><br>";
    echo "<br><br>";

?>

<?php
include "fuss.php";
?>
