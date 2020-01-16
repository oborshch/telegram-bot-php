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
include('menu.php');
include('settings.php');
include('bot_lib.php');
use Telegram\Bot\Api;

$telegram = new Api('Your-Token');
$result = $telegram->getWebhookUpdates();

$text = $result["message"]["text"];
$chat_id = $result["message"]["chat"]["id"];
$name = $result["message"]["from"]["username"];
$first_name = $result["message"]["from"]["first_name"];
$last_name = $result["message"]["from"]["last_name"];
$get_user = get_user($connect, $chat_id);
$old_id = $get_user['chat_id'];
$username = $first_name . ' ' . $last_name;



if($text == "/start"){
	$reply = "Menu: ";
	$reply_markup = $telegram->replyKeyboardMarkup([ 'keyboard' => $menu, 'resize_keyboard' => true, 'one_time_keyboard' => false ]);
	$telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
}elseif($text == "button 1"){
	$reply = "Hello " . $first_name . " " . $last_name;
	$reply_markup = $telegram->replyKeyboardMarkup([ 'keyboard' => $menu, 'resize_keyboard' => true, 'one_time_keyboard' => false ]);
	$telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
}elseif($text == "button 2"){
	$reply = "Hello " . $first_name . " " . $last_name . " it's button 2";
	$reply_markup = $telegram->replyKeyboardMarkup([ 'keyboard' => $menu2, 'resize_keyboard' => true, 'one_time_keyboard' => false ]);
	$telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
}


add_user($connect, $username, $chat_id, $name, $old_id);