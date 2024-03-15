<?php

$password = "1234";
$md5_password = md5($password);
$salt = "yxcsdasd99349391230as111112312312312313";
$salted_md5_password = md5($password . $salt);

echo $password;
echo "<br/>";

echo $md5_password;
echo "<br/>";

echo $salted_md5_password;
echo "<br/>";

$db_password = "a3b38f2d0c7047d97fb02850e61e5ebf";
#$db_password = "a3b1111111111111111111111111111f";

if ($db_password == $salted_md5_password) {
    echo "correct password!";
    echo "<br/>";
} else {
    echo "password is wrong!";
    echo "<br/>";
}
?>