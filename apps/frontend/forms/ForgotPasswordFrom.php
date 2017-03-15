<?php

namespace Frontend\Forms;

use Phalcon\Forms\Element\Email;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\PresenceOf;

/**
 * Class RegistrationForm
 * @package Frontend\Forms
 */
class ForgotPasswordFrom extends Form
{
    public function initialize()
    {
        $this->add((new Email('email', [
            'class' => 'form-control',
            'autocomplete' => 'off',
            'maxlength' => '128',
        ]))->setLabel('Email')->addValidators([
            new PresenceOf([
                'message' => 'You can\'t leave this empty.',
                'cancelOnFail' => true,
            ]),
        ])->setFilters([
            'trim',
            'string',
            'email',
        ]));

        $this->add(new Submit('submit', [
            'class' => 'form-control',
            'value' => 'Reset',
        ]));
    }
}