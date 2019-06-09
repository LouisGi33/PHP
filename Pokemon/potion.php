<?php
    class Potion {
        protected $name;
        protected $heal;

        public function __construct($name, $heal) {
            $this->name = $name;
            $this->heal = $heal;
        }

        public function healing(Pokemon $pokemon) {
            if ($pokemon->life + $heal >= $pokemon->max_life) {
                $pokemon->life = $pokemon->max_life;
            }
            else {
                $pokemon->life = $pokemon->life + $heal;
            }
            echo "Votre ".$pokemon->name." a récupéré ".$this->heal." (".$this->name.") ! Vous avez maintenant ".$pokemon->life."/".$pokemon->max_life." PV !";
        }
    }
?>