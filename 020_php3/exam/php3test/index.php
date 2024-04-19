<!DOCTYPE html>
<html>
    <head>
        <title>PHP 3 Praxisprüfung</title>
        <meta charset='utf-8' />
    </head>
    <body>
        <h2>Container testen</h2>

        <?php

        include "functions.php";

        #########################
        # namespaces
        #########################
        use rpsteinbrueck\php3test\classes\cargo_ship;
        use rpsteinbrueck\php3test\classes\container_big;
        use rpsteinbrueck\php3test\classes\container_small;


        $warengewicht = 12.55;
        // Irgendeinen Container mit $warengewicht erstellen
        // und Ist-Gewicht, sowie maximales Gesamtgewicht ausgeben

        #########################
        # Großer Container
        #########################
        echo "Großer Container: <br>";
        $big_container = new container_big($warengewicht);
        echo "Warengewicht: " . $big_container->weight_of_goods() . " Tonnen<br>";
        echo "Ist-Gewicht: " . $big_container->is_weight() . " Tonnen<br>";
        echo "Maximales Gesamtgewicht: " . $big_container->max_total_weight() . " Tonnen<br>";

        echo "<br>";

        #########################
        # Kleiner Container
        #########################
        echo "Kleiner Container: <br>";
        $small_container = new container_small($warengewicht);
        echo "Warengewicht: " . $small_container->weight_of_goods() . " Tonnen<br>";
        echo "Ist-Gewicht: " . $small_container->is_weight() . " Tonnen<br>";
        echo "Maximales Gesamtgewicht: " . $small_container->max_total_weight() . " Tonnen<br>";
        echo "<br>";


        ##################################
        # Großer Container throw exception
        ##################################
        #$warengewicht = 2229.22;
        #echo "Großer Container throw exception: <br>";
        #$throw_exception_big_container = new container_big($warengewicht);
        #echo "Warengewicht: " . $throw_exception_big_container->weight_of_goods() . " Tonnen<br>";
        #echo "Ist-Gewicht: " . $throw_exception_big_container->is_weight() . " Tonnen<br>";
        #echo "Maximales Gesamtgewicht: " . $throw_exception_big_container->max_total_weight() . " Tonnen<br>";
        #echo "<br>";
        ?>


        <h2>Frachtschiff testen</h2>
        <?php
        if (!empty($_POST)) {
            // - Frachtschiff erstellen
            // - Gegebene Anzahl an Container hinzufügen (for-Schleife)
            // - Reisezeit, Anzahl Container, geladenes Gewicht ausgeben

            $cargo_ship =  new cargo_ship($_POST["geschwindigkeit"]);

            for ($i = 1; $i <= $_POST["anzahl_container"]; $i++) {

                // Container dem Schiff hinzufügen:

                # große container sollten doppelt so viele geladener Container anzeigen wie man angibt
                $cargo_ship->add_container(new container_big($_POST["gewicht_container"]));

                # kleine container sollten genauso so viele geladener Container anzeigen wie man angibt
                #$cargo_ship->add_container(new container_big($_POST["gewicht_container"]));
                
            }

            ##########################
            # iterator Zusatzpunkt
            ##########################
            #foreach($cargo_ship as $container) {
            #  echo $container->is_weight();
            #}

            ##########################
            # Ergebnisse
            ##########################
            echo "Ergebnis: <br>";
            echo $cargo_ship->travel_time($_POST["strecke"]) . " Stunden<br>";
            echo $cargo_ship->amount_of_containers() . " geladene Container<br>";
            echo $cargo_ship->weight() . " Tonnen<br>";
        }
        echo "<br>";
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
