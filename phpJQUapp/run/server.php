<?php

require_once("../lib/SmartyChat.php"); //Chat class with smarty templating response.
require_once("../lib/Chat.php"); //Chat class with json I/O
$app = new Ratchet\App('localhost', 8080);
$app->route('/chat', new SmartyChat, array('*'));
$app->run();

?>
