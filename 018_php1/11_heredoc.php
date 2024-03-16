
    <?php
        $var1 = "Random Variable";
        echo <<<EOF
        This is an example of heredoc!
        With multiple lines and also variables such as the variable var1 which we defined earlier in the script: {$var1}.
        EOF;
    ?>
