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
     * @var User|bool
     */
    private $user = false;

    /**
     * @return bool
     */
    public function isUser()
    {
        return !!$this->user;
    }
}
