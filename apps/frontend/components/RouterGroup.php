<?php

namespace Frontend;

use Phalcon\Mvc\Router\Group;

class RouterGroup extends Group
{
    public function __construct()
    {
        $this->setPaths([
            'module' => 'frontend',
            'namespace' => 'Frontend\Controllers',
        ]);

        $this->add('/', [
            'controller' => 'index',
            'action' => 'index'
        ])->setName('home');

        $this->add('/signin', [
            'controller' => 'authorization',
            'action' => 'login'
        ])->setName('login');
        $this->add('/signup', [
            'controller' => 'authorization',
            'action' => 'registration'
        ])->setName('registration');
        $this->add('/logout', [
            'controller' => 'authorization',
            'action' => 'logout'
        ])->setName('logout');
        $this->add('/confirmation', [
            'controller' => 'authorization',
            'action' => 'confirmation'
        ])->setName('confirmation');
        $this->add('/reset-password', [
            'controller' => 'authorization',
            'action' => 'resetPassword'
        ])->setName('reset-password');
        $this->add('/forgot-password', [
            'controller' => 'authorization',
            'action' => 'forgotPassword'
        ])->setName('forgot-password');
    }
}
