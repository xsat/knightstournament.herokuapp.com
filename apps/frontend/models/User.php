<?php

namespace Frontend\Models;

use Common\Models\User as CommonUser;

/**
 * Class User
 * @package Frontend\Models
 */
class User extends CommonUser
{
    /**
     * @param string $value
     * @return string
     */
    protected function crypt($value)
    {
        return crypt($value, getenv('PASSWORD_SALT'));
    }
}
