<?php

declare(strict_types=1);

namespace wavycraft\deviceos\utils;

use pocketmine\player\Player;
use pocketmine\utils\SingletonTrait;
use pocketmine\network\mcpe\protocol\types\DeviceOS;

use wavycraft\ranks\utils\RanksManager;

class PlayerManager {
    use SingletonTrait;

    public function getPlayerOS(Player $player) : string{
        $deviceOS = $player->getPlayerInfo()->getExtraData();
        return $this->getOSName((int)$deviceOS);
    }

    private function getOSName(int $deviceOS) : string{
        switch($deviceOS) {
            case DeviceOS::ANDROID:
                return "Android";
            case DeviceOS::IOS:
                return "iOS";
            case DeviceOS::OSX:
                return "OSX";
            case DeviceOS::AMAZON:
                return "Amazon";
            case DeviceOS::GEAR_VR:
                return "Gear VR";
            case DeviceOS::HOLOLENS:
                return "HoloLens";
            case DeviceOS::WINDOWS_10:
                return "Windows 10";
            case DeviceOS::WIN32:
                return "Win32";
            case DeviceOS::DEDICATED:
                return "Dedicated Server";
            case DeviceOS::TVOS:
                return "TVOS";
            case DeviceOS::PLAYSTATION:
                return "PlayStation";
            case DeviceOS::NINTENDO:
                return "Nintendo";
            case DeviceOS::XBOX:
                return "Xbox";
            case DeviceOS::WINDOWS_PHONE:
                return "Windows Phone";
            default:
                return "Unknown";
        }
    }

    public function updateTag(Player $player) {
        RanksManager::getInstance()->createTag("deviceos", $this->getPlayerOS($player));
    }
}