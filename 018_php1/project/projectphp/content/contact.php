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
                            echo "<p style=\"color: {$color_red};font-size: 24px;\">Error: name should be more than two characters!</p>";
                        }

                        if (empty($arr['email']) || $arr ['email'] == 'E-Mail') {
                            array_push($error_arr, "email");
                            $form_error = true; 
                        }

                        if (empty($arr['message']) || $arr ['message'] == 'Ihre Nachricht') {
                            array_push($error_arr, "message");
                            $form_error = true; 
                        }

                        if (! $form_error ==  true) {
                            if (! preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", strtolower($arr['email']))){
                                echo "<p style=\"color: {$color_red};font-size: 24px;\">The entered email adress is not valid!</p>";
                            } else {
                                #echo "<p style=\"color: {$color_green};\">email is correct</p>"; 
                                echo "<p style=\"color: {$color_green}; font-size: 24px;\">Thanks <bold>{$arr['name']}</bold>, for contacting us!</p>";
                                echo "<p style=\"color: {$color_green}; font-size: 24px;\">We will get back to you ASAP!</p>";
                                $display_form = false; 
                            }
                        } else {
                            echo "<p style=\"color: {$color_red};font-size: 24px;\">Error: " .  implode( ", ", $error_arr) . " was not given!   </p>";
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
                            <input type="text" id="name" name="name" value="Name" />
                        </div>
                        <div>
                            <input type="text" id="email" name="email" value="E-Mail" />
                        </div>
                        <div>
                            <textarea id="message" name="message">Ihre Nachricht</textarea>
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