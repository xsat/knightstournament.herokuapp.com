<?php

namespace Server;

use Phalcon\Cli\Router as PhalconRouter;

class Router extends PhalconRouter
{
    public function initialize()
    {
        $this->setDefaults([
            'action' => 'main',
            'task' => 'main',
        ]);
    }
}
