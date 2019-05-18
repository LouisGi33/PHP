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
         
        
        <?php 
             ?>

        <form action="" method="POST">
        <input type="submit" value="Liste des Spawns" name="list">


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
            <input type="submit" value="Creation d'un Spawn" name="crea">
            <br />
        <?php 

        // ** CREATION SPAWN **
            if (isset($_POST["crea"])) {
                echo '<input type="text" name="nom" placeholder="Nom du Spawn" /><br />';
                echo '<input type="text" name="url" placeholder="URL de l\'image" /><br />';
                echo '<input type="submit" value="OK">';
            }
            $crea = $dsn->prepare('INSERT INTO list_spawn(list_spawn.name) VALUES(?)');
            if ((isset($_POST["url"])) && (isset($_POST["nom"]))) {
                $url = $_POST['url']; 
                $img_name = $_POST["nom"];
                $path = `/images`;
                $cut = explode('/',$url);
                $serv = $cut[0].'//'.$cut[2]; 
                $fichier = array_pop($cut);

                echo $cut[2]; 
                // On genere le contexte (pour contourner les protections anti-leech) 
                $xcontext = stream_context_create(array("http"=>array("header"=>"Referer: ".$serv."\r\n"))); 
                // Recuperation img
                $content = file_get_contents($url,false,$xcontext); 
                if ($content === false) { 
                    echo "\nImpossible de récuperer le fichier."; 
                } 
                // Sauvegarde de l'img 
                $test = file_put_contents($path.'/'.$fichier,$content); 
                if ($test === false) { 
                    echo "\nImpossible de sauvegarder le fichier.";  
                }
                else if ($test === true) {
                    echo "\n GG";
                }
                
                $crea->execute(array($fichier));
                echo "\nSauvegarde effectuée avec succés."; 
            }
            else {
                echo "\nca marche pas";
            }
        ?>

        <br /> <br /> 
        <form action="" method="POST">
            <input type="submit" value="Modifier un Spawn" name="change">
        <?php 

        // ** CHANGE SPAWN **

        ?>
        
        <br /> <br /> 
        <form action="" method="POST">
            <input type="submit" value="Supprimer un Spawn" name="rm">

        <?php 

        // ** DELETE SPAWN **
            if (isset($_POST['rm'])) {
                echo '<input type="text" name="id" placeholder="ID du Spawn">';
                echo '<input type="submit" value="OK">';
            }
            if (isset($_POST['id'])) {
                $del_sp = $_POST['id'];
                $table = array('list', 'img');
                for ($i = 0; $i < 2; $i++) {
                    $rm = $dsn->prepare("DELETE FROM ".$table[$i]."_spawn WHERE id = ".$del_sp." ;");
                    $rmv = $rm->execute();
                }
            } ?>
    
        <br /> <br /> 
        <?php

        // ** RANDOM SPAWN **
            if ((isset($_POST['check'])) && (!empty($_POST['check']))) {
                $check = $_POST['check'];
                do{
                    $path = 'SELECT i.name, l.name from img_spawn i JOIN list_spawn l ON l.id = i.id order by rand() limit 1';
                    $rand = $dsn->query($path);
                    $new_sp = $rand->fetch();
                } while ($check == $new_sp[1]) ;
            }
            else {    
                $path = 'SELECT i.name, l.name from img_spawn i JOIN list_spawn l ON l.id = i.id order by rand() limit 1';
                $rand = $dsn->query($path);
                $new_sp = $rand->fetch();
            }
            
        ?>
        <form action="" method="POST">
            <input type="submit" value="Spawn aléatoire ! " name="random">
            <input type="hidden" name="check" value="<?= $new_sp[1] ;?>">
            
        <br /> 
        <?php 
            if (isset($_POST["random"])) {
                echo '<br><img src="'.$new_sp[0].'" alt="" width="500"><br>';
                echo '<h2>'.$new_sp[1].'</h2>';
            }
            
        ; ?>

    </body>
</html>





