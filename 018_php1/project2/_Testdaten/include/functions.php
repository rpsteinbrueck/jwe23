<?php
	###########################
	#
	#	Name: rpsteinbrueck
	#	Date: 08.03.2024
	#	
	###########################

	###################################
	# generate random password function
	###################################
	function zufallspasswort ($length=8) {
		$random_password = "";
		for ($i = 0; $i <= $length; $i++) {
			$random_number = rand(0,9);
			if ($random_number < 3) {
				###############################################
				# generate random character between a-z and A-Z
				###############################################
				$alphabet = "abcdefghijklmnopqrstuvwxyz";
				$position = rand(0,strlen($alphabet));

				# if capital or small letters
				$bigorsmall = rand(0, 10);
				if ($bigorsmall < 5) {
					$random_password .=  strtoupper(substr($alphabet, $position, 1));
				} else {
					$random_password .= substr($alphabet, $position, 1);
				}
			} elseif ($random_number < 6) {
				###################################
				# generate random special character
				###################################
				$specialcharacters = "?!@#$%^&*()_+-}{";
				$position = rand(0,strlen(htmlspecialchars($specialcharacters)));
				$random_password .= substr(htmlspecialchars($specialcharacters), $position, 1);
			} else {
				################################
				# generate another random number
				################################
				$random_password .= rand(0,9);
			}
		}
		return $random_password;
	}
?>