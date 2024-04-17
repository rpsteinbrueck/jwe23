<?php

include "functions.php";

use rpsteinbrueck\jwe23\classes\dr;

$felix = new dr("Felix", 30000);
echo $felix->details();