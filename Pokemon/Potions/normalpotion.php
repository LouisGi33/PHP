<?php
    class Normalpotion extends Potion {
        public function __construct($inventory) {
            $this->inventory = 2;
            parent::__construct("Potion", 20);
        }
    }
?>