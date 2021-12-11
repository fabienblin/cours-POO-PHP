<?php

abstract class Animal {
    public $diete;

    public function manger($nourriture){
        $this->diete = $nourriture;
    }
}

abstract class Oiseau extends Animal{
    public $plumes;

    public function toilette(){
        $this->plumes = "PROPRE";
    }
}

class Canard extends Oiseau{

    public function nage(){
        $this->plumes = "SALE";
    }
}


// Le villain petit canard est un Canard, un Oiseau et un Animal
// Il peut manger, faire sa toilette et nager

$villainPetitCanard = new Canard();

$villainPetitCanard->nage();

$villainPetitCanard->manger("algue");

$villainPetitCanard->toilette();

print_r($villainPetitCanard);