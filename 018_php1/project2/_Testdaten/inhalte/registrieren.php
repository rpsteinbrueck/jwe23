<div class='wrapper'>
	<div class='row'>
		<div class='col-xs-12'>
			<h1>Registrierung</h1>
		</div>
	</div>
</div>

<form id='register-form' method="post" action="index.php?seite=registrieren">
	<div class="wrapper">
		<div class='row'>
			<div class='col-xs-12 col-sm-12'>
			<?php
				###########################
				#
				#	Name: rpsteinbrueck
				#	Date: 08.03.2024
				#	
				###########################

			    ###########################
				# variables
				###########################
			    $display_form =  true;
			    $form_error = false;
			    $color_green = "#28a745";
			    $color_red = "#dc3545";


				###########################
				# if post not empty
				###########################
				if (! empty($_POST)) {
					$error_arr = array();
				
					###########################
					# validate username
					###########################
					if (empty($_POST['benutzername'])) {
						array_push($error_arr, "benutzername");
						$form_error = true; 
					} elseif (strlen($_POST['benutzername']) < 4 ) {
						echo "<p style=\"color: {$color_red};font-size: 18px;\"> - Fehler: Benutzername sollte mindestens 4 Charakter haben.</p>";
						$form_error = true; 
					} elseif (! preg_match('/^[a-zA-Z0-9]+$/', $_POST['benutzername'])) {
						echo "<p style=\"color: {$color_red};font-size: 18px;\"> - Fehler: Benutzername darf nur aus Buchstaben und Zahlen bestehen.</p>";
						$form_error = true; 
					}
				
					###########################
					# validate password
					###########################
					if (empty($_POST['passwort'])) {
						array_push($error_arr, "Kennwort");
						$form_error = true; 
					} elseif (strlen($_POST['passwort']) < 6 ) {
						echo "<p style=\"color: {$color_red};font-size: 18px;\"> - Fehler: Kennwort sollte mindestens 6 Zeichen lang sein.</p>";
						$form_error = true; 
					} elseif (! preg_match("@[a-zA-Z]@", $_POST['passwort']) || ! preg_match("@[0-9]@", $_POST['passwort']) || ! preg_match("@[^\w]@", $_POST['passwort'])) {
						echo "<p style=\"color: {$color_red};font-size: 18px;\"> - Fehler: Kennwort muss mindestens einen Buchstaben, eine Zahl und ein Sonderzeichen beinhalten.</p>";
						$form_error = true; 
					} 
				
					###########################
					# validate email adress
					###########################
					if (empty($_POST['email'])) {
						array_push($error_arr, "E-Mail Adrresse");
						$form_error = true; 
					} elseif (! preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$/", strtolower($_POST['email']))){
						echo "<p style=\"color: {$color_red};font-size: 18px;\"> - Fehler: Die angegebene Email Adresse ist nicht valide!</p>";
						$form_error = true;
					}
				
					###########################
					# validate agb
					###########################
					if (empty($_POST['agb']) || $_POST['agb'] != "on") {
						echo "<p style=\"color: {$color_red};font-size: 18px;\"> - AGB haken muss gesetzt sein.</p>";
						$form_error = true; 
					}
				
					###########################
					# if error array not empty
					###########################
					if (!empty($error_arr)) {
						echo "<p style=\"color: {$color_red};font-size: 18px;\"> - Fehler: " .  implode( ", ", $error_arr) . " wurde nicht anngeben!</p>";
					} else {
						###########################
						# validation success
						###########################
						if (! $form_error ==  true) {
								echo "<p style=\"color: {$color_green}; font-size: 18px;\">Danke <bold>{$_POST['benutzername']}</bold>, fürs registrieren!</p>";

								$display_form = false; 
                                $date = date("hisdmY");

								# heredoc for file content
                                $registration_content =<<<EOF
Registrierung :
                                    
Benutzername: {$_POST['benutzername']}
Passwort: {$_POST['passwort']}
Email: {$_POST['email']}
AGB: {$_POST['agb']}
EOF;

                                $output_file_name =  "registrierungen/{$_POST['email']}_{$date}.txt";
                                file_put_contents($output_file_name, $registration_content);
						}
					}
				}
			?>
			</div>
			<?php 
                if (!$display_form == false) { 
            ?>
			<div class='col-xs-12 col-sm-12'>
				<label for='username'>Benutzername</label>
				<!--<input type='text' id='username' name='benutzername' required/>-->
				<input type='text' id='username' name='benutzername' <?php 
						if (!empty($_POST['benutzername'])) {
                            echo "value=" . htmlspecialchars($_POST['benutzername']);
                        }
					?>			
				/>
			</div>
			<div class='col-xs-12 col-sm-12'>
				<label for='password'>Passwort</label>
				<!--<input type='password' id='password' name='passwort' required/>-->
				<input type='password' id='password' name='passwort' <?php 
						if (!empty($_POST['passwort'])) {
                            echo "value=" . htmlspecialchars($_POST['passwort']);
                        }
					?> 
				/>
			</div>
			<div class='col-xs-12 col-sm-12'>
				<label for='email'>E-Mail</label>
				<!--<input type='text' id='email' name='email' required/>-->
				<input type='text' id='email' name='email' <?php
						if (!empty($_POST['email'])) {
                    		echo "value=" . htmlspecialchars($_POST['email']);
                    	}
					?>
				/>
			</div>
			<div class='col-xs-12 col-sm-12'>
				<!--<input type='checkbox' id='toc' name='agb' required/>-->
				<input type='checkbox' id='toc' name='agb'/>
				<label for='toc'>Ich akzeptiere die AGB.</label>
			</div>
			<div class='col-xs-12'>
				<input type='submit' value='Registrieren' />
			</div>
			<?php } ?>
		</div>
	</div>
</form>
