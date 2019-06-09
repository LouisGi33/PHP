<?php
    class Pokeball extends Ball {
        public function _construct($inventory) {
            $this->name = "Pokeball";
            $this->level = 10;
            $this->master = false;
            $this->inventory = 3;

            parent::__construct($name, $level);
        }
    }
?>