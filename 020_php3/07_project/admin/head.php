<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle DB</title>
    <link
            rel="stylesheet"
            href="../../../vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css"
        />
    <style>
        nav > .options > a {
            color: white;
        }

        .page_normal {
            display: flex;
            flex-flow: column;
        }

        .page_center {
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
            width: 200px;
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

        footer {
            padding-top: 100px;
        }

        .center_me {
            display: flex;
            justify-content: center;
            align-items: center;"
        }

        .center_button {
            width: 200px;

            display: flex;
            justify-content: center;
            align-items: center;"
        }

        /*@media (min-width: 1800px) {
            body {
                padding: 100px;
            }
        }*/
    </style>
</head>
<body>
    <nav class="navbar navbar-light" style="background-color: #010d2e;">
        <div class="options option1">
            <a href="?site=home">Home</a>
            <a href="?site=vehicle_list">Vehicle List</a>
        </div>
        <div class="options option2">
            <a href="#">logged in as: <?php echo $_SESSION["username"]; ?></a>
            <button class="btn btn-success"><a href="logout.php" style="color: white;">Logout</a></button>
        </div>
    </nav>
    <main>
