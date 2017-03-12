<?php

namespace Frontend;

/**
 * Class IndexGroup
 * @package Frontend
 */
class IndexGroup extends RouterGroup
{
    public function __construct()
    {
        $this->setPaths([
            'controller' => 'index',
        ]);

        $this->add('/', [
            'action' => 'index'
        ])->setName('home');

        $this->add('/notFound', [
            'action' => 'notFound'
        ])->setName('not-found');
    }
}
