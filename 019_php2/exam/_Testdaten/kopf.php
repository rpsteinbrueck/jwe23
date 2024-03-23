<!DOCTYPE html>
<html>
  <head>
    <title>Administration</title>
    <meta charset='utf-8' />
    <link href='bootstrap.min.css' type='text/css' rel='stylesheet' />
    <style>
        nav > .options > a {
            color: white;
        }

        ._center {
            padding: 50px;
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
        }

        .center_me {
            display: flex;
            justify-content: center;
            align-items: center;"
        }
    </style>
  </head>
  <body>
    <?php
    #<nav>
    #  <ul>
    #    <li><a href='index.php'>Start</a></li>
    #    <li><a href='flug_liste.php'>Flüge</a></li>
    #  </ul>
    #</nav>
    ?>
    <nav class="navbar navbar-light" style="background-color: #181c1e;">
        <div class="options options1">
          <a href="#">PHP2 PRÜFUNG</a>
        </div>
        <div class="options option2">
            <a href='index.php'>Home</a>
            <a href='flug_liste.php'>Flug Liste</a>
            <a href='passagiere_list.php'>passagiere</a>
        </div>
    </nav>
