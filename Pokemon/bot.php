<?php
    include_once "./pokemon.php";
    include_once "./ball.php";
    include_once "./potion.php";
    include_once "./inventory.php";
    include_once "./Balls/pokeball.php";
    include_once "./Balls/superball.php";
    include_once "./Balls/hyperball.php";
    include_once "./Balls/masterball.php";
    include_once "./Potions/normalpotion.php";
    include_once "./Potions/superpotion.php";
    include_once "./Potions/hyperpotion.php";
    include_once "./Potions/potionmax.php";
    include_once "./Pokemons/cara.php";
    include_once "./Pokemons/sala.php";
    include_once "./Pokemons/bulbi.php";
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Pokemon Bot</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            $inventory = new Inventory ();
            $carapuce = new Carapuce (5);
            $salameche = new Salameche (8);
            $potion = new Normalpotion (2);
            $superpotion = new Superpotion (1);
            $pokeball = new Pokeball (3);

            $carapuce->attack($salameche);
            $salameche->bot_attack($carapuce);
            $carapuce->attack($salameche);
            $salameche->bot_attack($carapuce);

            $potion->healing($carapuce);
            $salameche->bot_attack($carapuce);

            $superpotion->healing($carapuce);
            $salameche ->bot_attack($carapuce);

            /* Bot non fini encore en raison des projets UF qui vont me foutre mon année en l'air */


        ?>
    </body>