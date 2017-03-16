<?php

namespace Frontend\Forms;

use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;

/**
 * Class LoginForm
 * @package Frontend\Forms
 */
class LoginForm extends Form
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

        $this->add((new Password('password', [
            'class' => 'form-control',
            'autocomplete' => 'off',
            'maxlength' => '64',
        ]))->setLabel('Password')->addValidators([
            new PresenceOf([
                'message' => 'You can\'t leave this empty.',
                'cancelOnFail' => true,
            ]),
        ])->setFilters([
            'trim',
            'string',
        ]));

        $this->add(new Submit('submit', [
            'class' => 'form-control',
            'value' => 'Login',
        ]));
    }
}
