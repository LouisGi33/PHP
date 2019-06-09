<?php
    class Masterball extends Ball {
        public function _construct($inventory) {
            $this->name = "Masterball";
            $this->level = 100;
            $this->master = true;
            $this->inventory = 0;

            parent::__construct($name, $level);
        }
    }
?>