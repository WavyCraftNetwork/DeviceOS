<?php

declare(strict_types=1);

namespace wavycraft\deviceos\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

use wavycraft\deviceos\utils\PlayerManager;

class CheckOSCommand extends Command {

    private $playerManager;

    public function __construct() {
        parent::__construct("checkos", "Check the OS of the player", "/checkos", []);
        $this->setPermission("deviceos.cmd");
        $this->playerManager = PlayerManager::getInstance();
    }

    public function execute(CommandSender $sender, string $label, array $args) : bool{
        if (!$this->testPermission($sender)) {
            return false;
        }

        if ($sender instanceof Player) {
            $osName = $this->playerManager->getPlayerOS($sender);
            $sender->sendMessage(TextFormat::YELLOW . "You are using: " . TextFormat::GREEN . $osName);
        } else {
            $sender->sendMessage("This command can only be used by players.");
        }
        return true;
    }
}
