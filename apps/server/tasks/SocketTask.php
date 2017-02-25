<?php

namespace Server\Tasks;

use Server\Socket\Game;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

class SocketTask extends ParentTask
{
    public function mainAction()
    {
        $ws = new WsServer(new Game);
        $ws->disableVersion(0);
        $server = IoServer::factory(new HttpServer($ws), getenv('SOCKET_PORT'));
        $server->run();
    }
}
