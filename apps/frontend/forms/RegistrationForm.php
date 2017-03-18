<?php

namespace Frontend\Forms;

use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Alpha;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\StringLength;

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
            'maxlength' => '32',
        ]))->setLabel('Name')->addValidators([
            new PresenceOf([
                'message' => 'You can\'t leave this empty',
                'cancelOnFail' => true,
            ]),
            new Alpha([
                'message' => 'Must contain only letters',
                'cancelOnFail' => true,
            ]),
            new StringLength([
                'min' => 2,
                'messageMinimum' => 'Try one with at least 2 characters',
                'max' => 32,
                'messageMaximum' => 'Must have at most 32 characters',
                'cancelOnFail' => true,
            ]),
        ])->setFilters([
            'trim',
            'string',
        ]));

        $this->add((new Text('email', [
            'class' => 'form-control',
            'autocomplete' => 'off',
            'maxlength' => '32',
        ]))->setLabel('Email')->addValidators([
            new PresenceOf([
                'message' => 'You can\'t leave this empty',
                'cancelOnFail' => true,
            ]),
            new Email([
                'message' => 'Please enter a valid email address',
                'cancelOnFail' => true,
            ]),
            new Uniqueness([
                'message' => 'That email is taken. Try another',
                'cancelOnFail' => true,
            ]),
            new StringLength([
                'max' => 32,
                'messageMaximum' => 'Must have at most 32 characters',
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
            'maxlength' => '32',
        ]))->setLabel('Create a password')->addValidators([
            new PresenceOf([
                'message' => 'You can\'t leave this empty',
                'cancelOnFail' => true,
            ]),
            new StringLength([
                'min' => 8,
                'messageMinimum' => 'Try one with at least 8 characters',
                'max' => 32,
                'messageMaximum' => 'Must have at most 32 characters',
                'cancelOnFail' => true,
            ]),
        ])->setFilters([
            'trim',
            'string',
        ]));

        $this->add((new Password('confirm_password', [
            'class' => 'form-control',
            'autocomplete' => 'off',
            'maxlength' => '32',
        ]))->setLabel('Confirm your password')->addValidators([
            new PresenceOf([
                'message' => 'You can\'t leave this empty',
                'cancelOnFail' => true,
            ]),
            new Confirmation([
                'message' => 'These passwords don\'t match',
                'with' => 'password',
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
