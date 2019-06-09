<?php
    class Hyperball extends Ball {
        public function _construct($inventory) {
            $this->name = "Hyperball";
            $this->level = 50;
            $this->master = false;
            $this->inventory = 0;

            parent::__construct($name, $level);
        }
    }
?>