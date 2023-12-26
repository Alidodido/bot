<form method="post">
    <input type="text" name="url" placeholder= "enter your url: "/>
    <input type="submit" name="submit" value="submit"/>
</form>

<?php

$token = "6966772493:AAH2kFVqY_e9pUGeil6qZvIOhxsJGmEEX90";

if(isset($_POST['submit'])){
    $url = $_POST['url'];
    $command = "https://api.telegram.org/bot{$token}/setWebhook?url={$url}";
    file_get_contents($command);
}

?>