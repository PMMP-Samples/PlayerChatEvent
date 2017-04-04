<?php

namespace pmmp_event;

use pocketmine\plugin\PluginBase; // PMMP-プラグイン必須
use pocketmine\event\player\PlayerChatEvent; // PlayerChatEventを使用するため
use pocketmine\event\Listener; // Eventプラグイン必須
use pocketmine\Server; // getServer()を使用するため
use pocketmine\Player;

class PlayerChatEvent extends PluginBase implements Listener{

	public function onLoad(){ // 読み込まれた時の処理
		$this->getServer()->getLogger()->info("[PMMP-Event-Sample] ロードしました");
	}

	public function onEnable(){ // 有効化された時の処理
		$this->getServer()->getLogger()->info("[PMMP-Event-Sample] 有効にしました");
		$this->getServer()->getPluginManager()->registerEvents($this,$this); // Eventプラグイン必須
	}

	public function onDisable(){ // 無効にされた時の処理
		$this->getServer()->getLogger()->info("[PMMP-Event-Sample] 無効にしました");
	}

	public function onChat(PlayerChatEvent $event){ // PlayerChatEventの際の処理
       $message = $event->getMessage(); // メッセージを取得
	   $format = $event->getFormat(); // フォーマットを取得
	   $player = $event->getPlayer(); // 送信者を取得
	   $player_name = $player->getName(); // 送信者の名前を取得
       $this->getServer()->getLogger()->notice("[PMMP-Event-Sample] 送信者：{$player_name} ");
	   $this->getServer()->getLogger()->notice("[PMMP-Event-Sample] フォーマット：{$format} ");
	   $this->getServer()->getLogger()->notice("[PMMP-Event-Sample] 内容：{$message} ");
	}
}
