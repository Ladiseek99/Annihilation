<?php

namespace Annihilation\Object;

use pocketmine\block\Block;
use pocketmine\level\particle\CriticalParticle;
use pocketmine\level\particle\LargeExplodeParticle;
use pocketmine\level\particle\LavaDripParticle;
use pocketmine\level\Position;
use pocketmine\level\sound\AnvilFallSound;
use pocketmine\math\Vector3;
use pocketmine\network\protocol\ExplodePacket;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class Nexus{

    private $health;

    /** @var  Position $position */
    private $position;

    /** @var  Player $player */
    private $player;

    private $plugin;

    public function __construct(Player $player, Position $pos, $health = 75){
        $this->team = $team;
        $this->position = $pos;
        $this->health = $health;
    }

    public function getHealth(){
        return $this->health;
    }

    public function setHealth($damage){
        $this->health = $damage;
    }

    public function getTeam(){
        return $this->team;
    }
    
    public function getPlayer(){
        return $this->player;
    }


    public function getPosition(){
        return $this->data->position;
    }

    public function onBreak(BreakBlockEvent $damage = - 1 : 75){
    foreach(!$this->getNexus()){   
        if(!$this->isAlive()){
            return;
        }
        $this->setHealth = $damage;

        if($this->getHealth() <= 0){
            $this->getServer()->getLevel()->setBlock($this->getPosition(), Block::get(7), true);
            $this->setHealth(0);
        }
    }
    
    public function getNexus(Block $block) : End_Stone {
        if($block->getId(121)) {
            $this->getPosition();
    }

    public function isAlive(){
        return $this->getHealth() > 0 ? true : false;
    }
}
