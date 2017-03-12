<?php

namespace Frontend;

/**
 * Class AuthorizationGroup
 * @package Frontend
 */
class AuthorizationGroup extends RouterGroup
{
    public function __construct()
    {
        $this->setPaths([
            'controller' => 'authorization',
        ]);

        $this->add('/login', [
            'action' => 'login'
        ])->setName('login');

        $this->add('/signup', [
            'action' => 'registration'
        ])->setName('registration');

        $this->add('/logout', [
            'action' => 'logout'
        ])->setName('logout');

        $this->add('/confirmation', [
            'action' => 'confirmation'
        ])->setName('confirmation');

        $this->add('/reset-password', [
            'action' => 'resetPassword'
        ])->setName('reset-password');

        $this->add('/forgot-password', [
            'action' => 'forgotPassword'
        ])->setName('forgot-password');
    }
}
