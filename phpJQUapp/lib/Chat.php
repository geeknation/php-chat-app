<?php


namespace Ratchet\Chat;


use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
    protected $clients;
    protected $connections;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->connections = [];
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        // Store the connection resource ID and user name in an array
        $newConnection = [
            'username' => 'Guest', //:TODO fetch logged in username
            "resource"=>  $conn->resourceId,
            'status' => 'connected'
        ];
        $this->connections[$conn->resourceId] = $newConnection;

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $data = json_decode($msg, true);
        $recipientId = $data['recipient'];
        $message = $data['message'];

        echo "Sending message '$message' to recipient '$recipientId'\n";

        // Send message to specific recipient
        foreach ($this->clients as $client) {
            if ($client->resourceId == $recipientId) {
                $client->send($message);
                break;
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);
        unset($this->connections[$conn->resourceId]);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }

    public function getConnectedUsers() {
        return $this->connections;
    }
}

