<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>difference between heredoc and nowdoc</title>
</head>
<body>
    <?php
        class foo {
            public $foo;
            public $bar;

            function __construct() {
                $this->foo = "foo";
                $this->bar = array("Bar1","Bar2","Bar3");
            }
        }

        $foo = new foo();
        $name = "MyName";

        echo "<h1>heredoc</h1>";

        echo <<<EOF
        My name is "$name". I am printing some $foo->foo.
        Now I am printing some {$foo->bar[1]}.
        This should print a capital 'A': \x41
        EOF;

        echo "<h1>nowdoc</h1>";

        echo <<<'EOF'
        My name is "$name". I am printing some $foo->foo.
        Now I am printing some {$foo->bar[1]}.
        This should not print a capital 'A': \x41
        EOF;

        
    ?>
</body>
</html>