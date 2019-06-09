<?php

    class Carapuce extends Pokemon {

        public function __construct ($level) {
            $this->name = "Carapuce";
            $this->type = "Eau";
            $this->lvup_life = 9;
            $this->lvup_str = 2;

            parent::__construct($this->name, $this->life, $this->max_life, $this->level, $this->type, $this->strength, $this->lvup_life, $this->lvup_str);
        }

        public static function say_hi () {
            echo "Cara-Carapuce !\n";
        }
    }
?>