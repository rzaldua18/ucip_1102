<html>
    <head>
        <?php ?>
        <title>Template in PHP</title>
        <style type="text/css">
            body{
                font-family:Verdana, Ganeva, Tahoma, sans-serif;
            }
        </style>
    </head>
    <body>
        <h1>Welcome to PHP </h1>
        <?php 
            //constant value is CAPITALIZE
            //declaration of variable in PHP
            $user="Ralf"; //string value
            $experience=20; //numeric
            $booleanValue=true; //1 or 0
            echo "<h2> Welcome ". $user."</h2>";
            //declare constant value
            echo "<p>No of Experience: ".$experience;
            echo "</p>";
            echo "The value of boolean is: $booleanValue <br>"; // display the variable
            echo 'The value of boolean is: $booleanValue.<br>'; // read the string
            
            //declare constant value
        ?>
        <h1>Declaring Constant Values</h1>
        <?php
            define("USERNAME","admin");
            define("PASSWORD", 123456);
            echo "Username "."<b><i>".USERNAME. "</i></b><br>";
            echo "Password "."<b><u>".PASSWORD. "</u></b><br>";
        ?>
        <h1> Declaring an Escape Sequence</h1>
        <?php
            echo "You have \$100 in your account"."<br>";
            echo "This is a backslash \\"."<br>";
            echo "This is a single quote ' and this is a double quote \""."<br>";
        ?>
        <h1>Application of Typecasting and Gettype</h1>
        <?php
            $foo=2.5; // float number
            $nfoo = (int) $foo+1;
            echo 'The data type of $foo is: '.gettype($foo)."<bzr>"; 
            echo '$nfoo variable is converted to data type is '. gettype($nfoo)."<br>";
        ?>
    </body>
</html>
