<?php

declare(strict_types=1);

namespace wavycraft\deviceos;

use pocketmine\plugin\PluginBase;

use wavycraft\deviceos\command\CheckOSCommand;

class DeviceOS extends PluginBase {

    private static $instance;

    protected function onLoad() : void{
        self::$instance = $this;
    }

    protected function onEnable() : void{
        $this->getServer()->getCommandMap()->register("DeviceOS", new CheckOSCommand());
                $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
    }

    public static function getInstance() : self{
        return self::$instance;
    }
}