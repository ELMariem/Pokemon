<?php
require_once "AttackPokemon.php";

class Pokemon {
protected $name;
protected $url;
protected $hp;
protected AttackPokemone $AttackPokemon;
//public static $nbr_round = 1;
public function __construct($name, $url, $hp,$AttackPokemon){
    $this->name = $name;
    $this->url = $url;
    $this->hp = $hp;
    $this->AttackPokemon = $AttackPokemon;
}

public function getName(){return $this->name;}
public function getUrl(){ return $this->url;}
public function getHP(){return $this->hp;}
public function getAttackPokemon(){return $this->AttackPokemon;}
public function setName($name){$this->name = $name;}
public function setUrl($url){$this->url = $url;}
public function setHP($hp){$this->hp = $hp;}
public function setAttackPokemon(AttackPokemone $AttackPokemon){$this->AttackPokemon = $AttackPokemon;}
public function isDead(){
    if ($this->gethp() <= 0) {
            return true;
    }else{
        return false;
        }    }
public function TheWinner($Pokemon2){
    if($this->getHP() > $Pokemon2->getHP()){
        return $this ;
    }else{
        return $Pokemon2;
    }}


public function attack(Pokemon $p){
    $hp_adversaire=$p->getHP();
    $rand = mt_rand() / mt_getrandmax();
    $random = random_int($this->AttackPokemon->getAttackMinimal(), $this->AttackPokemon->getAttackMaximal());
    if ($rand < $this->AttackPokemon->getProbabilitySpecialAttack()/100) {
        $hp_adversaire -=$random*$this->AttackPokemon->getSpecialAttack();
        $p->setHP($hp_adversaire);
        return $random*$this->AttackPokemon->getSpecialAttack(); 
    } else {
        $hp_adversaire -= $random;
        $p->setHP($hp_adversaire);
        return $random;
    }
     
}
public function WhoAmI(){
        return [
            "Name" => $this->getName(),
            "URL" => $this->getUrl(),
            "Points" => $this->getHP(),
            "Min Attack points" => $this->AttackPokemon->getAttackMinimal(),
            "Max Attack points" => $this->AttackPokemon->getAttackMaximal(),
            "Special Attack" => $this->AttackPokemon->getSpecialAttack(),
            "Probability of Special Attack" => $this->AttackPokemon->getProbabilitySpecialAttack()
        ];
    
}

}

?>