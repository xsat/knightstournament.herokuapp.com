<?php

namespace Frontend\Models;

use Common\Models\Confirm as CommonConfirm;

/**
 * Class Confirm
 * @package Frontend\Models
 */
class Confirm extends CommonConfirm
{
    public function initialize()
    {
        $this->setSource('confirm');

        $this->belongsTo('user_id', 'Frontend\Models\User', 'id', [
            'alias' => 'user',
        ]);
    }

    public function beforeValidationOnCreate()
    {
        parent::beforeValidationOnCreate();

        $this->code = sha1(rand());
        $this->token = sha1(rand());
        $this->date_expire = date('Y-m-d H:i:s', time() + 15 * 60);
    }
}
