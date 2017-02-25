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
     * @var array
     */
    private $data = [];

    /**
     * @var SplObjectStorage
     */
    private $clients = null;

    public function initialize()
    {
        $this->clients = new SplObjectStorage;
    }

    /**
     * @param ConnectionInterface $conn
     */
    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        $this->decode($conn, $this->message('Welcome'));
    }

    /**
     * @param ConnectionInterface $from
     * @param string $msg
     */
    public function onMessage(ConnectionInterface $from, $msg)
    {
        $this->data[] = $msg;

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                $this->decode($client, $this->message($msg));
            }
        }
    }

    /*
     *
     */
    public function onClose(ConnectionInterface $conn)
    {
        $this->decode($conn, $this->message('Bye bye..'));
        $this->clients->detach($conn);
    }

    /**
     * @param ConnectionInterface $conn
     * @param Exception $e
     */
    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        $this->decode($conn, $this->error($e->getMessage()));
        $conn->close();
    }

    private function message($text)
    {
        return [
            'code' => 0,
            'message' => $text,
            'data' => $this->data,
        ];
    }

    private function error($text)
    {
        return [
            'code' => 1,
            'error' => $text,
        ];
    }

    private function decode(ConnectionInterface $conn, $data)
    {
        $conn->send(json_encode($data));
    }
}