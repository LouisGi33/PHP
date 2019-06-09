<?php
    class Potionmax extends Potion {

        public function __construct($inventory) {
            $this->inventory = 0;
            $this->max = $pokemon->max_life;
            parent::__construct("Potionmax", $this->max);
        }
        
    }
?>