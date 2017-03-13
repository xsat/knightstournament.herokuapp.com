<?php

namespace Frontend\Models;

use Common\Models\User as CommonUser;

/**
 * Class User
 * @package Frontend\Models
 */
class User extends CommonUser
{
    public function afterCreate()
    {
        $confirm = new Confirm();
        $confirm->create([
            'user_id' => $this->id,
        ]);
    }

    /**
     * @param string $value
     */
    public function setPassword($value)
    {
        $this->password = crypt($value, getenv('PASSWORD_SALT'));
    }
}
