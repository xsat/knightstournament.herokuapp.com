<?php

namespace Frontend\Interfaces;

use Phalcon\Validation\Message\Group;

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
     * @return Group
     */
    public function getMessages($byItemName = false);
}
