<?php

$bot_token = "6966772493:AAH2kFVqY_e9pUGeil6qZvIOhxsJGmEEX90";

$input = file_get_contents('php://input');
$data = json_decode($input);
$chat_id = $data->message->chat->id;
$text = $data->message->text;

$msg = '';

$channel_ids = ['-1001724761918','-1002089778197','-1002135037231'];

$subscribe_check = 1;

foreach($channel_ids as $channel_id){
    $channelMemberInfo = json_decode(file_get_contents("https://api.telegram.org/bot$bot_token/getChatMember?chat_id=$channel_id&user_id=$chat_id"));
    if(!$channelMemberInfo->ok or $channelMemberInfo->result->status == "left"){
        $userInfo = json_decode(file_get_contents("https://api.telegram.org/bot$bot_token/getChat?chat_id=$channel_id"));
        $msg .= "Join @".$userInfo->result->username." \n";
        error_log($userInfo->result->username." is not");
        $subscribe_check = 0;
    }
}

if($subscribe_check==1){
    if ($text == '/start') {
        require "commands/start.php";
    } elseif ($text == '/whois') {
        require "commands/whois.php";
    } elseif (strpos($text, '/calc') === 0) {
        require "commands/calculate.php";
    } elseif ($text == '/dice'){
        require "commands/dice.php";
    }
}


$url = "https://api.telegram.org/bot$bot_token/sendMessage?text=" . urlencode($msg) . "&chat_id=$chat_id&parse_mode=html";
file_get_contents($url);
?>