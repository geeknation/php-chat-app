<?php


// require __DIR__ . '/vendor/autoload.php';
require '../vendor/autoload.php';

// require_once('Chat.php');
// include "../vendor/smarty/smarty/libs/Smarty.class.php";
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;




class Chat implements MessageComponentInterface {
    protected $clients;

   

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        $smarty = new Smarty();

        $smarty->setTemplateDir('templates');
        // $smarty->setConfigDir('/some/config/dir');
        // $smarty->setCompileDir('/some/compile/dir');
        // $smarty->setCacheDir('/some/cache/dir');
        $smarty->assign("welcomeMessage",'WELCOME TO SMARTY KENYA');
        
        $respHTML = $smarty->fetch('chatResponse.tpl');

        $respPayLoad = [
            "responseMessage"=>$respHTML
        ];

        
        $conn->send(json_encode($respPayLoad,JSON_UNESCAPED_SLASHES));
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        // msg can be a json payload that contains the $client id. i.e can be 

        $smarty = new Smarty();

        $smarty->setTemplateDir('templates');
        // $smarty->setConfigDir('/some/config/dir');
        // $smarty->setCompileDir('/some/compile/dir');
        // $smarty->setCacheDir('/some/cache/dir');
        $smarty->assign("welcomeMessage",'WELCOME TO SMARTY KENYA');
        
        $respHTML = $smarty->fetch('chatResponse.tpl');

        $respPayLoad = [
            "responseMessage"=>$respHTML
        ];
        foreach ($this->clients as $client) {
            $client->send($respPayLoad);
            // if ($from !== $client) {
            //     $client->send($respPayLoad);
            // }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        trigger_error("An error has occurred: {$e->getMessage()}\n", E_USER_WARNING);

        $conn->close();
    }
}

$app = new Ratchet\App('localhost', 8080);
$app->route('/chat', new Chat, array('*'));
$app->run();

?>
