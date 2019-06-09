<?php

    class Carapuce extends Pokemon {

        public function __construct ($level) {
            $this->name = "Carapuce";
            $this->type = "Eau";
            $this->lvup_life = 9;
            $this->lvup_str = 2;

            parent::__construct($name, $life, $max_life, $level, $type, $strength, $lvup_life, $lvup_str);
        }

        public static function say_hi () {
            echo "Cara-Carapuce !\n";
        }
    }
?>