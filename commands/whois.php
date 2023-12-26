<?php

$user_first_name = $data->message->from->first_name;
$user_last_name = isset($data->message->from->last_name) ? $data->message->from->last_name : '---';
$user_username = $data->message->from->username ? $data->message->from->username : '---';

$userInfo = json_decode(file_get_contents("https://api.telegram.org/bot$bot_token/getChat?chat_id=$chat_id"));

$user_bio = $userInfo->result->bio ? $userInfo->result->bio : '---';

// Initialize $photo and $msg with empty values
$photo = '';
$msg = '';

// Check if the user has a profile photo in the getChat response
if (isset($userInfo->result->photo) && count($userInfo->result->photo) > 0) {
    // Get the largest available photo size (last element in the array)
    $largestPhoto = end($userInfo->result->photo);

    // Set the file_id for the photo
    $photo = $largestPhoto->file_id;
    $msg = "Here is the profile photo:";
} else {
    $msg = "User does not have a profile photo.";
}

$msg .= "-------\nid: $chat_id\nfirst name: $user_first_name\nlast name: $user_last_name\nusername: @$user_username\n<b>bio: $user_bio</b>\n-------";

// Check if $msg is not empty before making the request
if (!empty($msg) && !empty($photo)) {
    // Construct the URL and make the request only if $msg and $photo are not empty
    $url = "https://api.telegram.org/bot$bot_token/sendPhoto?photo=$photo&chat_id=$chat_id&caption=" . urlencode($msg);

    $response = file_get_contents($url);

    if ($response === false) {
        // Handle request failure
        echo "Failed to make the Telegram API request.";
    } else {
        // Output the Telegram API response for debugging
        echo $response;
    }
} else {
    // Handle the case where $msg or $photo is empty
    echo "Message or photo is empty. Skipping Telegram API request.";
}
?>
