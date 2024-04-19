<!DOCTYPE html>
<html>
    <head>
        <title>PHP 3 Praxisprüfung</title>
        <meta charset='utf-8' />
    </head>
    <body>
        <h2>Container testen</h2>

        <?php

        $warengewicht = 12.55;
        // Irgendeinen Container mit $warengewicht erstellen
        // und Ist-Gewicht, sowie maximales Gesamtgewicht ausgeben

        ?>


        <h2>Frachtschiff testen</h2>
        <?php
        if (!empty($_POST)) {
            // - Frachtschiff erstellen
            // - Gegebene Anzahl an Container hinzufügen (for-Schleife)
            // - Reisezeit, Anzahl Container, geladenes Gewicht ausgeben

            for ($i = 1; $i <= $_POST["anzahl_container"]; $i++) {
                // Container dem Schiff hinzufügen

            }

        }
        ?>
        <form action='index.php' method='post'>
            <div>
                <label for='geschwindigkeit'>Geschwindigkeit in km/h:</label>
                <input type='number' name='geschwindigkeit' id='geschwindigkeit' min='0.0' max='100.0' step='0.1' value='<?php
                  if (!empty($_POST["geschwindigkeit"])) {
                    echo $_POST["geschwindigkeit"];
                  } else {
                    echo 23;
                  } ?>' />
            </div>
            <div>
                <label for='strecke'>Strecke in km:</label>
                <input type='number' name='strecke' id='strecke' min='0' max='40000' step='1' value='<?php
                  if (!empty($_POST["strecke"])) {
                    echo $_POST["strecke"];
                  } else {
                    echo 4669;
                  } ?>' />
            </div>
            <div>
                <label for='anzahl_container'>Anzahl Container:</label>
                <input type='number' name='anzahl_container' id='anzahl_container' min='0' max='10000' step='1' value='<?php
                  if (!empty($_POST["anzahl_container"])) {
                    echo $_POST["anzahl_container"];
                  } else {
                    echo 8400;
                  } ?>' />
            </div>
            <div>
                <label for='gewicht_container'>Warengewicht je Container:</label>
                <input type='number' name='gewicht_container' id='gewicht_container' min='0.0' max='100.0' step='0.01' value='<?php
                  if (!empty($_POST["gewicht_container"])) {
                    echo $_POST["gewicht_container"];
                  } else {
                    echo 8.64;
                  } ?>' />
            </div>
            <div>
                <button type='submit'>Berechnen</button>
            </div>
        </form>
    </body>
</html>
