<?php

namespace Frontend\Mail;

use Frontend\Models\User;

class Registration extends Mail
{
    /**
     * @var User|null
     */
    private $user = null;

    /**
     * Registration constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    protected function getAddress()
    {
        return $this->user->email;
    }

    /**
     * @return string
     */
    protected function getName()
    {
        return $this->user->name;
    }

    /**
     * @return string
     */
    protected function getSubject()
    {
        return 'Welcome!!';
    }

    /**
     * @return string
     */
    protected function getBody()
    {
        return $this->view->getPartial('mail/registration', [
            'user' => $this->user,
        ]);
    }
}