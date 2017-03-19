<?php

namespace Frontend\Models;

use Common\Models\User as CommonUser;
use Frontend\Interfaces\Crypt as CryptInterface;
use Frontend\Traits\Crypt;

/**
 * Class User
 * @package Frontend\Models
 */
class User extends CommonUser implements CryptInterface
{
    use Crypt;

    public function beforeCreate()
    {
        $this->password = $this->crypt($this->password);
    }

    /**
     * @return Confirm
     */
    public function createConfirm()
    {
        $confirm = new Confirm();
        $confirm->user_id = $this->id;
        $confirm->save();

        return $confirm;
    }
}
