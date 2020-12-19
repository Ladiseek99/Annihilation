<?php

declare(strict_types=1);

namespace Annihilation\Game;

use pocketmine\Player;

use pocketmine\Server;

use pocketmine\scheduler\Task;

use pocketmine\level\Position;

use pocketmine\math\Vector3;

use pocketmine\network\mcpe\protocol\PlaySoundPacket;

use Annihilation\Annihilation;

use Annihilation\Game\Game;

use Annihilation\utils\Team;

class GameTask extends Task{

	/** @var Annihilation $plugin */	private $plugin;

	

	/** @var Server $server */

	private $server;

	public function __construct(Annihilation $plugin){

		$this->plugin = $plugin;

		$this->server = $plugin->getServer();

	}

	public function onRun(int $tick) : void{

		$game = Game::getInstance();

		if($game->getStatus() === SELF::GAME_STARTING){

			$game->setTime(90);

			$this->getServer()->broadcastTip("§7[§5Annihilation§7] > §aStaring In $game->getTime()");

		}elseif($game->getStatus() === 1){

			$game->setTime($game->getTime() - 1);

			$this->getServer()->broadcastTip("§7[§5Annihilation§7] > §aStaring In $game->getTime()");

			if($game->getTime() <= 0){

				$game->startGame();

			}

		}elseif($game->getStatus() === 2){

			$game->setTime($game->getTime() - 1);

			$game->updateScoreboard(Team::getInstance()->getOnlineTeamPlayers("all"));

			if($game->getTime() <= 0){

				if($game->getPhase() >= 5){

					$game->setPhase(5);

					$game->setTime(60);

					if($game->getNexusHP("red") > 1){

						foreach(Team::getInstance()->getOnlineTeamPlayers("red") as $player){

							$this->playSound($player, "random.anvil_land", 0.7, 2, $player->x, $player->y, $player->z);

							$player->sendMessage("§7[§5Annihilation§7] §cYour Nexus Has Been Damaged !");

						}

						$game->setNexusHP("red", $game->getNexusHP("red") - 1);

					}

					if($game->getNexusHP("blue") > 1){

						foreach(Team::getInstance()->getOnlineTeamPlayers("blue") as $player){

							$this->playSound($player, "random.anvil_land", 0.7, 2, $player->x, $player->y, $player->z);

							$player->sendMessage("§7[§5Annihilation§7] §cYour Nexus Has Been Damaged !");

						}

						$game->setNexusHP("blue", $game->getNexusHP("blue") - 1);

					}

					}elseif($game->getNexusHP("green") > 1){

						foreach(Team::getInstance()->getOnlineTeamPlayers("green") as $player){

							$this->playSound($player, "random.anvil_land", 0.7, 2, $player->x, $player->y, $player->z);

							$player->sendMessage("§7[§5Annihilation§7] §cYour Nexus Has Been Damaged !");

						}

						$game->setNexusHP("green", $game->getNexusHP("green") - 1);

					}

		        	}elseif($game->getNexusHP("yellow") > 1){

						foreach(Team::getInstance()->getOnlineTeamPlayers("yellow") as $player){

							$this->playSound($player, "random.anvil_land", 0.7, 2, $player->x, $player->y, $player->z);

							$player->sendMessage("§7[§5Annihilation§7] §cYour Nexus Has Been Damaged !");

						}

						$game->setNexusHP("yellow", $game->getNexusHP("yellow") - 1);

					}

	        	}

				}else{

					$game->setPhase($game->getPhase() + 1);

					$game->setTime($this->getOwner()->config->get("defaultTime"));

					if($game->getPhase() === 2){

						foreach(Team::getInstance()->getOnlineTeamPlayers("all") as $player){

							$player->sendMessage(GAME::TWO."§6Phase ".$game->getPhase()." §l§7has started.\n§l§8ネクサスの破壊が有効になりました");

							$this->playSound($player, "mob.wither.spawn", 0.7, 1, $player->x, $player->y, $player->z);

						}

					}elseif($game->getPhase() === 3){

						foreach(Team::getInstance()->getOnlineTeamPlayers("all") as $player){

							$player->sendMessage(GAME::THREE."§6Phase ".$game->getPhase()." §l§7has started.\n§l§8ダイヤモンドの採掘が可能になりました");

							$this->playSound($player, "mob.wither.spawn", 0.7, 1, $player->x, $player->y, $player->z);

						}

					}elseif($game->getPhase() === 4){

						foreach(Team::getInstance()->getOnlineTeamPlayers("all") as $player){

							$player->sendMessage(GAME::FOUR."§6Phase ".$game->getPhase()." §7has started.");

							$this->playSound($player, "mob.wither.spawn", 0.7, 1, $player->x, $player->y, $player->z);

						}

					}elseif($game->getPhase() === 5){

						foreach(Team::getInstance()->getOnlineTeamPlayers("all") as $player){

							$player->sendMessage(GAME::FIVE."§6Phase ".$game->getPhase()." §l§7Has Started\n"

							"§bDouble Nexus Damage Last Phase");

							$this->playSound($player, "mob.wither.spawn", 0.7, 1, $player->x, $player->y, $player->z);

						}

					}

				}

			}

		}

	}

	public function playSound(Player $player, string $sound, float $volume, float $pitch, float $x, float $y, float $z){

		$pk = new PlaySoundPacket();

		$pk->soundName = $sound;

		$pk->x = $x;

		$pk->y = $y;

		$pk->z = $z;

		$pk->volume = $volume;

		$pk->pitch = $pitch;

		$player->dataPacket($pk);

	}

	

	public function getPlugin() : Annihilation {

		return $this->plugin;

	}

	public function getServer() : Server{

		return $this->server;

	}

}
