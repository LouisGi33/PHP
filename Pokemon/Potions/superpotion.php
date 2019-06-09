<?php
    class Superpotion extends Potion {
        public function __construct($inventory) {
            $this->inventory = 1;
            parent::__construct("Superpotion", 50);
        }
    }
?>