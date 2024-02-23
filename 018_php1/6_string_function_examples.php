<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String function examples in PHP</title>
</head>
<body>
    <?php
        // lower case
        echo("<h1>String function examples in PHP</h1>");

        $str =  "Some Random String";
        echo("Original value for \$str: \"{$str}\"<br/>");
        echo(strtolower($str)."<br/>");

        /*$special_characters = "FÜr dich";
        echo(mb_strtolower($special_characters));*/
        

        // trim empty spaces bevor and after strings
        $str2 = "        Some Random String        ";
        echo("<pre>");
        echo(trim($str2));
        echo("</pre>");

        // trim character/s from string
        echo("<pre>");
        echo(trim($str, "g n"));
        echo("</pre>");
    ?>
</body>
</html>