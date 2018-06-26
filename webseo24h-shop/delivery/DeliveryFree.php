<?php
class DeliveryFree {
    public $freePecent;
    public $minFree;
    public $currency;

    public function __constructor(){
        $this->freePecent = 2;
        $this->minFree = 15000;
    }
}

class CodFree extends DeliveryFree {
    public $free;
    // get free = 2%

    public function __constructor(){
        $this->free = 0;
        $this->ruleFree();
    }

    public function setFree($free){
        $this->free = $free;
    }

    public function getFree(){
        return $this->free;
    }

    public function ruleFreeByPrice($totalPrice){
        $free = 0;        
        $_free = ceil(($totalPrice * $this->freePecent)/100);
        $_free = ($_free > $this->minFree) ? $_free : $this->minFree;
        $this->setFree($_free);
    }
}