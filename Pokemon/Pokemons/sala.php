<?php

    class Salameche extends Pokemon {

        public function __construct ($level) {
            $this->name = "Salameche";
            $this->type = "Feu";
            $this->lvup_life = 5;
            $this->lvup_str = 4;

            parent::__construct($this->name, $this->life, $this->max_life, $this->level, $this->type, $this->strength, $this->lvup_life, $this->lvup_str);
        }

        public static function say_hi () {
            echo "Sala-Salameche !\n";
        }
    }
?>