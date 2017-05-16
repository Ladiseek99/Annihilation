<?php

namespace Annihilation\Object;

class Player{
  public $team = null;
  public $name;
  public $wasingame = false;
  public $kit = "civilian";
  
  public function __construct($name){
    $this->name = $name;
  }
  
  public function getTeam(){
    return $this->team;
  }
  
  public function setTeam($team){
    $this->team = $team;
  }
  
  public function getKit(){
    return $this->kit;
  }
  
  public function setKit($kit){
    $this->kit = $kit;
  }
}
