<?php

namespace Annihilation\Game;

class Game{
  
  public function __construct($id, Annihilation $plugin){
    $this->id = $id;
    $this->plugin = $plugin;
    $this->redspawn = $plugin->data[$this->id]["spawn1"];
    $this->bluespawn = $plugin->data[$this->id]["spawn2"];
    $this->greenspawn = $plugin->data[$this->id]["spawn3"];
    $this->yellspawn = $plugin->data[$this->id]["spawn4"];
    $this->m
  }
}
