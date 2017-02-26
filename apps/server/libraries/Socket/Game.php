<?php

namespace Server\Socket;

use Exception;
use SplObjectStorage;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Server\Component\Component;

/**
 * Class Game
 * @package Server\Socket
 */
class Game extends Component implements MessageComponentInterface
{
    /**
     * @var SplObjectStorage
     */
    private $clients = null;

    /**
     * @var string
     */
    private $salt;

    /**
     * Game constructor.
     */
    public function __construct()
    {
        $this->clients = new SplObjectStorage;
        $this->salt = rand() . rand() . rand() . rand();
    }

    /**
     * @param ConnectionInterface|Connection $conn
     */
    public function onOpen(ConnectionInterface $conn)
    {
        $conn->test = 1;

        $this->clients->attach($conn);

        $this->sendData($conn, [
            'type' => 'login',
            'data' => [
                'token' => $this->getToken($conn),
            ],
        ]);
    }

    /**
     * @param ConnectionInterface|Connection $from
     * @param string $msg
     */
    public function onMessage(ConnectionInterface $from, $msg)
    {
        var_dump($from->test);
    }

    /**
     * @param ConnectionInterface|Connection $conn
     */
    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
    }

    /**
     * @param ConnectionInterface|Connection $conn
     * @param Exception $e
     */
    public function onError(ConnectionInterface $conn, Exception $e)
    {
        $conn->close();
    }

    /**
     * @param ConnectionInterface|Connection $conn
     * @return string
     */
    private function getToken(ConnectionInterface $conn)
    {
        return md5($this->clients->getHash($conn) . $this->salt);
    }

    /**
     * @param string $message
     * @return array
     */
    private function getData($message)
    {
        return json_decode($message, true);
    }

    /**
     * @param ConnectionInterface|Connection $conn
     * @param array $data
     */
    private function sendData(ConnectionInterface $conn, array $data)
    {
        $conn->send(json_encode($data));
    }
}
