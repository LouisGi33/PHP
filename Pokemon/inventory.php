<?php
    class Inventory {
        protected $inventory = array();

        public function add($item) {
            array_push($this->inventory, $item);
        }

        public function del($item) {
            $use = array_search($item, $this->inventory);
            unset($this->inventory[$use]);
        }

    }
?>