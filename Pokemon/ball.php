<?php

    class Ball {
        protected $name;
        protected $level;
        protected $master;

        public function __construct($name, $level) {
            $this->name = $name;
            $this->level = $level;
        }

        public function capture(Pokemon $pokemon) {
            $capture = round((($pokemon->max_life - $pokemon->life) / $pokemon->max_life) * (1 + ($this->level - $pokemon->level) / 25), 2);
            $random = rand(0, 100)/100;
            $success = "TIN TIN TIN TIN TIN !!!\n Bravo vous avez capturé le ".$pokemon->name." avec votre ".$ball->name." !";

            if ($this->master) {
                $new_pokemon = clone $pokemon;
                echo $success;
            }
            else if ($capture >= $random) {
                $new_pokemon = clone $pokemon;
                echo $success;
            }
            else {
                echo "Votre tentative de capture a echouée..";
            }
        }
    }
?>

