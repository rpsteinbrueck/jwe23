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

        // rm html tags
        $html_str = "<h1> This is <em>supposed</em> to be a <strong>h1</strong> heading</h1>";
        echo "<pre>" ;
        echo $html_str ;
        echo "<br/>";
        echo strip_tags($html_str);
        echo "<br/>";
        echo strip_tags($html_str, "<strong> <em>");
        echo "<br/>";
        echo strip_tags($html_str, "<h1>");
        echo "</pre>" ;

        echo "<br/>";


        $a_long_str =  "Some random sentance about the universe and its purpose...";
        echo $a_long_str;
        echo "<br/>";
        $a_long_str_length = strlen($a_long_str);
        echo "The above sentence has {$a_long_str_length} characters!";
        echo "<br/>";
        echo "<br/>";
        echo "<br/>";



        $a_long_str2 =  "Some random sentanÄce about the universe and its purpose...";
        echo $a_long_str2;
        echo "<br/>";
        $a_long_str_length2 = strlen($a_long_str2);
        echo "With strlen the above sentance has {$a_long_str_length2} characters, this is wrong!";
        echo "<br/>";
        $a_long_str_length2 = mb_strlen($a_long_str2, "utf8");
        echo "With mb_strlen the above sentence has {$a_long_str_length2} characters!";
        echo "<br/>";




        $sentence = "The is another random sentenace with the number 43. This is so random";
        echo $sentence;
        echo "<br/>";

        echo "Only showing the number";
        echo "<br/>";
        echo substr($sentence, "48", "2");
        echo "<br/>";

        $multiline_sentence =  "This is has multiple lines 
        line 1
        line 2
        line 3";

        echo "<br/>";
        echo $multiline_sentence;
        echo "<br/>";
        echo nl2br($multiline_sentence);
    ?>
</body>
</html>