<?php 
    $database_host = 'localhost';
    $database_port = '3307';
    $database_dbname = 'spawn';
    $database_user = 'root';
    $database_password = '';
    $database_charset = 'UTF8';

    try{
        $dsn = new PDO('mysql:host='.$database_host.';port='.$database_port.';dbname='.$database_dbname . ';charset=' . $database_charset, $database_user,$database_password) OR DIE('Erreur de connexion') ;
    }
    catch (PDOException $e) {
        echo ' Erreux ! : '.$e->getMessage()."<br/>";
        die();
    }


/*    try {
        $connexion = new PDO ('mysql:host=localhost:3307:dbname=spawn','root','') ;
    } */

    
; ?>

<html lang="fr">
    <head>
        <title>Spawn</title>
        <meta charset = "UTF-8">
        <style>
        body {
            display: block;
            text-align: center;
        }

        </style>
    </head>
    <body>
        <h1>Fonctionnalités : </h1>

        <form action="" method="POST">
        <input type="submit" value="Liste des Spawns" name="list" />


        <?php 

        // ** LISTE SPAWNS **
            $list = $dsn->query('SELECT * FROM list_spawn l ORDER BY l.name;');
            $list_name = $list->fetchAll();
            if (isset($_POST["list"]))  {
            
                echo "<table align=\"center\" border=\"5\" CELLPADDING=\"10\" CELLSPACING=\"10\">";
                echo "<tr>";
                echo "<th> Numero </th>";
                echo "<th> Spawn</th>";
                echo "</tr>";
                
                foreach ($list_name as $key => $variable)
                {
                    echo "<tr>";
                    echo "<td>".$list_name[$key]['id']."</td>";
                    echo "<td>".$list_name[$key]['name']."</td>";
                    echo "</tr>";
                    
                } 
            } ?>
        <br /> <br />
        


        <form action="" method="POST">
            <input type="submit" value="Creation d'un Spawn" name="crea" />
            <br />
        <?php 

        // ** CREATION SPAWN **
            if (isset($_POST["crea"])) {
                echo '<input type="text" name="nom" placeholder="Nom du Spawn" /><br />';
                echo '<input type="text" name="url" placeholder="URL de l\'image" /><br />';
                echo '<input type="submit" value="OK">';
            }
            $crea = $dsn->prepare('INSERT INTO list_spawn(list_spawn.name) VALUES(?, ?)');
            if ((isset($_POST["url"])) && (isset($_POST["nom"]))) {
                $url = $_POST['url']; 
                $path = `C:\wamp64\www\spawn\images`;
                $cut = explode('/',$url);
                $fichier = array_pop($cut);
                
                // Le chemin de sauvegarde 
                
                // On coupe le chemin 
                
                // On recup l'adresse du serveur 
                // $serv = $exp[0].'//'.$exp[2]; 
                // On recup le nom du fichier 
                
                echo $fichier; 
                // On genere le contexte (pour contourner les protections anti-leech) 
                // $xcontext = stream_context_create(array("http"=>array("header"=>"Referer: ".$serv."\r\n"))); 
                // On tente de recuperer l'image 
                // $content = file_get_contents($url,false,$xcontext); 
                // if ($content === false) { 
                    // echo "\nImpossible de récuperer le fichier."; 
                // } 
                // Sinon, si c'est bon, on sauvegarde le fichier 
                // $test = file_put_contents($path.'/'.$name,$content); 
                // if ($test === false) { 
                    // echo "\nImpossible de sauvegarder le fichier.";  
                // } 
                // Tout est OK 
                
                $crea->execute(array($fichier, $_POST['url']));
                echo "\nSauvegarde effectuée avec succés."; 
            }
            else {
                echo "\nca marche pas";
            }
        ?>

        <br /> <br /> 
        <form action="" method="POST">
            <input type="submit" value="Modifier un Spawn" name="change" />
        <?php 

        // ** CHANGE SPAWN **

        ?>
        
        <br /> <br /> 
        <form action="" method="POST">
            <input type="submit" value="Supprimer un Spawn" name="rm" />

        <?php 

        // ** DELETE SPAWN **
            if (isset($_POST['rm'])) {
                echo '<input type="text" name="id" placeholder="ID du Spawn" />';
            }
            // $del_sp = 
            // $rm = "DELETE FROM list_spawn WHERE list_spawn.name = ".$del_sp." ;";
            // $rmv = $dsn->exec($rm(array($)));
        ?>

    
        <br /> <br /> 
        <form action="" method="POST">
            <input type="submit" value="Spawn aléatoire ! " name="random" />
            <input type="hidden" name="check" />

        <br /> 
        <?php 
        // ** RANDOM SPAWN **
            $check = $_POST['random'];
            if ((isset($_POST['check'])) && (!empty($_POST['check']))) {
                
                do{
                    echo 'ok';
                    $path = 'SELECT i.name, l.name from img_spawn i JOIN list_spawn l ON l.id = i.id order by rand() limit 1';
                    $rand = $dsn->query($path);
                    $new_sp = $rand->fetch();
                } while ($check == $new_sp[1]) ;
            }
            else {    
                // echo "ok";
                $path = 'SELECT i.name, l.name from img_spawn i JOIN list_spawn l ON l.id = i.id order by rand() limit 1';
                $rand = $dsn->query($path);
                $new_sp = $rand->fetch();
            }
            if (isset($_POST["random"])) {
                echo '<br><img src="'.$new_sp[0].'" alt="" width="500"><br>';
                echo '<h2>'.$new_sp[1].'</h2>';
            }
            
        ; ?>

    </body>
</html>



