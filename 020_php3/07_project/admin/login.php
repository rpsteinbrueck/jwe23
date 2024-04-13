<?php
    include "setup.php";

    use rpsteinbrueck\jwe23\classes\validate;
    use rpsteinbrueck\jwe23\classes\mysql;

    if (!empty($_POST)){

        # validation
        $validate = new validate();
        $validate->check_if_set($_POST["username"], "username");
        $validate->check_if_set($_POST["password"], "password");

        if ($validate->no_errors()) {
            $conn = new mysql();
            $sql_username = $conn->escape($_POST["username"]);
            $result = $conn->query("SELECT * FROM users WHERE username = '{$sql_username}'");
            $user = $result->fetch_assoc();
            # Debug
            # echo "<pre>"; print_r($user);echo "</pre>";

            if (empty($user) ||!password_verify($_POST["password"], $user["password"])) {
                # error user does not exist
                $validate->add_error("User or password was wrong!");
            } else {
                # login
                $_SESSION["logged_in"] = true;
                $_SESSION["username"] = $user["username"];
                $_SESSION["user_id"] = $user["id"];

                # redirect to home page
                header("Location: index.php");
                exit;
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
            href="../../../vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css"
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

        .center_me {
            display: flex;
            justify-content: center;
            align-items: center;"
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
            if (!empty($validate)) {
                echo $validate->html_errors();
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