<?php

declare(strict_types=1);

namespace wavycraft\deviceos\event;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

use wavycraft\deviceos\utils\PlayerManager;

class EventListener implements Listener {

    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        PlayerManager::getInstance()->updateTag($player);
    }
}