<?php
function save($filename, $TXTdata)
{
    $myfile = fopen($filename, "w") or die("Unable to open file!");
    fwrite($myfile, "$TXTdata");
    fclose($myfile);
}
/* Tabee Bot OFficial */
function bot($method, $datas = [])
{
    $token = "6966772493:AAH2kFVqY_e9pUGeil6qZvIOhxsJGmEEX90";
    $url = "https://api.telegram.org/bot" . $token . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}
/* Zip Aechive */
function create_zip($files = array(), $destination = '')
{
    if (file_exists($destination)) {
        return false;
    }
    $valid_files = array();
    if (is_array($files)) {
        foreach ($files as $file) {
            if (file_exists($file)) {
                $valid_files[] = $file;
            }
        }
    }
    if (count($valid_files)) {
        $zip = new ZipArchive();
        if ($zip->open($destination, $overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
            return false;
        }
        foreach ($valid_files as $file) {
            $zip->addFile($file, $file);
        }
        $zip->close();
        return file_exists($destination);
    } else {
        return false;
    }
}
function SendMessage($chatid, $text, $parsmde, $disable_web_page_preview, $keyboard)
{
    bot('sendMessage', [
        'chat_id' => $chatid,
        'text' => $text,
        'parse_mode' => $parsmde,
        'disable_web_page_preview' => $disable_web_page_preview,
        'reply_markup' => $keyboard
    ]);
}
/* Tabee Forward Message */
function ForwardMessage($chatid, $from_chat, $message_id)
{
    bot('ForwardMessage', [
        'chat_id' => $chatid,
        'from_chat_id' => $from_chat,
        'message_id' => $message_id
    ]);
}
/* Tabee Send Photo */
function SendPhoto($chatid, $photo, $keyboard, $caption)
{
    bot('SendPhoto', [
        'chat_id' => $chatid,
        'photo' => $photo,
        'caption' => $caption,
        'reply_markup' => $keyboard
    ]);
}
/* Tabee Send Audio */
function SendAudio($chatid, $audio, $keyboard, $caption, $sazande, $title)
{
    bot('SendAudio', [
        'chat_id' => $chatid,
        'audio' => $audio,
        'caption' => $caption,
        'performer' => $sazande,
        'title' => $title,
        'reply_markup' => $keyboard
    ]);
}
/* Tabee Send Document */
function SendDocument($chatid, $document, $keyboard, $caption)
{
    bot('SendDocument', [
        'chat_id' => $chatid,
        'document' => $document,
        'caption' => $caption,
        'reply_markup' => $keyboard
    ]);
}
/* Tabee Send Sticker */
function SendSticker($chatid, $sticker, $keyboard)
{
    bot('SendSticker', [
        'chat_id' => $chatid,
        'sticker' => $sticker,
        'reply_markup' => $keyboard
    ]);
}
/* Tabee Send Video */
function SendVideo($chatid, $video, $caption, $keyboard, $duration)
{
    bot('SendVideo', [
        'chat_id' => $chatid,
        'video' => $video,
        'caption' => $caption,
        'duration' => $duration,
        'reply_markup' => $keyboard
    ]);
}
/* Tabee Send Voice */
function SendVoice($chatid, $voice, $keyboard, $caption)
{
    bot('SendVoice', [
        'chat_id' => $chatid,
        'voice' => $voice,
        'caption' => $caption,
        'reply_markup' => $keyboard
    ]);
}
/* Tabee Send Contact */
function SendContact($chatid, $first_name, $phone_number, $keyboard)
{
    bot('SendContact', [
        'chat_id' => $chatid,
        'first_name' => $first_name,
        'phone_number' => $phone_number,
        'reply_markup' => $keyboard
    ]);
}
/* Tabee Send Chat Action */
function SendChatAction($chatid, $action)
{
    bot('sendChatAction', [
        'chat_id' => $chatid,
        'action' => $action
    ]);
}
/* Tabee Kick Chat Member */
function KickChatMember($chatid, $user_id)
{
    bot('kickChatMember', [
        'chat_id' => $chatid,
        'user_id' => $user_id
    ]);
}
/* Tabee Leave Chat */
function LeaveChat($chatid)
{
    bot('LeaveChat', [
        'chat_id' => $chatid
    ]);
}
/* Tabee Get Chat */
function getChat($idchat)
{
    $json = file_get_contents('https://api.telegram.org/bot' . API_KEY . "/getChat?chat_id=" . $idchat);
    $data = json_decode($json, true);
    return $data["result"]["first_name"];
}
/* Tabee Get Chat Members Count */
function GetChatMembersCount($chatid)
{
    bot('getChatMembersCount', [
        'chat_id' => $chatid
    ]);
}
/* Tabee Get Chat Member */
function GetChatMember($chatid, $userid)
{
    $truechannel = json_decode(file_get_contents('https://api.telegram.org/bot' . API_KEY . "/getChatMember?chat_id=" . $chatid . "&user_id=" . $userid));
    $tch = $truechannel->result->status;
    return $tch;
}
/* Tabee Answer Callback Query */
function AnswerCallbackQuery($callback_query_id, $text, $show_alert)
{
    bot('answerCallbackQuery', [
        'callback_query_id' => $callback_query_id,
        'text' => $text,
        'show_alert' => $show_alert
    ]);
}
/* Tabee Edit Message Text */
function EditMessageText($chat_id, $message_id, $text, $parse_mode, $disable_web_page_preview, $keyboard)
{
    bot('editMessagetext', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'text' => $text,
        'parse_mode' => $parse_mode,
        'disable_web_page_preview' => $disable_web_page_preview,
        'reply_markup' => $keyboard
    ]);
}
/* Tabee Edit Message Caption */
function EditMessageCaption($chat_id, $message_id, $caption, $keyboard, $inline_message_id)
{
    bot('editMessageCaption', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'caption' => $caption,
        'reply_markup' => $keyboard,
        'inline_message_id' => $inline_message_id
    ]);
}
