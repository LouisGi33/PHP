<?php

    class Pokemon {
        protected $name;
        protected $life;
        protected $max_life;
        protected $level;
        protected $type;
        protected $strength;
        protected $lvup_life;
        protected $lvup_str;

        public function __construct ($name, $level, $type) {
    		$this->name = $name;
            $this->life = $this->lvup_life * $level;
            $this->max_life = $life;
    		$this->level = $level;
    		$this->type = $type;
            $this->strength = $this->lvup_str * $level;

            static::say_hi();
        }
        
        public function level_up() {
            $this->level += 1;
            $this->life += $this->lvup_life;
            $this->max_life = $this->life;
            $this->strength += $this->lvup_str;

            echo "Bravo ! Votre ".$this->name." vient d'évoluer ! Il est maintenant lv ".$this->level.".\n Stat sup : Vie +".$this->lvup_life." & Force +".$this->lvup_str." !";
        }

        public function attack(Pokemon $pokemon) {
            $types = array("Eau" => "Feu", "Feu" => "Plante", "Plante" => "Eau");
            $hit = ceil($this->strength * (rand(900, 1100) / 1000));
            $resi = $types[$pokemon->type];
            $weak = $types[array_search($pokemon->type, $types)];
            $hit = $resi == $this->type ? ceil($hit * 2) : $weak == $this->type ? ceil($hit / 2) : $hit ;
            $pokemon->hit($hit);
        }

        public function hit($hit) {
            $this->life -= $hit;
            $this->life = $this->life < 0 ? 0 : $this->life;
            echo "Outch ! ".$this->name." a encore ".$this->life."/".$this->max_life." PV.";
        }

        public function bot_attack(Pokemon $pokemon) {
            $this->attack($pokemon);
        }
    }
?>