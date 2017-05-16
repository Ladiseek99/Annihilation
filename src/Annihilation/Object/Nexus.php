<?php

namespace Annihilation\Object;

class Nexus{
  public $isalive = false;
  public $health = "75";
  public $break;
   
  public function __construct($name){
    $this->name = $name;
  }
  
  public function isAlive(){
    if($this->isalive == false){
      return false;
    }else{
      return true;
    }
  } 
  
  public function getNexus(){
  return $this->health;
  }
  
  public function setNexus($health){
  $this->health = $health;
  } 
  
  public function Break(){
  if(!$this->isAlive()){
  $this->health--;
 }
}
