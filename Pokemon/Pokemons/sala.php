<?php

    class Salameche extends Pokemon {

        public function __construct ($level) {
            $this->name = "Salameche";
            $this->type = "Feu";
            $this->lvup_life = 5;
            $this->lvup_str = 4;

            parent::__construct($name, $life, $max_life, $level, $type, $strength, $lvup_life, $lvup_str);
        }

        public static function say_hi () {
            echo "Sala-Salameche !\n";
        }
    }
?>