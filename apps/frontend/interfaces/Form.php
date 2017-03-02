<?php

namespace Frontend\Interfaces;

use Phalcon\Validation\Message\Group as PhalconGroup;

/**
 * Interface Form
 * @package Frontend\Interfaces
 */
interface Form
{
    /**
     * @param array $data
     * @param object $entity
     * @return bool
     */
    public function isValid($data = null, $entity = null);

    /**
     * @param bool $byItemName
     * @return PhalconGroup
     */
    public function getMessages($byItemName = false);
}
