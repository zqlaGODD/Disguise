<?php

declare(strict_types=1);

namespace zqla;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\utils\Config;

class DisguiseCommand extends Command
{

    public function __construct()
    {
        parent::__construct('disguise', 'Change your Nametag!');
        $this->setPermission("disguise.command");
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if (!$sender instanceof Player) return;
        if (count($args) === 0) {
          $sender->sendMessage(TextFormat::colorize('&l&6DISGUISE COMMAND&r\n&7 \n&r&7Plugin Made By Zqlaa Hispanic Developer\nTo Execute The Us Command Well&r\n \n&d/disguise random\n&d/disguise set (args|nick)'));
          return;
        }
        switch ($args[0]) {
          case 'random':
            $test = new Config(Disguise::getInstance()->getDataFolder()."config.yml", Config::YAML);
		$name = $test->getAll()["Nicks"];
		foreach ($name as $key => $local) {
		$list = $local['name'];
		$rand = [$list, $list];
		$rand[array_rand($rand)];
		$sender->setDisplayName($rand);
		
		}
            break;
            case 'set':
        if (count($args[1]) === 0) {
          $sender->sendMessage(TextFormat::RED . "Missing Args @error #1");
          return;
        }
        if (count($args[1]) === 1) {
       $sender->sendMessage(TextFormat::GREEN . "You have changed your Nick to " . TextFormat::RED . $args[1]);
       $player->setDisplayName($args[1]);
                  return;
                }
              break;
        }
    }
}