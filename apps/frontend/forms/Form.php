<?php

namespace Frontend\Forms;

use Phalcon\Forms\Form as PhalconForm;
use Frontend\Interfaces\Form as FormInterface;

/**
 * Class Form
 * @package Frontend\Forms
 */
class Form extends PhalconForm implements FormInterface
{
    /**
     * @param string $name
     */
    public function messages($name)
    {
        if ($this->hasMessagesFor($name)) {
            foreach ($this->getMessagesFor($name) as $message) {
                $this->flash->error($message);
            }
        }
    }
}
