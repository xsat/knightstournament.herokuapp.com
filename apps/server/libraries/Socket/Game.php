<?php

namespace Server\Socket;

use Exception;
use SplObjectStorage;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Server\Component\ParentComponent;

/**
 * Class Game
 * @package Server\Socket
 */
class Game extends ParentComponent implements MessageComponentInterface
{
    /**
     * @var SplObjectStorage
     */
    private $clients = null;

    /**
     * Game constructor.
     */
    public function __construct()
    {
        $this->clients = new SplObjectStorage;
    }

    /**
     * @param ConnectionInterface $conn
     */
    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
    }

    /**
     * @param ConnectionInterface $from
     * @param string $msg
     */
    public function onMessage(ConnectionInterface $from, $msg)
    {
    }

    /**
     * @param ConnectionInterface $conn
     */
    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
    }

    /**
     * @param ConnectionInterface $conn
     * @param Exception $e
     */
    public function onError(ConnectionInterface $conn, Exception $e)
    {
        $conn->close();
    }
}
