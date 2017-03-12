<?php

namespace Frontend;

use Phalcon\Mvc\Router as PhalconRouter;

/**
 * Class Router
 * @package Frontend
 */
class Router extends PhalconRouter
{
    public function __construct()
    {
        $this->clear();
        $this->setDefaults([
            'controller' => 'index',
            'action' => 'index',
            'module' => 'frontend',
            'namespace' => __NAMESPACE__ . '\Controllers',
        ]);
        $this->notFound([
            'controller' => 'index',
            'action' => 'notFound',
        ]);
        $this->mount(new IndexGroup());
        $this->mount(new AuthorizationGroup());
    }
}
