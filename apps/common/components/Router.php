<?php

namespace Common;

use Phalcon\Mvc\Router as PhalconRouter;

use Frontend\RouterGroup;

/**
 * Class Router
 * @package Common
 */
class Router extends PhalconRouter
{
    public function __construct()
    {
        $this->clear();
        $this->setDefaults([
            'controller' => 'index',
            'action' => 'index',
        ]);
        $this->notFound([
            'controller' => 'index',
            'action' => 'notFound',
        ]);
        $this->mount(new RouterGroup());
    }
}
