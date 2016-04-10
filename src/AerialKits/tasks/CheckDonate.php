<?php
namespace epicmc\bridgeauth\task;

use AerialKits\AerialKits;
use pocketmine\scheduler\AsyncTask;
use pocketmine\Server;
use pocketmine\utils\Utils;

class CheckDonate extends AsyncTask{
    protected $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function onRun(){
        $this->setResult(Utils::getURL(AerialKits::DONATION_CHECK_URL . "?name=" . $name . "");
    }

    public function onCompletion(Server $server){
        $plugin = $server->getPluginManager()->getPlugin("AerialKits");
        if($plugin instanceof AerialKits && $plugin->isEnabled()){
            $plugin->giveRanks($name, $this->getResult());
        }

    }
}
