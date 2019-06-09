<?php
    class Hyperpotion extends Potion {
        public function __construct($inventory) {
            $this->inventory = 0;
            parent::__construct("Hyperpotion", 200);
        }
    }
?>