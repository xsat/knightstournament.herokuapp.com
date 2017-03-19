<?php

namespace Frontend\RouterGroup;

use Frontend\RouterGroup;

/**
 * Class Index
 * @package Frontend\RouterGroup
 */
class Index extends RouterGroup
{
    public function __construct()
    {
        $this->setPaths([
            'controller' => 'index',
        ]);

        $this->add('/', [
            'action' => 'index'
        ])->setName('home');

        $this->add('/test', [
            'action' => 'test'
        ])->setName('test');

        $this->add('/notFound', [
            'action' => 'notFound'
        ])->setName('not-found');
    }
}
