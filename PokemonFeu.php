<?php
require_once "AttackPokemon.php";
require_once "Pokemon.php";
class PokemonFeu extends Pokemon {
    public function __construct($name, $url, $hp,$AttackPokemon) {
        parent::__construct($name, $url, $hp,$AttackPokemon);
    }
    
    public function attack(Pokemon $p){
        $hp_adversaire=$p->getHP();
        $a=1;

        if ($p instanceof PokemonPlante){
            $a*=2;
        }elseif ($p instanceof PokemonEau || $p instanceof PokemonFeu){
            $a*=0.5;
        }

        $rand = mt_rand() / mt_getrandmax();
        $random = random_int($this->AttackPokemon->getAttackMinimal(), $this->AttackPokemon->getAttackMaximal());
        if ($rand < $this->AttackPokemon->getProbabilitySpecialAttack()/100) {
            $hp_adversaire -=$random*$a*$this->AttackPokemon->getSpecialAttack();
            $p->setHP($hp_adversaire);
            return $random*$a*$this->AttackPokemon->getSpecialAttack(); 
        } else {
            $hp_adversaire -= $random*$a;
            $p->setHP($hp_adversaire);
            return $random*$a;
        }
         
    }
}

?>