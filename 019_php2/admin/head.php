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
        body {
            padding: 50px;
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
        }

        nav {
            display: flex;
            flex-flow: column;
            justify-content: space-between;
            align-items: center;
            width: 400px;
            list-style-type: none;
        }

        .options {
            display: flex;
            flex-flow: row;
            justify-content: space-between;
            align-items: center;
            width: 400px;
            list-style-type: none;
            margin-bottom: 50px;
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
    <nav>
        <h2>Menu</h2>
        <div class="options">
            <button class="btn btn-success"><a href="index.php">Start</a></button>
            <button class="btn btn-success"><a href="ingredients_list.php">Ingredients</a></button>
            <a href="#">logged in as: <?php echo $_SESSION["username"]; ?></a>
            <button class="btn btn-success"><a href="logout.php">Logout</a></button>
        </div>
    </nav>
