<?php
    include "functions.php";

    if (!empty($_POST)){
        #echo "<pre>";
        #print_r($_POST);
        #echo "</pre>";

        if(empty($_POST["username"]) || empty($_POST["password"])) {
            $error = "username, password must be filled!";
        } else {
            # prevents sql injection
            $sql_username = mysqli_real_escape_string($con, $_POST["username"]);
            
            $sql_query = "SELECT * FROM users WHERE username = '{$sql_username}'";
            $result = mysqli_query($con, $sql_query);

            #echo "<pre>";
            #print_r($result);
            #echo "</pre>";

            $row =  mysqli_fetch_assoc($result);
            #print_r($row);

            if ($row) {
                if(password_verify($_POST["password"], $row["password"])){


                          $_SESSION["logged_in"] = true;
                          $_SESSION["username"] = $row["username"];

                          $current_datetime = date("Y-m-d H:i:s"); #9999-12-31 23:59:59.999999
                          $logins_sql_query =  "UPDATE users SET logins = logins + 1, last_login = '{$current_datetime}' WHERE id = {$row["id"]}";
                          mysqli_query($con, $logins_sql_query);

                          header("Location: index.php");
                          echo '<div class="alert alert-success" role="alert">
                                    Login successful!
                                </div>';
                          exit;
                } else {
                    $error = "Login not successful, please try again!";
                }
            } else {
                $error = "Username or password is wrong, please try again";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link
            rel="stylesheet"
            href="../../vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css"
        />
    <style>
        :root {
            --margin-var: 0px;
        }

        .login_form {
            margin: var(--margin-var);
        }

        .login-button {
            position: absolute;
            right: var(--margin-var);
        }

        @media (min-width: 1024px) {
            :root {
                --margin-var: 100px;
            }  
        }

        @media (min-width: 1800px) {
            :root {
                --margin-var: 300px;
            }  
        }
    </style>
</head>
<body>
    <div class="login_form">
        <h1>Login</h1>
        <?php
            if (!empty($error)){
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
            }
        ?>
        <form action="login.php" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <br>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <br>
            <div>
                <button class="btn btn-success login-button">Login</button>
            </div>
        </form>
    </div>
    <script src="../../vendor/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</body>
</html>