
<?php

namespace AerialKits;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandExecuter;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\Server;

class Main extends PluginBase implements Listener{

    public function onEnable(){
        $this->getLogger()->info("AerialKits enabled!");
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
        if (!is_dir($this->getDataFolder())) mkdir($this->getDataFolder());
        $this->players = array();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        if(file_exists($this->getDataFolder() . "buyers.yml")){
            $this->donators = (new Config($this->getDataFolder()."buyers.yml", Config::YAML))->getAll();
        }else{
            $this->donators = array();
        }
        if(file_exists($this->getDataFolder() . "kits.yml")){
            $this -> kits = (new Config($this -> getDataFolder() . "kits.yml", Config::YAML))->getAll();
        }
        else{
            $this->kits = array(
                "Basic" => array(
                    "Donator" => false,
                    "Items" => array(
                        array(
                            272,
                            0,
                            1
                        ), // id, meta, count
                        array(
                            260,
                            0,
                            3
                        ),
                    )
                ),
                "blocks" => array(
                    "Donator" => false,
                    "Items" => array(
                        array(
                            35,
                            0,
                            1
                        ),
                        array(
                            35,
                            1,
                            1
                        ),
                        array(
                            35,
                            2,
                            1
                        ),
                    )
                ),
                "Donator" => array(
                    "Donator" => true,
                    "Items" => array(
                        array(
                            276,
                            0,
                            1
                        ),
                        array(
                            306,
                            0,
                            1
                        ),
                        array(
                            307,
                            0,
                            1
                        ),
                    )
                ),
            );
        }
        $this->prefix = "< GCS - NETWORK > ";
    }
    }
}
