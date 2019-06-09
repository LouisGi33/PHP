<?php
    class Superball extends Ball {
        public function _construct($inventory) {
            $this->name = "Superball";
            $this->level = 30;
            $this->master = false;
            $this->inventory = 0;

            parent::__construct($name, $level);
        }
    }
?>