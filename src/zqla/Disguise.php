<?php

namespace zqla;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\player\Player;

final class Disguise extends PluginBase {
  
  protected function onEnable() : void {
    $this->getServer()->getCommandMap()->register('/disguise', new DisguiseCommand());
    $this->saveResource("config.yml");
  }
}
?>