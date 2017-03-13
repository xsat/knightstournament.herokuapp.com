<?php

namespace Frontend\Models;

use Common\Models\Confirm as CommonConfirm;

/**
 * Class Confirm
 * @package Frontend\Models
 */
class Confirm extends CommonConfirm
{
    public function beforeCreate()
    {
        parent::beforeCreate();

        $this->code = $this->generateCode();
    }

    /**
     * @return string
     */
    private function generateCode()
    {
        return crypt(chr(rand()) . chr(rand()) . chr(rand()) . chr(rand()), getenv('CODE_SALT'));
    }
}
