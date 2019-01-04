<?php
namespace delxhq\MoveUI;

use delxhq\MoveUI\CaptchaAPI\CaptchaDialog;

use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\event\Listener;

/**
 * Created by PhpStorm.
 * User: delxhq
 * Date: 04/01/2019
 * Time: 10:30
 */

class MoveUI extends PluginBase implements Listener
{
    public function onEnable(): void
    {
        $this->getLogger()->alert("Enabled!");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onMove(PlayerMoveEvent $event)
    {
        $form = new CaptchaDialog(CaptchaDialog::CAPTCHA_TYPE_ALPHANUMERIC, CaptchaDialog::CAPTCHA_LENGTH_MODERATE);
        $form->setPersistent(true);
        $form->setSuccessCallable(function (Player $player)
        {
        });
        $event->getPlayer()->sendForm($form);
    }
}