<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe management admin area</title>
    <link
            rel="stylesheet"
            href="../../vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css"
        />
    <style>
        nav > .options > a {
            color: white;
        }

        main {
            padding: 50px;
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
        }

        .options {
            display: flex;
            flex-flow: row;
            justify-content: space-between;
            align-items: center;
            width: 260px;
            list-style-type: none;
            padding-left: 20px;
            padding-right: 20px;
        }

        .option1 {
            width: 300px;
        }

        h1 {
            margin-bottom: 50px;
        }

        btn,
        button > a {
            color: white;
        }

        a {
            text-decoration:none;
            color: black;
        }

        hr {
            color: #ff5733;
        }

        th {
            background-color:#d9d9d9;
        }

        tr:nth-child(2n) {
            background-color: #ff5733;
        }

        footer {
            padding-top: 100px;
        }

        /*@media (min-width: 1800px) {
            body {
                padding: 100px;
            }
        }*/
    </style>
</head>
<body>
    <nav class="navbar navbar-light" style="background-color: #116969;">
        <div class="options option1">
            <a href="?site=home">Home</a>
            <a href="?site=ingredients_list">Ingredients</a>
            <a href="?site=recipe_list">Recipes</a>
        </div>
        <div class="options option2">
            <a href="#">logged in as: <?php echo $_SESSION["username"]; ?></a>
            <button class="btn btn-success"><a href="logout.php" style="color: white;">Logout</a></button>
        </div>
    </nav>
    <main>
