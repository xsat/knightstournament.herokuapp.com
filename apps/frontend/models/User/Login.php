<?php

namespace Frontend\Models\User;

use Frontend\Models\User;
use Phalcon\Mvc\Model\Message;

/**
 * Class Login
 * @package Frontend\Models\User
 */
class Login extends User
{
    public function initialize()
    {
        parent::initialize();

        $this->skipAttributes([
            'name',
            'date_create',
            'date_update',
        ]);
    }

    public function validation()
    {
        $user = $this->findFirst([
            'conditions' => 'email = :email: AND password = :password:',
            'bind' => [
                'email' => $this->email,
                'password' => $this->crypt($this->password),
            ],
        ]);

        if (!$user) {
            $this->appendMessage(new Message('Please enter a valid email address and password.'));
            return false;
        }

        if ($user->status != self::STATUS_CONFIRMED) {
            $this->appendMessage(new Message('Please confirm your email.'));
            return false;
        }

        $this->assign($user->toArray());

        return true;
    }
}
