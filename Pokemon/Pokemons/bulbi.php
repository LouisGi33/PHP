<?php

    class Bulbizarre extends Pokemon {

        public function __construct ($level) {
            $this->name = "Bulbizarre";
            $this->type = "Plante";
            $this->lvup_life = 7;
            $this->lvup_str = 3;

            parent::__construct($name, $life, $max_life, $level, $type, $strength, $lvup_life, $lvup_str);
        }

        public static function say_hi () {
            echo "Bulbi-Bulbizarre !\n";
        }
    }
?>