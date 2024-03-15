
<?php
####################################
# Can still be salted!!!
####################################
$password = "1234";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo $hashed_password;
echo "<br/>";

echo password_verify("random_characters", $hashed_password);
echo "<br/>";
echo password_verify($password, "random_charcters");
echo "<br/>";
echo password_verify($password, $hashed_password);
echo "<br/>";

if (password_verify($password, $hashed_password)) {
    echo "correct password!";
    echo "<br/>";
} else {
    echo "password is wrong!";
    echo "<br/>";
}