<html>
    <head>
        <meta charset="utf-8">
        <title>meteo</title>
        <?php 
        date_default_timezone_set ("Europe/Paris");
        if ((date("H") < 7) || (date("H") >= 19)) {
            include_once("nightmode.php"); 
        }        
        ?>
    </head>
    <body>
        <?php 
            echo 'Bonjour, nous sommes le ' . date("d-m-Y") . '. Il est ' . date("H:i") . ". <br><br>";
            echo '<a href="paris.php" style="text-decoration-line:none"> Meteo Paris </a><br>';
            echo '<a href="bordeaux.php" style="text-decoration:none"> Meteo Bordeaux </a>';
        ; ?>
    </body>
</html>