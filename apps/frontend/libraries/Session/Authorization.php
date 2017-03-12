<?php

namespace Frontend\Session;

use Frontend\Component\Component;
use Frontend\Models\User;

/**
 * Class Authorization
 * @package Frontend\Component
 */
class Authorization extends Component
{
    /**
     * @var bool|User
     */
    private $user = false;

    /**
     * Authorization constructor.
     */
    public function __construct()
    {
        $this->user = $this->session->get($this->getIndex(), false);
    }

    /**
     * @return bool
     */
    public function isUser()
    {
        return !!$this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        $this->session->set($this->getIndex(), $user);
    }

    /**
     * @return bool|User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function removeUser()
    {
        $this->session->remove($this->getIndex());
    }

    /**
     * @return string
     */
    private function getIndex()
    {
        return 'user';
    }
}
