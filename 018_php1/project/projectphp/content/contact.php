                <?php
                    $display_form =  true;
                    $form_error = false;

                    $color_green = "#28a745";
                    $color_red = "#dc3545";

                    if (! empty($_POST)) {
                        #echo "<pre>";
                        #print_r($_POST);
                        #echo "</pre>";

                        $arr = $_POST;
                        $error_arr = array();

                        if (empty($arr['name']) || $arr ['name'] == 'Name') {
                            array_push($error_arr, "name");
                            $form_error = true; 
                        } else if (strlen($arr['name']) <=2 ) {
                            echo "<p style=\"color: {$color_red};font-size: 24px;\"> - Error: name should be more than two characters!</p>";
                            $form_error = true; 
                        }

                        if (empty($arr['email']) || $arr ['email'] == 'E-Mail') {
                            array_push($error_arr, "email");
                            $form_error = true; 
                        }
   
                        if (!empty($arr['test'])) {
                            echo "<p style=\"color: {$color_red};font-size: 24px;\"> - Error: do not enter the test field!</p>";
                            $form_error = true; 
                        }

                        if (empty($arr['message']) || $arr ['message'] == 'Ihre Nachricht') {
                            array_push($error_arr, "message");
                            $form_error = true; 
                        }

                        if (! $form_error ==  true) {
                            if (! preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$/", strtolower($arr['email']))){
                                echo "<p style=\"color: {$color_red};font-size: 24px;\"> - Error: The entered email adress is not valid!</p>";
                            } else {
                                echo "<p style=\"color: {$color_green}; font-size: 24px;\">Thanks <bold>{$arr['name']}</bold>, for contacting us!</p>";
                                echo "<p style=\"color: {$color_green}; font-size: 24px;\">We will get back to you ASAP!</p>";
                                
                                $display_form = false; 
                                $date = date("hisdmY");

                                # mail style config can either be html or plain
                                #$X_CONFIG_MAIL_STYLE = "plain"
                                $X_CONFIG_MAIL_STYLE = "html";

                                if ($X_CONFIG_MAIL_STYLE ==  "TEXT") {
                                    $mail_content =<<<EOF
Request over contact formular:
                                    
Name: {$arr['name']}
Email: {$arr['email']}
Message: {$arr['message']}
EOF;
                                    $outpot_file =  "data/contact_form/plain/{$arr['email']}_{$date}.txt";
                                } else if ($X_CONFIG_MAIL_STYLE == "html") {
                                    $mail_content =<<<EOF
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{$arr['name']}</title>
        <style>
            #page {
                background-color: #f2f2f2;
                display: flex;
                flex-flow: column;
                justify-content: center;
                align-items: center;
            }

            #content {
                background-color: #ffffff;
                width: 400px;
                height: 400px;
                display: flex;
                flex-flow: column;
            }

            h1 {
                color: black;
                text-align: center;
            }

            p {
                color: black;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div id="page">
            <div id="content">
                <h1>Request over contact formular:</h1>
                <br/>                                    
                <p>Name: {$arr['name']}</p>
                <p>Email: {$arr['email']}</p>
                <p>Message: {$arr['message']}</p>
            </div>
        </div>
    </body>
</html>
EOF;
                                    $outpot_file =  "data/contact_form/html/{$arr['email']}_{$date}.html";
                                }

                                mail("support@test.local", "Contact formular over werbsite from {$arr['name']}", $mail_content);
                                file_put_contents($outpot_file, $mail_content);
                            }
                        } else {
                            if (!empty($error_arr)) {
                                echo "<p style=\"color: {$color_red};font-size: 24px;\"> - Error: " .  implode( ", ", $error_arr) . " was not given!   </p>";
                            }
                        }
                    }
                ?>
                <div class="text">
                <h1>Kontakt</h1>
                <div class="left">
                    <h2>Wifi Salzburg</h2>
                    <p>
                        Musterhausstraße 13<br />
                        5020 Salzburg<br />
                        Österreich<br />
                        <br />
                        0043-662-12345<br />
                        <a href="mailto:rainer.christian@gmx.at">rainer.christian@gmx.at</a><br />
                        <a href="http://www.wifisalzburg.at" target="_blank">www.wifisalzburg.at</a><br />
                        <br />
                        <br />
                        Oder einfach Formular ausfüllen, abschicken, fertig!<br />
                        Wir werden uns umgehend um Ihr Anliegen bemühen.
                    </p>
                </div>
                <div class="contact right">
                    <?php 
                    if (!$display_form == false) { 
                    ?>
                    <form action="" method="post">
                        <div>
                            <input type="text" id="name" name="name" value="<?php if (!empty($arr['name'])) {
                                echo htmlspecialchars($arr['name']);
                            } else {
                                echo 'Name';
                            }?>" />
                        </div>
                        <div>
                            <input type="text" id="email" name="email" value="<?php if (!empty($arr['email'])) {
                                echo htmlspecialchars($arr['email']);
                            } else {
                                echo "E-Mail";
                            }?>" />
                        </div>
                        <div>
                            <input type="text" id="test" name="test" placeholder="Leave this form empty" />
                        </div>
                        <div>
                            <textarea id="message" name="message"><?php if (!empty($arr['message'])) {
                                echo $arr['message'];
                            } else {
                                echo htmlspecialchars("Ihre Nachricht");
                            }?></textarea>
                        </div>
                        <div style="text-align: right;">
                            <button type="submit" id="submit" name="submit">Absenden</button>
                        </div>
                    </form>
                    <?php 
                    }
                    ?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>