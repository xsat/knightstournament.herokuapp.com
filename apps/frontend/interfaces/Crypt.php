<?php

namespace Frontend\Interfaces;

/**
 * Interface Crypt
 * @package Frontend\Interfaces
 */
interface Crypt
{
    /**
     * @param string $value
     * @return string
     */
    public function crypt($value);
}
