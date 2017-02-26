<?php

namespace Server\Socket;

use Ratchet\ConnectionInterface;

/**
 * Class Connection
 * @package Server\Socket
 * @property integer $test
 */
class Connection implements ConnectionInterface
{
    /**
     * {@inheritdoc}
     */
    public function send($data)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function close()
    {
    }
}
