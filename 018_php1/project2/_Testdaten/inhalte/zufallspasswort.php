		<?php
			###########################
			#
			#	Name: rpsteinbrueck
			#	Date: 08.03.2024
			#	
			###########################

			include "/include/functions.php"
		?>
		<div id='journal'>
			<div class='wrapper'>
					<div class='row'>
						<div class='col-xs-12'>
								<h1>Zufallspasswort</h1>
						</div>
					</div>

					<div class='row'>
						<div class='col-xs-12'>
							<?php 
								###########################
								# loop for 10 generated passwords
								###########################
								for ($passwords = 1; $passwords <= 10; $passwords++) {
									echo zufallspasswort() . "<br/>";
								}
							?>
						</div>
					</div>

			</div>
		</div>
