<?php

$comandos = [
["command" => "start", "description" => "start"],
["command" => "whois", "description" => "who is me"],
["command" => "calc", "description" => "calculate"],
];

defineMenuOptions($comandos);

function defineMenuOptions($comandos) {

$comandosEnc = "setMyCommands?commands=" . json_encode($comandos);
$retorno = file_get_contents("https://api.telegram.org/bot6966772493:AAH2kFVqY_e9pUGeil6qZvIOhxsJGmEEX90/{$comandosEnc}");

}
?>