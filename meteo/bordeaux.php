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
        echo '<a href="index.php" style="text-decoration-line:none"> Retour Accueil </a><br><br>';
        echo '<a href="paris.php" style="text-decoration-line:none"> Meteo Paris </a><br>';
        for ($i = 0; $i <= 4; $i++)
        {
            echo "<img src='https://www.prevision-meteo.ch/uploads/widget/bordeaux_" . $i . ".png' width='650' height='250' />";
        }
        ; ?>
    </body>
</html>