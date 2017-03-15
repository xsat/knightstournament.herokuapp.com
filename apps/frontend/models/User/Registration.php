<?php

namespace Frontend\Models\User;

use Frontend\Models\User;
use Frontend\Models\Confirm;

/**
 * Class Registration
 * @package Frontend\Models\User
 */
class Registration extends User
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
        if ($value) {
            $this->password = $this->crypt($value);
        }
    }
}
