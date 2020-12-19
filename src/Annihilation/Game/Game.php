<?php

namespace Annihilation\Game;

class Game{
  
  const GAME_STARTED;
  const GAME_ENDED;
  const STATE_HUB;
  
  const PHASE_1;
  const PHASE_2;
  const PHASE_3;
  const PHASE_4;
  const PHASE_5;
  
  /** @var Annihilation $plugin */
  public $plugin;
  
    /** @var KitManager $kitManager */
** @var KitManager $kitManager */

    public $kitManager;

    /** @var VotingManager $votingManager */

    public $votingManager;


    public $kitManager;

    /** @var VotingManager $votingManager */

    public $votingManager;

    /** @var WorldManager $worldManager */

    public $worldManager;

    /** @var BossManager $bossManager */

    public $bossManager;

    /** @var EnderManager $enderManager */

    public $enderManager;
  
  public $rednexus = 75;
  public $bluenexus = 75;
  public $yellownexus = 75;
  public $greennexus = 75;
  public $started = false;
  public $players = [];
  public $playerData = [];
  
  public function __construct($id, Annihilation $plugin){
    $this->id = $id;
    $this->plugin = $plugin;
    $this->gameManager = new GameManager($this);
    $this->gameListener = new GameListener($this);
    $this->redspawn = $plugin->data[$this->id]["spawn1"];
    $this->bluespawn = $plugin->data[$this->id]["spawn2"];
    $this->greenspawn = $plugin->data[$this->id]["spawn3"];
    $this->yellspawn = $plugin->data[$this->id]["spawn4"];
    $this->blueJoinSign = $plugin->data[$this->id["blueJoinSign"];
    $this->redJoinSign = $plugin->data[$this->id["redJoinSign"];         
    $this->yellowJoinSign = $plugin->data[$this->id["yellowJoinSign"];
    $this->greenJoinSign = $plugin->data[$this->id["greenJoinSign"];
                                         
    $this->getScheduler()->schedulerepeatingTask(new TimerTask($this), 20, 20); 
    $this->getScheduler()->scheduleDelayedTask(new GameTask($this), 15);                                      
                               
                                        
  }
  
  public function getPlayers(){
    foreach($this->players as $p){
      return $p;
    }
  }
  
  public function startGame(){
    $this->started = true;
    $this->setPhase(1);
  }
  
  public function stopGame($reason = "Unknown"){
    $this->rednexus = 75;
    $this->bluenexus = 75;
    $this->yellownexus = 75;
    $this->greennexus = 75;
    $this->started = false;
    $this->players = [];
    $this->playerData = [];
    $this->getPlayers()->sendMessage(Annihilation::PREFIX . "Game was cancelled due to $reason");
  }
  
  public function setPhase($phase){
    switch($phase){
        case 1;
        $this->getPlayers()->sendMessage("§aPhase 1 started");
        $this->phase = 1;
    }
  }
  
  public function getData(Player $p){
         $dato =  $this->playerData[$player->getId()] = $data = new PlayerData($p->getName());
         return $dato;
  }
  
  public function teleportToGame(Player $p){
    if($this->getData($p)->wasInGame()){
        //TODO check if is nexus alive
    }
    $p->sendMessage(Annihilation::PREFIX . "§aJoining to $this->id");
  }
}
