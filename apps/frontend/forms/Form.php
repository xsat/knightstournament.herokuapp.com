<?php

namespace Frontend\Forms;

use Phalcon\Forms\Form as PhalconForm;

/**
 * Class Form
 * @package Frontend\Forms
 */
class Form extends PhalconForm
{
    public function messages($name)
    {
        if ($this->hasMessagesFor($name)) {
            foreach ($this->getMessagesFor($name) as $message) {
                $this->flash->error($message);
            }
        }
    }
}
