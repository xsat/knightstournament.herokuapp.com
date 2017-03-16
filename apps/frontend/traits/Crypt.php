<?php

namespace Frontend\Traits;

/**
 * Class Crypt
 * @package Frontend\Traits
 */
trait Crypt
{
    /**
     * @param string $value
     * @return string
     */
    protected function crypt($value)
    {
        return sha1($value . getenv('CRYPT_SALT'));
    }
}
