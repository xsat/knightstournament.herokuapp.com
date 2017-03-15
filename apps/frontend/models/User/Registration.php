<?php

namespace Frontend\Models\User;

use Frontend\Models\User;
use Frontend\Traits\Crypt;
use Frontend\Models\Confirm;

/**
 * Class Registration
 * @package Frontend\Models\User
 */
class Registration extends User
{
    use Crypt;

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
