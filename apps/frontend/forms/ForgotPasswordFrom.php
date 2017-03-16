<?php

namespace Frontend\Forms;

use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;

/**
 * Class RegistrationForm
 * @package Frontend\Forms
 */
class ForgotPasswordFrom extends Form
{
    public function initialize()
    {
        $this->add((new Text('email', [
            'class' => 'form-control',
            'autocomplete' => 'off',
            'maxlength' => '128',
        ]))->setLabel('Email')->addValidators([
            new PresenceOf([
                'message' => 'You can\'t leave this empty.',
                'cancelOnFail' => true,
            ]),
            new Email([
                'message' => 'Please enter a valid email address.',
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
