<?php

namespace Frontend\Forms;

use Phalcon\Forms\Element\Email;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Uniqueness;

/**
 * Class RegistrationForm
 * @package Frontend\Forms
 */
class RegistrationForm extends Form
{
    public function initialize()
    {
        $this->add((new Text('name', [
            'class' => 'form-control',
            'autocomplete' => 'off',
            'maxlength' => '128',
        ]))->setLabel('Name')->addValidators([
            new PresenceOf([
                'message' => 'You can\'t leave this empty.',
                'cancelOnFail' => true,
            ]),
        ])->setFilters([
            'trim',
            'string',
        ]));

        $this->add((new Email('email', [
            'class' => 'form-control',
            'autocomplete' => 'off',
            'maxlength' => '128',
        ]))->setLabel('Email')->addValidators([
            new PresenceOf([
                'message' => 'You can\'t leave this empty.',
                'cancelOnFail' => true,
            ]),
            new Uniqueness([
                'message' => 'That email is taken. Try another.',
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
        ]))->setLabel('Create a password')->addValidators([
            new PresenceOf([
                'message' => 'You can\'t leave this empty.',
                'cancelOnFail' => true,
            ]),
        ])->setFilters([
            'trim',
            'string',
        ]));

        $this->add((new Password('confirm_password', [
            'class' => 'form-control',
            'autocomplete' => 'off',
            'maxlength' => '64',
        ]))->setLabel('Confirm your password')->addValidators([
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
            'value' => 'Next step',
        ]));
    }
}
