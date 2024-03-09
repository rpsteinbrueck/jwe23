<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe management admin area</title>
    <style>
        body {
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
        }

        th {
            background-color:#d9d9d9;
        }

        tr:nth-child(2n) {
            background-color:#80ccff;
        }

        @media (min-width: 1800px) {
            body {
                padding: 200px;
            }
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Start</a></li>
            <li><a href="ingredients_list.php">Ingredients</a></li>
        </ul>
    </nav>