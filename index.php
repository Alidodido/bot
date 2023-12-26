<?php

include "Utilities/function.php";

$bot_token = "6966772493:AAH2kFVqY_e9pUGeil6qZvIOhxsJGmEEX90";

$input = file_get_contents('php://input');
$data = json_decode($input);
$user_id = $data->message->chat->id;
$text = $data->message->text;

$channel_ids = ['-1001724761918','-1002089778197','-1002135037231'];

if(CheckAllChannelsSubscribe($channel_ids,$user_id)){
    if ($text == '/start') {
        require "commands/start.php";
    } elseif ($text == '/whois') {
        require "commands/whois.php";
    } elseif (strpos($text, '/calc') === 0) {
        require "commands/calculate.php";
    } 
}


?>