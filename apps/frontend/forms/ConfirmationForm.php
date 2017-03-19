<?php

namespace Frontend\Forms;

use Frontend\Models\Confirm;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Identical;

class ConfirmationForm extends Form
{
    public function initialize(Confirm $model)
    {
        $this->add((new Text('confirm_code', [
            'class' => 'form-control',
            'autocomplete' => 'off',
            'maxlength' => '32',
        ]))->setLabel('Code')->addValidators([
            new PresenceOf([
                'message' => 'You can\'t leave this empty',
                'cancelOnFail' => true,
            ]),
            new Identical([
                'accepted' => $model->code,
                'message' => 'Please enter a valid code',
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

        $this->add(new Submit('submit', [
            'class' => 'form-control',
            'value' => 'Confirm',
        ]));
    }
}
