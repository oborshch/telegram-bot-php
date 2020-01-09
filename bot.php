<?php
/********************************************************
*  For the script to work, 
*  you need to install this library:
*  https://github.com/irazasyed/telegram-bot-sdk
*  using composer. 
*  Command to install the library using Composer:
*  composer require irazasyed/telegram-bot-sdk ^2.0
*
*  https://coderlog.top
*  https://youtube.com/CoderLog
********************************************************/
include('vendor/autoload.php');
use Telegram\Bot\Api;

$telegram = new Api('Your-Token');
$result = $telegram->getWebhookUpdates();

$text = $result["message"]["text"];
$chat_id = $result["message"]["chat"]["id"];
$name = $result["message"]["from"]["username"];
$first_name = $result["message"]["from"]["first_name"];
$last_name = $result["message"]["from"]["last_name"];

if($text == "/start"){
	$reply = "Hello " . $first_name . " " . $last_name;
	$telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply]);
}